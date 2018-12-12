@extends('layouts.app')

@section('content')

<section id="top">
    <div class="container py-3">
        <div class="row ">
            <h2> <a href="/staffs" class="text-dark">Staff</a></h2>            
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
                        <label for="decription" class="col-form-label">Designation</label>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>
                    </div>
                    <div class="col-md-8">
                        <label for="Role">Role</label>
                        <select name="" id="" class="form-control bg-grey">
                                <option value="" selected></option>
                                <option value="role">CEO</option>
                                <option value="role">Director</option>
                                <option value="role">Manager</option>
                        </select>
                    </div>
                </div>

                <hr>
                <div class="form-group row py-2">
                        <div class="col-md-4">
                            <label for="name" class="col-md-3 col-form-label">Experience</label>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, natus!</p>
                        </div>
                        <div class="col-md-8">
                            <label for="first name">Years of Experience</label>
                            <input type="text" class="form-control bg-grey" id="" value="">
                            
                            <label for="Role">Date  Of Employment</label>
                            <select name="" id="" class="form-control bg-grey">
                                <option value="" selected></option>
                                    <option value="role">2 years</option>
                                    <option value="role">5 years</option>
                                    <option value="role">10 years</option>
                            </select>

                        </div>
                    </div>
                    
                    <hr>
    
                    <div class="form-group row py-2">
                        <div class="col-md-4">
                            <label for="decription" class="col-form-label">Salary</label>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>
                        </div>
                        <div class="col-md-8">
                            <label for="Role">Amount</label>
                            <select name="" id="" class="form-control bg-grey">
                                 <option value="" selected></option>
                                <option value="role">50,000</option>
                                    <option value="role">100,000</option>
                                    <option value="role">150,000</option>
                            </select>
                        </div>
                    </div>
    
                    <hr>
                    <div class="form-group row py-2">
                            <div class="col-md-4">
                                <label for="decription" class="col-form-label">Comment</label>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>
                            </div>
                            <div class="col-md-8">
                                <label for="Role">Brief Comment</label>
                                <textarea name="" id="" rows="10" class="form-control bg-grey"></textarea>
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