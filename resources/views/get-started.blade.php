<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kobo accountant</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="Description" content="Accounting site, Accounting App ">
  <meta content="koboaccountant, accounting, kobo" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <!-- Favicons -->
  <link href="https://res.cloudinary.com/syfon/image/upload/v1536857508/favicon.png" rel="icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

{{-- styles --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">



</head>
<body>
   {{--{{dd(Auth::user())}}--}}
    <div id="load"></div>
         <section id="particles"></section>

         <section class="pricing py-5">
            <div class="container">
              <div class="row">
                <!-- Basic Tier -->

                <div class="col-md-3">
                  <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                      <h5 class="card-title text-muted text-uppercase text-center">{{$plans[0]['name']}}</h5>
                      <h6 class="card-price text-center">&#8358;{{number_format($plans[0]['amount']/100,2) }}<span class="period">monthly</span></h6>
                      <hr>
                      <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Book Keeping</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Asset Register</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Financial Advisory</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Working Capital</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Bank Reconciliation</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Budget Preparation and Analysis</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Budgetary Controls</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Cost reduction strategies</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Internal Controls Review</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Investment analysis and advisory</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Preparation of Annual financial statements</li>
                      </ul>
                      <button onclick="payWithPaystack('{{$plans[0]['plan_code']}}', {{$plans[0]['amount']}}) "
                              class="btn btn-block btn-loginn text-uppercase">Make Payment</button>
                    </div>
                  </div>
                </div>
                <!-- Classic Tier -->
                <div class="col-md-3">
                  <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                      <h5 class="card-title text-muted text-uppercase text-center">{{$plans[3]['name']}}</h5>
                      <h6 class="card-price text-center">&#8358;{{number_format($plans[3]['amount']/100,2) }}<span class="period">monthly</span></h6>
                      <hr>
                      <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Book Keeping</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Asset Register</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Financial Advisory</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Working Capital</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Bank Reconciliation</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Budget Preparation and Analysis</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Budgetary Controls</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Cost reduction strategies</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Internal Controls Review</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Investment analysis and advisory</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Preparation of Annual financial statements</li>

                      </ul>
                      <button onclick="payWithPaystack('{{$plans[3]['plan_code']}}', {{$plans[3]['amount']}}) "
                              class="btn btn-block btn-loginn text-uppercase">
                        Make Payment
                      </button>
                    </div>
                  </div>
                </div>
                <!-- Standard Tier -->
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-muted text-uppercase text-center">{{$plans[2]['name']}}</h5>
                      <h6 class="card-price text-center">&#8358;{{number_format($plans[2]['amount']/100,2) }}<span class="period">monthly</span></h6>
                      <hr>
                      <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Book Keeping</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Asset Register</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Financial Advisory</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Working Capital</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Bank Reconciliation</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Budget Preparation and Analysis</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Budgetary Controls</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Cost reduction strategies</li>
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Internal Controls Review</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Investment analysis and advisory</li>
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Preparation of Annual financial statements</li>

                      </ul>
                      <button onclick="payWithPaystack('{{$plans[2]['plan_code']}}', {{$plans[2]['amount']}}) "
                          class="btn btn-block btn-loginn text-uppercase">
                        Make Payment
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Pro Tier -->
                <div class="col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">{{$plans[1]['name']}}</h5>
                        <h6 class="card-price text-center">&#8358;{{number_format($plans[1]['amount']/100,2) }}<span class="period">monthly</span></h6>
                        <hr>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Book Keeping</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Asset Register</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Financial Advisory</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Working Capital</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Bank Reconciliation</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Budget Preparation and Analysis</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Budgetary Controls</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Cost reduction strategies</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Internal Controls Review</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Investment analysis and advisory</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Preparation of Annual financial statements</li>
                            </ul>
                        <button onclick="payWithPaystack('{{$plans[1]['plan_code']}}', {{$plans[1]['amount']}}) " class="btn btn-block btn-loginn text-uppercase">Make Payment</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
         </section>
  


<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    let email = "{{Auth::user()->email}}"
  function payWithPaystack(plan, amount){
    var handler = PaystackPop.setup({
    key: 'pk_test_faa9bf8429df2dc056462940439cea55a237cb7b',
    email: "{{Auth::user()->email}}",
    amount: amount,
    plan: plan,
    metadata: {
      custom_fields: [
        {
            display_name: "{{Auth::user()->first_name}} {{Auth::user()->last_name}}",
            variable_name: "mobile_number",
            value: "{{Auth::user()->phone}}"
        }
      ]
    },
    callback: function(response){
        location.href = "/payment/success/?authorization="+response.reference+"&customer="+email+"&plan="+plan;
        // alert(response.reference);
    },
    onClose: function(){
        alert('window closed');
    }
  });
    handler.openIframe();
  }
</script>
</body>
</html>
