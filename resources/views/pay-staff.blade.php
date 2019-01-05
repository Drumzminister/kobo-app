@extends('layouts.app')

@section('content')

<section id="top">
        <div class="container py-3">
            <div class="row ">
                <h2>Staffs</h2>
                <span class="accountant ml-auto ">
                    <a href="/add-staff" class="btn btn-started">
                        Add Staff
                    </a>                
                    </span>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-4">
            <button type="submit" class="float-right btn btn-filter">Filter <i class="fa fa-filter"></i></button>
        </div>
        <br>
        
        <div class="container mt-3">
            <div class="bg-white px-4 pb-4 mt-5" id="topp"> 
                
                    <div class="table-responsive table-responsive-sm">
                            <table class="table table-hover" id="dataTable">
                                    <thead class="p-3">
                                      <tr class="ta">
                                        <th scope="col">Staff</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payment method</th>
                                        <th scope="col">Month</th>              
                                        <th scope="col">Description</th>              
                                      
                                    </tr>
                                    </thead>
            
                                    <tbody>
                                      <tr>
                                        
                                            <td> <a href="" class="left-modal" data-toggle="modal" data-target="#exampleModal" >
                                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                                <span class="pl-3"> James James</span>
                                                </a>
                                            </td>
                                            <td >237,000 </td>
                                            <td >
                                                <select name="" id="" class="form-control">
                                                    <option value="">Cash</option>
                                                    <option value="">Bank Transfer</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="" id="" class="form-control">
                                                        <option value="">January</option>
                                                        <option value="">feb</option>                                                    
                                                        <option value="">march</option>
                                                        <option value="">January</option>
                                                        <option value="">January</option>
                                                        <option value="">January</option>
                                                </select>
                                            </td>  
                                            <td> 
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, dolor.
                                            </td>      
                                      </tr>                                                 
                                    </tbody>                                   
                                </table>
                                <button type="submit" class="float-right btn btn-started">Add </button>
                    </div>

                    <div class="text-center my-3">
                        <button type="submit" class="btn btn-addsale" >Save and Update Information</button>
                    </div>
                </div>
        </div>
    </section>
@endsection