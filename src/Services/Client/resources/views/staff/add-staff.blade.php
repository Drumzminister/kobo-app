@extends('client::layouts.app')

@section('content')

<section id="top">
    <div class="container py-3">
        <div class="row ">
            <h2> <a href="/client/staff" class="text-dark">Staff</a></h2>
        </div>
    </div>
</section>

<section>
    <div class="container my-4">
        <div class="bg-white p-5">
            <div class="row">
                <new-image :options="{name:'image'}" {{ $errors->has('image') ? ':error="'. $errors->first('image') .'"' : ':error=""' }}></new-image>
            </div>
            <form action="{{ route('client.single-staff.add') }}" method="post" enctype="multipart/form-data">
                <div class="form-group row py-2">
                    <div class="col-md-4 text-center">
                        <label for="name" class="col-md-3 col-form-label">Account</label>
                        {{--<p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, natus!</p>--}}
                    </div>
                    <div class="col-md-8">
                        <label for="first name">First Name</label>
                        <input name="first_name" type="text" class="form-control bg-grey" id="">
                        @include('errors.form-validation-error', ['inputName' => 'first_name'])

                        <label for="last name">Last name</label>
                        <input name="last_name" type="text" class="form-control bg-grey" id="" >
                        @include('errors.form-validation-error', ['inputName' => 'last_name'])

                        <label for="phone">Phone number</label>
                        <input name="phone"  @keyup="validateInput"   type="text" class="form-control bg-grey" id="" >
                        @include('errors.form-validation-error', ['inputName' => 'phone'])

                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control bg-grey" id="" >
                        @include('errors.form-validation-error', ['inputName' => 'email'])

                    </div>
                </div>

                <hr>

                <div class="form-group row py-2">
                    <div class="col-md-4 text-center">
                        <label for="decription" class="col-form-label">Designation</label>
                        {{--<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>--}}
                    </div>
                    <div class="col-md-8">
                        <label for="Role">Role</label>
                        <Select2 v-model="staffForm.role" :settings="{placeholder: 'Select Role', name: 'role' }" :options="[
                            'Manager', 'Secretary', 'Office Assistant', 'Human Resource', 'Personal Assistant',
                            'Cleaner', 'Developer', 'Accountant', 'Data Entry', 'Reception', 'HR', 'Sales',
                            'Driver', 'Typist', 'Executive/Personal Assistant',
                        ]"></Select2>
                    </div>
                </div>

                <hr>
                <div class="form-group row py-2">
                        <div class="col-md-4 text-center">
                            <label for="name" class="col-md-3 col-form-label">Experience</label>
                            {{--<p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, natus!</p>--}}
                        </div>
                        <div class="col-md-8">
                            <label for="first name">Years of Experience</label>
                            <input name="years_of_experience" placeholder="Not less than 50" type="number" class="form-control bg-grey">
                            <span class="text-danger">@{{ errors.first('yearsOfExperience') }}</span>
                            <br>
                            <label for="Role">Date  Of Employment</label>
                            <input class="form-control" v-model="staffForm.employed_date" type="date" />

                        </div>
                    </div>

                    <hr>

                    <div class="form-group row py-2 text-center">
                        <div class="col-md-4">
                            <label for="decription" class="col-form-label">Salary</label>
                            {{--<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>--}}
                        </div>
                        <div class="col-md-8">
                            <label for="Role">Amount</label>
                            <input type="number" @keyup="validateInput" v-model="staffForm.salary" id="number" class="number form-control bg-grey">
                        </div>
                    </div>
                <hr>
                    <div class="form-group row py-2">
                            <div class="col-md-4 text-center">
                                <label for="decription" class="col-form-label">Comment</label>
                                {{--<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>--}}
                            </div>
                            <div class="col-md-8">
                                <label for="Role">Brief Comment</label>
                                <textarea @click="validateInput" v-model="staffForm.comment" rows="10" class="form-control bg-grey"></textarea>
                            </div>
                        </div>

                    <div class="form-row mt-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit"  @click="createStaff" class="btn btn-addsale">Save Information</button>
                        </div>
                    </div>
              </form>
        </div>
    </div>
</section>
@endsection
