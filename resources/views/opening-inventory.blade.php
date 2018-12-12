@extends('layouts.app')
<style>
input {
    border: none;
    background: transparent;
}
</style>
@section('content')
<section id="particles"></section>
    <div id="container">  
        <div class="progress" style="height:35px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:90%">
            <h4> 90%</h4>
            </div>
        </div>
    </div>
    <div class="container bg-white mt-5">
            <div class="row py-3">
                    <div class="col-md-9">
                        <div aria-label="breadcrumb arr-right">
                                <ol class="breadcrumb bg-white">
                                    <li class="breadcrumb-item"><a href="/assets">Opening Balance</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                                </ol>
                        </div>   
                    </div>
                    <div class="col-md-3">
                            <div class="dates input-group input-group-lg">
                                <input type="text"  class="form-control" id="inventoryDate" value="{{Date('m/d/Y')}}" name="event_date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar icon" id="datepicker" name="event_date" ></i></span>
                                </div> 
                            </div>
                    </div>
                    
                </div>       

        <div class="bg-white p-4">
                
            <div class="table-responsive table-responsive-sm ">
                <table class="table table-striped table-hover table-style" id="inventoryTable">
                    <thead class="p-3">
                      <tr class="tab">
                        <th scope="col">Vendor</th>
                        <th scope="col">Details</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Cost Price/Unit (&#8358;)</th>
                        <th scope="col">Sales Price/Unit (&#8358;)</th>
                        <th scope="col"></th>
            
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($inventories as $inventory)
                            <tr>
                                <td>{{$inventory->vendor}}</td>
                                <td>{{$inventory->details}}</td>
                                <td>{{number_format($inventory->quantity, 2)}}</td>
                                <td>{{number_format($inventory->cost_price, 2)}}</td>
                                <td>{{number_format($inventory->selling_price, 2)}}</td>
                                <td><i class="fa fa-edit pr-2" style="font-size:24px; cursor: pointer;" onclick="makeEditable(this.parentElement.parentElement)"></i><i class="fa fa-trash-o" style="font-size:24px; cursor: pointer"  onclick="deleteInventory(this.parentElement.parentElement)"></i></td>
                                <input type="hidden" class="id" value="{{$inventory->id}}">
                            </tr>
                        @empty
                            <tr>
                                <td><input type="text" class="form-control vendor"></td>
                                <td><input type="text" class="form-control details"></td>
                                <td><input type="number" class="form-control quantity"></td>
                                <td><input type="number" class="form-control cost_price"></td>
                                <td><input type="number" class="form-control selling_price"></td>
                                <td><button class="btn btn-sm btn-success px-3" onclick="saveInventory(this.parentElement.parentElement)">Add</button></td>
                            </tr>
                        @endforelse
                       
                    </tbody>
                </table>
                <span class="float-right" value="Add Row" onclick="addInventory('inventoryTable')" style="cursor: pointer;">Add Row <i class="fa fa-plus-square" style="font-size:32px; color:#00C259;" value="Add Row" onclick="addInventory('inventoryTable')"></i>
                </span>
            </div>
                <div class="row mt-3">
                    <div class = "col">
                        <a class="btn btn-started" href="/opening/creditors">Previous</a>
                    </div>
                    <div class = "col">
                        <a class="btn btn-started float-right" href="/dashboard">Next</a>
                    </div>
                </div>
            </div> 
                       
        </div>
        
    </div>

<script src="/js/opening/inventory.js"></script>
@endsection