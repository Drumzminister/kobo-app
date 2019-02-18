<section>
	        <div class="container">
	            <div class="row py-3">
	                <div class="col-md-10 col-6">
	                    <div class="input-group">
	                        <input type="text" class="form-control" v-model="search"  placeholder="Search bank" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
	                        <div style="cursor:pointer;" class="input-group-append searchP">
	                            <span class="input-group-text vat-input px-5 mysearch" id="basic-addon2">Search</span>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-2 col-6">
                    	<div class="float-right" onclick="">
                        <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>
                    </div>
                </div>

	            </div>
	        </div>
	    </section>

<section id="sale-table">
        <div class="container mt-4">                       
            <div class="bg-white px-4 table-responsive table-responsive-sm">
                <table class="table table-striped table-hover" id="dataTable">
					<thead class="">
						<tr>
						<th scope="col">Bank Name</th>
						<th scope="col">Account Name</th>
						<th scope="col">Account Number</th>
						<th scope="col">Balance</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<td scope="row"><img src={{asset('img/first-bank.png')}}> First Bank</td>
						<td>Chief Bosun</td>
						<td>1234567778</td>
						<td>300,000</td>
						</tr>
						<tr>
						<td scope="row"><img src={{asset('img/uba.png')}}>  United Bank of Africa</td>
						<td>Chief Bosun</td>
						<td>1234567778</td>
						<td>300,000</td>
						</tr>

						<tr>
						<td scope="row"><img src={{asset('img/access.png')}}>  Access Bank</td>
						<td>Chief Bosun</td>
						<td>1234567778</td>
						<td>300,000</td>
						</tr>

						<tr>
						<td scope="row"><img src={{asset('img/diamond.png')}}>  Access Bank</td>
						<td>Chief Bosun</td>
						<td>1234567778</td>
						<td>300,000</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
</section>		
