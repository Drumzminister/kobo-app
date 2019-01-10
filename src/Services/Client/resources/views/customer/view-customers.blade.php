@extends("client::layouts.app")

@section("content")
<section id="top">
    <div class="container py-3">
        <div class="row">
                <h2><a href="/customers" class="text-dark"> Customers</a></h2>
                <span class="accountant ml-auto btn btn-accountant">
                    <a href="" class="btn-accountant">
                        <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                    </a>
                </span>
        </div>
    </div>
</section>

<section>
    <div class="bg-white container mt-4 px-4 py-3">
        <div class="row">
                <div class="col-md-4">
                    <h3 class="h3">Customer's List</h3>
                    <p class="text-muted">List Of Clients Customer</p>
                </div>
                <div class="col-md-6 col-6">
                    <div class="input-group mt-2">
                        <input type="text" v-model="search" @keyup="searchCustomer" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Search</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div id="" class="mt-2 float-right" onclick="">
                        <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>
                    </div>
                </div>
        </div>
        <section id="sale-table">
            <div class="container">
                    <div class="table-responsive table-responsive-sm">
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead class="p-3">
                            <tr class="tab">
                                <th scope="col">Customer's Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone No</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="customer in customers">
                                    <td >@{{ customer.first_name }} @{{ customer.last_name }}</td>
                                    <td> @{{ customer.address }}</td>
                                    <td> @{{ customer.phone }}</td>
                                    <td> @{{ customer.email }}</td>
                                    <td> @{{ customer.website }} </td>
                                    <td class="flex" >
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                    </div>
                </div>
        </section>
    </div>
</section>

    <section id="pagination">
            <div class="container py-3">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="pagination">
                            <li class="page-item">Links</li>
                          </ul>
                    </div>
                    <div class="col-md-5">
                        <span>Go to page:</span>

                    </div>
                </div>
            </div>

        </section>




@endsection
