@extends('layouts.app')
<style>
input {
    border: none;
    background: transparent;
}
</style>
@section('content')
<section id="particles"></section>
    <div id="container">  
        <div class="progress" style="height: 35px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:50px;width:25%;">
            <h4> 25%</h4>
            </div>
        </div>
    </div>
    <div class="container bg-white mt-5">
            <div class="row py-3">
                    <div class="col-md-9">
                        <div aria-label="breadcrumb arr-right">
                                <ol class="breadcrumb bg-white">
                                    <li class="breadcrumb-item"><a href="/assets">Opening Balance</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Existing Assets</li>                
                                </ol>
                        </div>   
                    </div>
                    <div class="col-md-3">
                            <div class="dates input-group input-group-lg">
                                <input type="text"  class="form-control date-picker" id="assetDate" value="{{Date('m/d/Y')}}" name="event_date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar icon" id="datepicker" name="event_date" ></i></span>
                                </div> 
                            </div>
                    </div>
                    
                </div>       
        <div class="bg-white mt">
                
            <div class="table-responsive table-responsive-sm p-4 ">
                <table  width="200" class="table table-striped table-hover table-style"  id="assetTable">
                    <thead class="p-3">
                      <tr class="tab">
                        <th scope="col">Asset Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Cost Price (&#8358;)</th>
                        <th scope="col" onclick="addAsset('assetTable')" style="cursor: pointer;"><i class="fa fa-plus-square" style="font-size:24px" value="Add Row"></i></th>
            
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($assets as $asset)
                            <tr>
                                <td>{{$asset->name}}</td>
                                <td>{{$asset->category}}</td>
                                <td>{{number_format($asset->price, 2)}}</td>
                                <td><i class="fa fa-edit pr-2" style="font-size:24px" onclick="makeEditable(this.parentElement.parentElement)"></i><i class="fa fa-trash-o" style="font-size:24px"  onclick="deleteAsset(this.parentElement.parentElement)"></i></td>
                                <input type="hidden" class="id" value="{{$asset->id}}">
                            </tr>
                        @empty
                            <tr>
                                <td><input type="text" class="form-control name"></td>
                                <td><input type="text" class="form-control category"></td>
                                <td><input type="number" class="form-control price"></td>
                                <td><button class="btn btn-sm btn-success px-3" onclick="saveAssets(this.parentElement.parentElement)">Add</button></td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="row">
                    <div class = "col">
                            <a class="btn btn-started" href="/">Previous</a>
                    </div>
                    <div class = "col">
                            <a class="btn btn-started float-right" href="/opening/debtors">Next</a>
                    </div>
                </div>
            </div> 
                       
        </div>
        
    </div>

<script src="/js/assets.js">
</script>
@endsection