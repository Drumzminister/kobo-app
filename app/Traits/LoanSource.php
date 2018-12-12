<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/10/2018
 * Time: 9:20 AM
 */

namespace Koboaccountant\Traits;


use Illuminate\Http\Request;
use Koboaccountant\Repositories\Loan\SourceRepository;

trait LoanSource
{
    public function getAllSources()
    {
        return response()->json([
            'sources'   =>  $this->source_repo->getAll()
        ], 200);
    }

    public function searchForSource($query)
    {
        return response()->json(['sources' => $this->source_repo->search($query)], 200);
    }

    public function addSource(Request $request)
    {
        $source = $this->source_repo->create($request);
        return response()->json(['source' => $source], 200);
    }

}