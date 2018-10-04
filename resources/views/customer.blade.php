<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form method="post" action="customer">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="name" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="website" class="form-control" name="website">
                    </div>
                    <div class="form-group">
                        <label for="account_id">Account Id</label>
                        <input type="account_id" class="form-control" name="account_id">
                    </div>
                    <div class="form-group">
                        <label for="isActive">isActive</label>
                        <input type="isActive" class="form-control" name="isActive">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>