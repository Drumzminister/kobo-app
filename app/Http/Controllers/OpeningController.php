<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Opening\AssetRepository;
use Koboaccountant\Repositories\Opening\CreditorRepository;
use Koboaccountant\Repositories\Opening\DebtorRepository;
use Koboaccountant\Repositories\Opening\InventoryRepository;

class OpeningController extends Controller
{
    protected $asset_repo;
    protected $debtor_repo;
    protected $creditor_repo;
    protected $inventory_repo;

	function __construct()
	{
		$this->middleware('auth');
		$this->asset_repo = new AssetRepository();
		$this->debtor_repo = new DebtorRepository();
		$this->creditor_repo = new CreditorRepository();
		$this->inventory_repo = new InventoryRepository();
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


    public function showCreditorsPage()
    {
        $data['creditors'] = $this->creditor_repo->getAll();
        return view('opening-creditors', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCreditor(Request $request)
    {
        $creditor = $this->creditor_repo->create($request);

        return response()->json([
            'id' => $creditor->id
        ])->setStatusCode(201);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCreditor($id, Request $request)
    {
        $creditor = $this->creditor_repo->update($id, $request);
        return response()->json([
            'id'    =>  $creditor->id
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCreditor($id)
    {
        $this->creditor_repo->delete($id);
        return response()->json([
            'message'   => 'Deleted',
        ])->setStatusCode(200);
    }


    public function showInventoriesPage()
    {
        $data['inventories'] = $this->inventory_repo->getAll();
        return view('opening-inventory', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addInventory(Request $request)
    {
        $inventory = $this->inventory_repo->create($request);

        return response()->json([
            'id' => $inventory->id
        ])->setStatusCode(201);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateInventory($id, Request $request)
    {
        $inventory = $this->inventory_repo->update($id, $request);
        return response()->json([
            'id'    =>  $inventory->id
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteInventory($id)
    {
        $this->inventory_repo->delete($id);
        return response()->json([
            'message'   => 'Deleted',
        ])->setStatusCode(200);
    }
}
