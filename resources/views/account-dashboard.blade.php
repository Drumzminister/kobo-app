@extends('layouts.app-acct')

@section('content')
<section id="top">
    <div class="container pt-3 pb-3">
        <h2>
            Dashboard
        </h2>
    </div>
</section>
<section id="performance">
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-7" >
                <div class="bg-white p-4" id="topp">
                    <h3 class="h3">Overall Performance</h3>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="test-circle"></div>
                                        <div class= "text-center">
                                            <h6 class="h6 ">Performance</h6>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="test-circle2"></div>
                                        <div class= "text-center">
                                            <h6 class="h6">Performance</h6>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="test-circle3"></div>
                                        <div class= "text-center">
                                            <h6 class="h6">Performance</h6>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5" >
                <div class="bg-white p-5" id="topp">
                    <h3 class="h3">HISTORY</h3>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection