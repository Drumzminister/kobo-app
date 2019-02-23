                        
<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="chart">
        <form action="">
            <div class="form-row">
                <div class="col-md-7">
                    <h5 class="h5">Overview Graph</h5>
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="">
                        <option>All</option>
                        <option>Inflow</option>
                        <option>Outflow</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type='date' class="form-control">
                </div>
            </div>
            <div class="row">
                <canvas id="myChart" width="400" height="150"></canvas>
            </div>
        </form>
    </div>

    {{-- nav-pill section --}}
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link nav-link-black active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-black" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Inflows</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-black" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Outflows</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row py-3">
                <div class="col-md-9 col-6">
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="search"  placeholder="Search bank" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div style="cursor:pointer;" class="input-group-append searchP">
                            <span class="input-group-text vat-input px-5 mysearch" id="basic-addon2">Search</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="float-right" onclick="">
                    <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>
                    </div>
                </div>
            </div> 

            {{-- table section --}}
            <div class="bg-white px-4 table-responsive table-responsive-sm">
                <table class="table table-striped table-hover" id="dataTable">
                    <thead class="">
                        <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>12/12/2019</td>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum maiores sequi ea neque quo magni accusamus numquam animi, ex quas.</td>
                        <td class=text-success>45000</td>
                        <td class="text-green">300,000</td>
                        </tr>
                        <tr>
                        <td>12/12/2019</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, neque.</td>
                        <td class="text-danger">12000</td>
                        <td class="text-green">300,000</td>
                        </tr>

                        <tr>
                        <td>12/12/2019</td>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis assumenda, error aperiam quidem sed quasi ab vero? Omnis, dicta itaque.</td>
                        <td class="text-danger">-20000</td>
                        <td class="text-green">300,000</td>
                        </tr>

                        <tr>
                        <td>12/12/2019</td>
                        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione necessitatibus excepturi eos mollitia soluta assumenda.</td>
                        <td class="text-success">340000</td>
                        <td class="text-green">300,000</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center pb-3">
                    <a href="" class="view-more">View More</a> 
                </div>
            </div>
        </div>

        {{-- inflows --}}
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row py-3">
                <div class="col-md-9 col-6">
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="search"  placeholder="Search bank" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div style="cursor:pointer;" class="input-group-append searchP">
                            <span class="input-group-text vat-input px-5 mysearch" id="basic-addon2">Search</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="float-right" onclick="">
                    <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>
                    </div>
                </div>
            </div> 

            <div class="bg-white px-4 table-responsive table-responsive-sm">
            <table class="table table-striped table-hover" id="dataTable">
                <thead class="">
                    <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>12/12/2019</td>
                    <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum maiores sequi ea neque quo magni accusamus numquam animi, ex quas.</td>
                    <td class=text-success>45000</td>
                    <td class="text-green">300,000</td>
                    </tr>
                    <tr>
                    <td>12/12/2019</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, neque.</td>
                    <td class="text-success">12000</td>
                    <td class="text-green">300,000</td>
                    </tr>

                    <tr>
                    <td>12/12/2019</td>
                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis assumenda, error aperiam quidem sed quasi ab vero? Omnis, dicta itaque.</td>
                    <td class="text-success">20000</td>
                    <td class="text-green">300,000</td>
                    </tr>

                    <tr>
                    <td>12/12/2019</td>
                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione necessitatibus excepturi eos mollitia soluta assumenda.</td>
                    <td class="text-success">340000</td>
                    <td class="text-green">300,000</td>
                    </tr>
                </tbody>
            </table>
                <div class="text-center pb-3">
                    <a href="" class="view-more">View More</a> 
                </div>
        </div>
    </div>

    {{-- outflows --}}
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row py-3">
                <div class="col-md-9 col-6">
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="search"  placeholder="Search bank" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div style="cursor:pointer;" class="input-group-append searchP">
                            <span class="input-group-text vat-input px-5 mysearch" id="basic-addon2">Search</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="float-right" onclick="">
                    <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>
                    </div>
                </div>
            </div> 

            <div class="bg-white px-4 table-responsive table-responsive-sm">
            <table class="table table-striped table-hover" id="dataTable">
                <thead class="">
                    <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>12/12/2019</td>
                    <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum maiores sequi ea neque quo magni accusamus numquam animi, ex quas.</td>
                    <td class=text-danger>-45000</td>
                    <td class="text-green">300,000</td>
                    </tr>
                    <tr>
                    <td>12/12/2019</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, neque.</td>
                    <td class="text-danger">-12000</td>
                    <td class="text-green">300,000</td>
                    </tr>

                    <tr>
                    <td>12/12/2019</td>
                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis assumenda, error aperiam quidem sed quasi ab vero? Omnis, dicta itaque.</td>
                    <td class="text-danger">-20000</td>
                    <td class="text-green">300,000</td>
                    </tr>

                    <tr>
                    <td>12/12/2019</td>
                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione necessitatibus excepturi eos mollitia soluta assumenda.</td>
                    <td class="text-danger">-340000</td>
                    <td class="text-green">300,000</td>
                    </tr>
                </tbody>
            </table>
                <div class="text-center pb-3">
                    <a href="" class="view-more">View More</a> 
                </div>
        </div>
        </div>
    </div>
</div>
