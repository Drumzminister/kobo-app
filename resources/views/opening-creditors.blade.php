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
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
            <h4> 75%</h4>
            </div>
        </div>
    </div>
    <div class="container bg-white mt-5">
        <div class="row py-3">
            <div class="col-md-9">
                <div aria-label="breadcrumb arr-right">
                        <ol class="breadcrumb bg-white">
                            <li class="breadcrumb-item"><a href="/assets">Opening Balance</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Creditors</li>                
                        </ol>
                </div>   
            </div>
            <div class="col-md-3">
                    <div class="dates input-group input-group-lg">
                        <input type="text"  class="form-control" id="datepicker" value="{{Date('m/d/Y')}}" name="event_date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar icon" id="datepicker" name="event_date" ></i></span>
                        </div> 
                    </div>
            </div>
            
        </div>       
            <div class="table-responsive table-responsive-sm px-4 py-2 ">
                <table class="table table-striped table-hover table-style" id="dataTable">
                    <thead class="p-3">
                      <tr class="tab">
                        <th scope="col">Vendor</th>
                        <th scope="col">Details </th>
                        <th scope="col">Amount (&#8358;)</th>
                        <th scope="col"><i class="fa fa-plus-square" style="font-size:24px" value="Add Row" onclick="addRow('dataTable')"></i></th>
            
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td > Aqua Villa</td>
                          <td > Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, sequi?</td>
                        <td> 43,000 </td>
                        <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                    </tr>
            
                    <tr>
                      <td> Aqua Villa</td>
                      <td > Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, neque?</td>
                      <td> 43,000 </td>
                      <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                    </tr>
            
                    <tr>
                      <td > Aqua Villa</td>
                      <td > Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, mollitia!</td>
                      <td> 43,000 </td>
                      <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                    </tr>
            
                    <tr class="d-none">
                          <td ><input type="text" placeholder=""> </td>
                          <td ><input type="text" placeholder=""> </td>
                          <td> <input type="number" placeholder=""></td>
                          <td> <div class="dates">
                                <input type="text" id="usr1" name="event_date" placeholder="" autocomplete="off" >
                            </div>
                         </td>
                         <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                        </tr>
                
                       
                    </tbody>
                </table>
                <div class="row">
                        <div class = "col">
                                <a class="btn btn-started" href="/opening/debtors">Previous</a>
                        </div>
                        <div class = "col">
                                <a class="btn btn-started float-right" href="/opening/inventory">Next</a>
                        </div>
                </div>
            </div> 
                       
        </div>
        
    </div>


@endsection