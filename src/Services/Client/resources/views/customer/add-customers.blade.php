@extends('client::layouts.app')

@section('content')

<section id="top">
    <div class="container py-3">
        <div class="row ">
            <h2> <a href="/client/customer" class="text-dark">Customer</a></h2>
        </div>
    </div>
</section>

<section>
    <div class="container my-4">
        <div class="bg-white p-5">
            <div class="row">
                <div class="col-md-4 img-in">
                    <img src="{{asset('img/person.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid img-circle">
                    <div class="overlay">
                        <div class="text form-group">
                            <input type="file" @change="getAndProcessImage($event)" class="form-control-file" id="staffPhoto">
                        </div>
                    </div>
                <h5 class="h5 px-4 py-2 ">Add Photo</h5>
                </div>
                <div class="col-md-8">
                    <form method="post" action="uploadCsv" enctype="multipart/form-data">
                        @csrf

                        <div>Upload CSV Client</div>
                        <input class="mt-2" type="file" name="file"><br>
                        <button class="mt-4 btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>

            <form method="post">
                <div class="form-group row py-2">
                    <div class="col-md-4">
                        <label for="name" class="col-md-3 col-form-label">Account</label>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, natus!</p>
                    </div>
                    <div class="col-md-8">
                        <label for="first name">First Name</label>
                        <input v-model="customerForm.first_name" type="text" class="form-control bg-grey" id="" >
                        <label for="last name">Last name</label>
                        <input v-model="customerForm.last_name" type="text" class="form-control bg-grey" id="" >
                        <label for="phone">Phone number</label>
                        <input v-model="customerForm.phone" type="text" class="form-control bg-grey" id="" >
                        <label for="phone">Email</label>
                        <input v-model="customerForm.email" type="text" class="form-control bg-grey" id="" >
                    </div>
                </div>

                <hr>

                <div class="form-group row py-2">
                    <div class="col-md-4">
                        <label for="decription" class="col-form-label">Address</label>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>
                    </div>
                    <div class="col-md-8">
                        <label for="Address">Address</label>
                        <input v-model="customerForm.address" class="form-control bg-grey" />
                    </div>
                </div>


                <div class="form-group row py-2">
                        <div class="col-md-4">
                            <label for="decription" class="col-form-label">Website</label>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>
                        </div>
                        <div class="col-md-8">
                            <label for="Website">Website Name</label>
                            <input v-model="customerForm.website" type="text" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" v-on:click="createCustomer" class="btn btn-addsale">Save Information</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>



@endsection
