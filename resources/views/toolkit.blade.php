@extends("layouts.app-acct")

@section('content')
<section id="top">
        <div class="container py-3">
            {{-- <div class="row"> --}}
                <div class="col">
                    <h3 class="h3">Toolkits</h3>
                {{-- </div> --}}
                
            </div>
            <div class="input-group my-3">
                <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Filter<i class="fa fa-filter px-2"></i></span>
                </div>
            </div>
        </div>
    </section>
    

@endsection