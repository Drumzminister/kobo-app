{{-- invoice modal --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="container p-3">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

				<div class="row px-5 pt-3">
					<div class="col-md-2">
						<img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
					</div>
					<div class="col-md-10">
						<h5 class="text-green h5">Mary Ikpe</h5>
						<h6 class="text-primary h6">Invoice NO:KB &#x2d; 1234</h6>

						<form action="" method="post">
							<div class="form row pt-3 px-3">
								<div class="col-md-4">
									<div class="p-2" id="topp">
										<h5 class="h5">Total Amount</h5>
										<h4 class="text-orange">&#8358;18,000</h4>
									</div>
								</div>
								<div class="col-md-4">
									<div class="p-2" id="topp">
										<h5 class="h5">Amount Paid</h5>
										<h4 class="text-orange">&#8358;18,000.45</h4>
									</div>
								</div>
								<div class="col-md-4">
									<div class="p-2" id="topp">
										<h5 class="h5 "> Balance</h5>
										<h4 class="text-orange">&#8358;18,000.53</h4>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="modal-body">
					<section id="sale-table">
						<div class="container">
							<div class="long-scroll">
								<div class="table-responsive table-responsive-sm" id="topp">
									<table class="table table-striped table-hover table-condensed" id="dataTable">
										<thead class="p-3">
										<tr class="tab">
											<th scope="col">Payment Date</th>
											<th scope="col">Product</th>
											<th scope="col">QTY</th>
											<th scope="col">Sales Price (&#8358;)</th>
											<th scope="col">Balance</th>


										</tr>
										</thead>
										<tbody>

										<tr>
											<td >21/08/2020 </td>
											<td>
												Lorem ipsum dolor si
											</td>
											<td> 23</td>
											<td> 43,000</td>
											<td>123,0000</td>

										</tr>

										<tr>
											<td>21/08/2020 </td>
											<td>
												Lorem ipsum dolor si
											</td>
											<td> 23</td>
											<td> 43,000</td>
											<td>123,0000</td>

										</tr>

										<tr>
											<td >21/08/2020 </td>
											<td>
												Lorem ipsum dolor si
											</td>
											<td> 23</td>
											<td> 43,000</td>
											<td>123,0000</td>
										</tr>

										<tr>
											<td >21/08/2020 </td>
											<td>
												Lorem ipsum dolor si
											</td>
											<td> 23</td>
											<td> 43,000</td>
											<td>123,0000</td>
										</tr>
										<tr>
											<td >21/08/2020 </td>
											<td>
												Lorem ipsum dolor si
											</td>
											<td> 23</td>
											<td> 43,000</td>
											<td>123,0000</td>

										</tr>                                                    <tr>
										<tr>
											<td >21/08/2020 </td>
											<td>
												Lorem ipsum dolor si
											</td>
											<td> 23</td>
											<td> 43,000</td>
											<td>123,0000</td>

										</tr>
										<tr>
											<td >21/08/2020 </td>
											<td>
												Lorem ipsum dolor si
											</td>
											<td> 23</td>
											<td> 43,000</td>
											<td>123,0000</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</section>
				</div>

				<div class="modal-foote mt-3">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col">
							<button type="button" class="btn btn-login" data-dismiss="modal">Reverse Invoice</button>
						</div>
						<div class="col">
							<button type="button" class="btn btn-started" data-dismiss="modal">Update Invoice</button>
						</div>
						<div class="col">
							<button type="button" class="btn btn-danger px-5" data-dismiss="modal">Close</button>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

{{-- end of invoice modal --}}