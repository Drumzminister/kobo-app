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
                @csrf
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
                        <input name="phone"  @keyup="validateInput"   type="text" class="form-control bg-grey" id="" required>
                        @include('errors.form-validation-error', ['inputName' => 'phone'])

                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control bg-grey" id="" required>
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

                        @include('errors.form-validation-error', ['inputName' => 'role'])
                    </div>
                </div>

                <hr>
                <div class="form-group row py-2">
                        <div class="col-md-4 text-center">
                            <label for="name" class="col-md-3 col-form-label">Experience</label>
                            {{--<p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, natus!</p>--}}
                        </div>
                        <div class="col-md-8">
                            <label for="yearsOfExperience">Years of Experience (Max is 50)</label>
                            <input id="yearsOfExperience" name="years_of_experience" type="number" min="1" max="50" class="form-control bg-grey">
                            @include('errors.form-validation-error', ['inputName' => 'years_of_experience'])
                            <br>
                            <label for="Role">Date Of Employment</label>
                            <input class="form-control" name="employed_date" type="date"/>
                            @include('errors.form-validation-error', ['inputName' => 'employed_date'])
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row py-2">
                        <div class="col-md-4 text-center">
                            <label for="description" class="col-form-label">Salary</label>
                            {{--<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>--}}
                        </div>
                        <div class="col-md-8">
                            <label for="Role">Amount</label>
                            <money-input :model="'staffForm.salary'" :class="'number form-control bg-grey'" :options="{ placeholder: '0.00', name: 'salary' }"></money-input>
                            {{--<input type="number" @keyup="validateInput" v-model="staffForm.salary" id="number" class="number form-control bg-grey">--}}
                            @include('errors.form-validation-error', ['inputName' => 'salary'])
                        </div>
                    </div>
                <hr>
                    <div class="form-group row py-2">
                            <div class="col-md-4 text-center">
                                <label class="col-form-label">Comment</label>
                                {{--<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, totam?</p>--}}
                            </div>
                            <div class="col-md-8">
                                <label for="Role">Brief Comment</label>
                                <textarea name="comment" rows="10" class="form-control bg-grey"></textarea>
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
