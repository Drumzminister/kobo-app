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
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
            <h4> 90%</h4>
            </div>
        </div>
    </div>

    <div class="container pt-5 mt-5">
        <div class="cashh bg-white col-md-6 p-5">
            <div class="row">
                <div class="col-md-7">
                    <div aria-label="breadcrumb arr-right">
                        <ol class="breadcrumb bg-white">
                            <li class="breadcrumb-item"><a href="/creditors">Opening Balance</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cash</li>
                        </ol>
                    </div>   
                </div>
                <div class="col-md-5">
                    <div class="dates input-group input-group-lg">
                        <input type="text"  class="form-control" id="creditorDate" value="{{Date('m/d/Y')}}" name="event_date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar icon" id="creditorDate" name="event_date" ></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cash text-center">
                <h3 class="h3 py-2">Cash at hand</h3>
                <div class="input-group input-group-lg">
                    <form action="/opening/cash" method="post" id="cashForm">
                        @csrf
                        <input type="number" class="form-control" name="amount" aria-label="Large" aria-describedby="" style="width:200%;" placeholder="NGN 5,000,000" required>
                    </form>

                </div>
                    
            </div>

            <div class="row mt-3">
                <div class = "col">
                    <a class="btn btn-started" href="/opening/inventory">Previous</a>
                </div>
                <div class = "col">
                    <button class="btn btn-started float-right" onclick="document.querySelector('#cashForm').submit()">Next</button>
                </div>
            </div>
        </div>
    </div>

    
    
@endsection