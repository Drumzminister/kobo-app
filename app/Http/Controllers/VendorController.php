<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Vendor\VendorRepository;
class VendorController extends Controller
{
    public function __construct(VendorRepository $vendor)
    {
        $this->vendorRepo = $vendor;
    }

    public function index()
    {
        $data['vendors'] = $this->vendorRepo->getAll()->get();
        $data['count'] = $this->vendorRepo->getAll()->count();
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

    public function view()
    {
        return view('view-vendors');
    }
}
