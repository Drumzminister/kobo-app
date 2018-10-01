<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">              
                    <div class="form-group">
                        <h2>Get Request</h2>

                        <button type="submit" class="btn btn-primary" id="getRequest">Hello</button>
                    </div>
            </div>
        </div>
            <div class="col-lg-6">
                <h2>Register Form</h2>
                <form id="register">
                    @csrf
                    <label for="firstname"></label>
                    <input type="text" id="firstname" class="form-control">

                    <label for="lastname"></label>
                    <input type="text" id="lastname" class="form-control">
                    
                    <br>
                    <input type="submit" value="register" class="btn btn-primary">
                    
                </form>
            </div>
            <div id="getRequestData">
               
            </div>
    </div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script>
    $(document).ready(function(){
        
        $('#getRequest').click(function(){
           // $.get('getRequest', function(data){
            //    $('#getRequestData').append(data);
              //  console.log(data);
            // });
            $.ajax({
                type: "GET",
                url: "getRequest",
                success: function(data) {
                    console.log(data);
                    $("#getRequest").append(data);
                }
            })
        });
        $('#register').submit(function(e){
            e.preventDefault();            
            var fname = $('#firstname').val();
            var lname = $('#lastname').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // $.post('register', {firstname:fname, lastname:lname}, function(data){
            //    console.log(data);
            //    $('#postRequestData').html(data);
            // });
            var dataString = "firstname="+fname+"&lastname="+lname;
            $.ajax({
                type: "POST",
                url: "register",
                data: dataString,
                success: function(dataString){
                    console.log(dataString);
                    //$("#postRequestData").html(data);
                }
            });
        })
    });
</script>
<?php
Route::get('/search', 'CustomerController@search');
Route::get('/getRequest', function(){
    if(Request::ajax()){
        return 'getRequest has been loaded';
    };
});

Route::post('/register',  function(){
    if(Request::ajax()) {
        return Response::json(Request::all());
    }
});
?>
</body>
</html>