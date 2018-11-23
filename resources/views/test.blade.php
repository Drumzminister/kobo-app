

<html lang="en">


<head>
  <title>Laravel 5 - Dynamic autocomplete search using select2 JS Ajax</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

 
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>


<body>


<div class="container">
<select id="ddlViewBy">
  <option value="1">test1</option>
  <option value="2" selected="selected">test2</option>
  <option value="3">test3</option>
</select>


  <h2>Laravel 5 - Dynamic autocomplete search using select2 JS Ajax</h2>
  <br/>
<form action="form" method="post">
  
  <select class="itemName" name="itemName" style="width=200px">
@foreach($customers as $customer)
    <option>{{$customer->first_name}} </option>
@endforeach
  </select>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
</div>


<script>

    $('.itemName').select2({
        placeholder: 'Select an item',
        ajax: {
          url: 'getCustomers',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
          },
          cache: true,
        }
      });
</script>
</body>
</html>

