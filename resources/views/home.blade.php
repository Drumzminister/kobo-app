@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard | {{Auth::user()->roles->role}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as !{{Auth::user()->first_name}}
                    @if(Auth::user()->roles->role == "Client")
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Create Company
                            </button>
                            
                            @include('sessions.message')
                               
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Company</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('company') }}">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="inputEmail4">company</label>
                                                <input type="company" name="name" class="form-control" id="inputEmail4" placeholder="name">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create</button>  
                                        </form>                                  
                                        
                                    </div>
                                    <div class="modal-footer">                   
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                                      
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
