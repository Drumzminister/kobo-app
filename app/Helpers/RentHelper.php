<?php
/**
 * Created by PhpStorm.
 * User: James John James
 * Date: 12/23/2018
 * Time: 5:48 PM
 */

namespace Koboaccountant\Helpers;


use Carbon\Carbon;
use Koboaccountant\Repositories\Rent\RentRepository;

class RentHelper
{
    public $rent_repo;

    public static function getTotalUsedRent()
    {
//        $test = 0;
        $diff = null;
        $usedRent = 0;
        $amortized = null;
        $rents = self::getRentRepo()->getAll();

        foreach ($rents as $rent) {
            $start = new Carbon($rent->start);
            $end = new Carbon($rent->end);

            if ( $start->year - $end->year === 0 ) {
                $diff = $end->diffInMonths($start, false);
            } elseif ( $end->year - $start->year === 1 ) {
                $diff = $start->diffInMonths($end, false);
            }
            if ( !is_null ($diff) ) {
                $today = Carbon::now('Africa/Lagos');
                if ($diff === 0) {
                    if ($today->diffInDays($end, false) < 1) {
                        $usedRent += $rent->amount;
                    } else {
                        $usedRent += 0;
                    }
                } elseif ($diff === 1) {
                    if (($today->isSameMonth($end) && $today->diffInDays($end, false) > 0) || (!$today->isSameMonth($end) && $today->diffInMonths($end, false) > 0 )) {
                        $usedRent += $rent->amount;
                    } elseif ($today->isSameMonth($end) && $today->diffInDays($end, false) < 0) {
                        $usedRent += 0;
                    }
                } else {
                    $amortized = $rent->amount / $diff;
//                    if ($today->isSameMonth())
                    if ( $today->year - $start->year === 0 ) {
                        $usedRent += $amortized * ( $today->diffInMonths($start, false) + 1 );
                    } elseif ($today->year - $start->year === 1) {
                        $usedRent += $amortized * ( 10 + $start->diffInMonths($today, false) );
                    }
                }

            }
//            return ['used'=> $usedRent, 'amount' => $rents[$test]->amount, 'diff'=> $diff, 'amortized' => $amortized];
        }

        return $usedRent;
    }

    public static function getRentRepo()
    {
        return new RentRepository();
    }
}