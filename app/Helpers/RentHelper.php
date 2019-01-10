<?php
/**
 * Created by PhpStorm.
 * User: James John James
 * Date: 12/23/2018
 * Time: 5:48 PM
 */

namespace Koboaccountant\Helpers;


use Carbon\Carbon;
use App\Data\Repositories\RentRepository;

class RentHelper
{
    public $rent_repo;

    public static function getTotalUsedRent()
    {
//        $test = 8;
        $diff = null;
        $usedRent = 0;
        $total = 0;
        $amortized = null;
        $rents = self::getRentRepo()->getByCompany_id(auth()->user()->company->id);
//        return $rents;
        foreach ($rents as $rent) {
//            $rent = $rents[$test];
            $start = new Carbon($rent->start);
            $end = new Carbon($rent->end);

            $diff = $start->diffInMonths($end);

            $today = Carbon::now('Africa/Lagos');
            if ($diff === 0 ) {
                $amortized = $rent->amount;
            } else {
                $amortized = $rent->amount / $diff;
            }
            if ($today->greaterThanOrEqualTo($end)) {
                $usedRent = $rent->amount;
            } else {
                $usedRent = $amortized * ( $diff - $today->diffInMonths($end) );
            }
            $total += $usedRent;
//            return ['used'=> $usedRent, 'amount' => $rent->amount, 'diff'=> $diff, 'amortized' => $amortized, 'property' => $rent->property_details];
        }

        return $total;
    }

    public static function getRentRepo()
    {
        return new RentRepository();
    }
}
