<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Opening\AssetRepository;
use Koboaccountant\Repositories\Opening\DebtorRepository;

class OpeningController extends Controller
{
    protected $asset_repo;
    protected $debtor_repo;

	function __construct()
	{
		$this->middleware('auth');
		$this->asset_repo = new AssetRepository();
		$this->debtor_repo = new DebtorRepository();
	}

	public function showAssetsPage()
    {
        $data['assets'] = $this->asset_repo->getAll();
        return view('opening-asset', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAsset(Request $request)
    {
    	$asset = $this->asset_repo->create($request);

    	return response()->json([
    	    'id' => $asset->id
        ])->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAsset($id, Request $request)
    {
        $asset = $this->asset_repo->update($id, $request);
        return response()->json([
            'id'    =>  $asset->id
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAsset($id)
    {
        $isDeleted = $this->asset_repo->delete($id);
        return response()->json([
            'message'   =>  $isDeleted,
        ])->setStatusCode(201);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function showDebtorsPage()
    {
        $data['debtors'] = $this->debtor_repo->getAll();
        return view('opening-debtors', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addDebtor(Request $request)
    {
        $debtor = $this->debtor_repo->create($request);

        return response()->json([
            'id' => $debtor->id
        ])->setStatusCode(200);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDebtor($id, Request $request)
    {
        $debtor = $this->debtor_repo->update($id, $request);
        return response()->json([
            'id'    =>  $debtor->id
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDebtor($id)
    {
        $isDeleted = $this->debtor_repo->delete($id);
        return response()->json([
            'message'   =>  $isDeleted,
        ])->setStatusCode(201);
    }
}
