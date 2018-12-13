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
        <div class="progress " style="height:35px">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
            <h4>60%</h4>
            </div>
        </div>
    </div>
    <div class="container bg-white mt-5">
        <div class="row py-3">
            <div class="col-md-9">
                <div aria-label="breadcrumb arr-right">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a href="/creditors">Opening Balance</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Creditors</li>
                    </ol>
                </div>   
            </div>
            <div class="col-md-3">
                <div class="dates input-group input-group-lg">
                    <input type="text"  class="form-control" id="creditorDate" value="{{Date('m/d/Y')}}" name="event_date">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar icon" id="creditorDate" name="event_date" ></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive table-responsive-sm px-4 ">
                <table class="table table-striped table-hover table-style" id="creditorsTable">
                    <thead class="p-3">
                      <tr class="tab">
                        <th scope="col">Vendor</th>
                        <th scope="col">Details </th>
                        <th scope="col">Amount (&#8358;)</th>
                        <th scope="col"></th>
            
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($creditors as $creditor)
                            <tr>
                                <td>{{$creditor->vendor}}</td>
                                <td>{{$creditor->details}}</td>
                                <td>{{number_format($creditor->amount, 2)}}</td>
                                <td><i class="fa fa-edit pr-2" style="font-size:24px; cursor: pointer;" onclick="makeEditable(this.parentElement.parentElement)"></i><i class="fa fa-trash-o" style="font-size:24px; cursor: pointer"  onclick="deleteCreditor(this.parentElement.parentElement)"></i></td>
                                <input type="hidden" class="id" value="{{$creditor->id}}">
                            </tr>
                        @empty
                            <tr>
                                <td><input type="text" class="form-control vendor"></td>
                                <td><input type="text" class="form-control details"></td>
                                <td><input type="number" class="form-control amount"></td>
                                <td><button class="btn btn-sm btn-success px-3" onclick="saveCreditors(this.parentElement.parentElement)">Add</button></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <span class="float-right" value="Add Row" onclick="addCreditor('creditorsTable')" style="cursor: pointer;">Add Row <i class="fa fa-plus-square" style="font-size:32px; color:#00C259;" value="Add Row" onclick="addCreditor('creditorsTable')"></i>
                </span>
            </div>
                <div class="row p-4">
                    <div class = "col">
                        <a class="btn btn-started" href="/opening/debtors">Previous</a>
                    </div>
                    <div class = "col">
                        <a class="btn btn-started float-right" href="/opening/inventory">Next</a>
                    </div>
                </div>
            </div> 
    </div>

    <script src="/js/opening/creditors.js"></script>
@endsection