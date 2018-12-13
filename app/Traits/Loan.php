<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/10/2018
 * Time: 2:57 PM
 */

namespace Koboaccountant\Traits;


use Illuminate\Http\Request;

trait Loan
{
    public function sumAllRunning()
    {
        $loans = $this->loan_repo->getAllRunning();
        return $loans->sum('amount');
    }

    public function sumAllOwing()
    {
        return $this->sumAllRunning() - $this->sumAllPaid();
    }

    public function sumAllPaid()
    {
        $loans = $this->loan_repo->getAllPaid();
        return $loans->sum('amount_paid');
    }

    public function search(Request $request)
    {
        $results = $this->loan_repo->search($request->all()['query']);
        $sources = $this->source_repo->search($request->all()['query']);
        foreach ($sources as $source) {
            foreach ($source->loans as $loan) {
                $results->push($loan);
            }
        }
        $response = array_values($results->unique('id')->all());
        return response()->json([
            'results'   => $response,
        ], 200);
    }

    public function paginated(Request $request)
    {
        $loans = $this->loan_repo->page(10, ($request->page * 10) - 10 ?? 0);
        $count = $this->loan_repo->getAll()->count();
        return response()->json([
            'loans' =>  $loans,
            'total' =>  $count
        ], 200);
    }
}