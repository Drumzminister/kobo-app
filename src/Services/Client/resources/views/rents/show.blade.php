@extends("client::layouts.app")

@section("content")

    <div id="rentApp">
        <section id="top">
            <div class="container py-3">
                <div class="row">
                    <h2><a href="/rent" class="text-dark"> Rent</a></h2>
                    <span class="accountant ml-auto btn btn-accountant">
                    <a href="" class="btn-accountant">
                        <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                    </a>
                </span>
                </div>
            </div>
        </section>

        <section>
            <div class="container mt-3">
                <div class="bg-white p-4">
                    <div class="form row py-3">
                        <div class="col-md-4">
                            <div class="p-3 bg-white text-muted" id="topp">
                                <h5 class="h5">Total Rental Properties</h5>
                                <h2 class="">&#8358;{{ number_format($total, 2) }}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-grey text-dark" id="topp">
                                <h5 class="h5">Total Used Rent</h5>
                                <h2 class="">&#8358;{{ number_format($total_used_rent, 2) }}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-green text-white" id="topp">
                                <h5 class="h5 ">Total Unused Rent</h5>
                                <h2 class="">&#8358;{{ number_format($total - $total_used_rent, 2) }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-md-3">
                            <button class="btn btn-addsale px-3" @click="setRentParams" data-toggle="modal" data-target="#addRentModal">Add Rent</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="sale-table">
            <div class="container">

                <div class="bg-white px-4">

                    <div class="table-responsive table-responsive-sm">
                        <!-- Rents Table -->
                        @include('client::rents._rents_table')
                    </div>
                    <div class="text-center pb-3">
                        <a href="{{ route('client.rent.show-all') }}" class="view-more">View More</a>
                    </div>
                </div>

            </div>
        </section>



        <!--Add Rent Modal -->
        @include('client::rents._add_rent_modal')

    </div>
@endsection
