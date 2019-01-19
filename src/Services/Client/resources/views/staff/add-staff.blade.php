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
                        <input v-model="staffForm.first_name" type="text" class="form-control bg-grey" id="" >

                        <label for="last name">Last name</label>
                        <input v-model="staffForm.last_name" type="text" class="form-control bg-grey" id="" >

                        <label for="phone">Phone number</label>
                        <input v-model="staffForm.phone" type="text" class="form-control bg-grey" id="" >

                        <label for="email">Email</label>
                        <input v-model="staffForm.email" type="text" class="form-control bg-grey" id="" >

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
                        <select v-model="staffForm.role" name="" id="" class="form-control bg-grey">
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
                            <input v-model="staffForm.years_of_experience" type="text" class="form-control bg-grey" id="" value="">

                            <label for="Role">Date  Of Employment</label>
                            <input v-model="staffForm.employed_date" type="date" />

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
                            <select v-model="staffForm.salary" name="" id="" class="form-control bg-grey">
                                 <option selected></option>
                                <option>50000</option>
                                    <option>100000</option>
                                    <option>150000</option>
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
                                <textarea v-model="staffForm.comment" name="" id="" rows="10" class="form-control bg-grey"></textarea>
                            </div>
                        </div>

                    <div class="form-row mt-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" @click="createStaff" class="btn btn-addsale">Save Information</button>
                        </div>
                    </div>
              </form>
        </div>
    </div>
</section>
@endsection
