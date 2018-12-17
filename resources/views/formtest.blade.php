@extends('layouts.app')

@section('content')
<table id="tableRow" class="table table-bordered table-responsive-md table-striped text-center">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col" class="tool" data-tip="Add all your inventory here." tabindex="1">
                            Inventory Items
                            </th>
                            <th scope="col" class="tool" data-tip="Provide description of item" tabindex="1">
                                    Description
                                    </th>
        
                            <th scope="col" class="tool" data-tip="Include the quantity sold." tabindex="1">
                                QTY sold
                            </th>
                            <th scope="col"class="tool" data-tip="Add price per head of product" tabindex="1">
                                    Price of product (&#8358;)
                                </th>      
                          </tr>
                        </thead>
                        <tbody id="salesTable">
                            <tr>
                            <td><input type="text" id="description" class="form-control description "></td>
                            <td><input type="number" class="quantity form-control"></td>
                            <td>
                            <select class="option">
                                <option>The First Option</option>
                                <option>you</option>
                            </select>
                            </td>   
                            <td><input type="date" class="date"></td>                         
                        </tr>
                    </tbody>                      
                </table>
                <button class="btn btn-primary" id="submit" onclick="submitted()">Submit</button>
@endsection
<script src="js/sales.js"></script>