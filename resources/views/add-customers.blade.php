@extends('layouts.app')

@section('content')

<section id="top">
    <div class="container py-3">
        <div class="row ">
            <h2> <a href="/customers" class="text-dark">Customer</a></h2>            
        </div>
    </div>
</section>

<section>
    <div class="container my-4">
        <div class="bg-white p-5">
            <img src="{{asset('img/person.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid">
            <h5 class="h5">Add Photo</h5>

            <form>
                <div class="form-group row py-2">
                    <div class="col-md-4">
                        <label for="name" class="col-md-3 col-form-label">Account</label>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, natus!</p>
                    </div>
                    <div class="col-md-8">
                        <label for="first name">First Name</label>
                        <input type="text" class="form-control bg-grey" id="" >
                        <label for="last name">Last name</label>
                        <input type="text" class="form-control bg-grey" id="" >
                        <label for="phone">Phone number</label>
                        <input type="number" class="form-control bg-grey" id="" >
                    </div>
                </div>
                
                <hr>

                <div class="form-group row py-2">
                    <div class="col-md-4">
                        <label for="decription" class="col-form-label">Address</label>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>
                    </div>
                    <div class="col-md-8">
                        <label for="Role">Address</label>
                        <select name="" id="" class="form-control bg-grey">
                                <option value="" selected></option>
                                <option value="role"></option>
                                <option value="role"></option>
                                <option value="role"></option>
                        </select>
                        <span class="float-right mt-1" onclick="" style="cursor: pointer;">Add Row <i class="fa fa-plus-square" style="font-size:32px; color:#00C259;" value="Add Row"></i>
                        </span>
                    </div>
                </div>
                

                <div class="form-group row py-2">
                        <div class="col-md-4">
                            <label for="decription" class="col-form-label">Website</label>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>
                        </div>
                        <div class="col-md-8">
                            <label for="Role">Website Name</label>
                            <select name="" id="" class="form-control bg-grey">
                                    <option value="" selected></option>
                                    <option value="role"></option>
                                    <option value="role"></option>
                                    <option value="role"></option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-addsale">Save Information</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>    
</section> 



@endsection