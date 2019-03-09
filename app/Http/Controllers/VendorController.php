<?php

namespace Koboaccountant\Http\Controllers;

use App\Data\Repositories\VendorRepository;
use Illuminate\Http\Request;
class VendorController extends Controller
{
    public function __construct(VendorRepository $vendor)
    {
        $this->vendorRepo = $vendor;
    }

    public function index()
    {
        $data['vendors'] = $this->vendorRepo->getAll();
//        $data['count'] = $this->vendorRepo->getAll()->count();
        return view('vendors', $data);
    }

    public function addVendor()
    {
        return view('add-vendor');
    }

    public function store(Request $request)
    {
        $this->vendorRepo->create($request);

        // return response()->json([
        //     'message' => 'Saved Successfully',
        // ])->setStatusCode(200);
    }

    public function activate($id, Request $request)
    {
        $this->vendorRepo->activate($id);
        return 'Deactivated';
    }
    public function view()
    {
        return view('view-vendors');
    }

    public function search(Request $request)
    {
        return array_values($this->vendorRepo->search($request->q)->all());
        // return "james";
    }
}
