<template>
	<div>
		<section>
	        <div class="container">
	            <div class="row py-3">
	                <div class="col-md-10 col-6">
	                    <div class="input-group">
	                        <input type="text" class="form-control" v-model="search"  placeholder="Search different sources, purposes or status of loans" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
	                        <div style="cursor:pointer;" @click="searchLoan()" class="input-group-append searchP">
	                            <span class="input-group-text vat-input px-5 mysearch" id="basic-addon2">Search</span>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-2 col-6">
	                    <div class="">
	                        <button style="" @click="showFilterOptions = !showFilterOptions" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>
	                    </div>
	                    <div class="box bg-white py-2" v-if="showFilterOptions">
	                        <ul class="p-0 mb-0">
	                            <li class="d-block py-1 px-2 mb-2" @click="filterBy('source')">By Source</li>
	                            <li class="d-block py-1 px-2 mb-2" @click="filterBy('status')">By Status</li>
	                        </ul>
	                    </div>
	                </div>

	            </div>
	        </div>
	    </section>

	    <section id="sale-table">
	        <div class="container">

	            <div class="bg-white p-4">

	                <div v-if="!loadingLoans" class="table-responsive table-responsive-sm">

	                    <table class="table table-striped table-hover" id="dataTable">
	                        <thead class="p-3">
	                            <tr class="tab">
	                                <th scope="col">Source</th>
	                                <th scope="col">Purpose</th>
	                                <th scope="col">Amount (&#8358;)</th>
	                                <th scope="col">Status</th>
	                                <th scope="col">Period</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr v-for="loan in loans" style="cursor: pointer;" @click="$parent.displayLoanDetails(loan, $event)">
	                                <td>{{loan.source_name}}</td>
	                                <td>{{loan.description}}</td>
	                                <td>{{loan.amount | numberFormat}}</td>
	                                <td><a :class="loan.status">{{loan.status}}</a></td>
	                                <td> {{loan.term}} {{loan.period}}s </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                    <div v-if="loans.length === 0 && search.trim()" class="alert alert-info">
	                        <h5>No loans found. Please redefine the search parameter</h5>
	                    </div>
	                </div>
	                <div v-if="loadingLoans" class="d-flex justify-content-center">
	                    <img src="/img/loader.gif">
	                </div>
	            </div>

	        </div>
	    </section>

	    <section id="pagination">
	        <div class="container py-3">
	            <div class="row">
	                <div class="col-md-7">
	                    <ul class="pagination" v-if="!hasSearched && displayPaginator">
	                        <li class="page-item" v-if="canPrevious"><button class="page-link" @click="toPrevious"><< Previous</button></li>
	                        <li class="page-item" v-if="!canPrevious"><button class="page-link" disabled><< Previous</button></li>
	                        <li class="page-item ml-3" v-if="canNext"><button  class="page-link" @click="toNext">Next >></button></li>
	                        <li class="page-item ml-3" v-if="!canNext" ><button class="page-link" disabled>Next >></button></li>
	                    </ul>
	                    <ul class="pagination" v-if="hasSearched">
	                        <li class="page-item"><button class="page-link" @click="toOriginal"><< Back</button></li>
	                    </ul>

	                </div>
	            </div>
	        </div>
	    </section>	
	</div>
	
</template>

<style scoped>
	.box li {
        cursor: pointer;
        background-color: #fdfdfd;
    }
    .box li:hover {
        cursor: pointer;
        background-color: #dedede;
    }
    .box {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        z-index: 2;
        position: absolute;
        width: 100%;
        margin-top: 2px;
        border-radius: 3px;
    }
    .mysearch {
        border: solid 1px #eb7e00;
    }
    .searchP :hover {
        background-color: #eb7e00;
    }
</style>

<script>
	export default {
		name: "AllLoans",
		data () {
			return {
				total:0,
				loans: [],
		        search: "",
		        sources: [],
		        canNext:true,
		        pageCount: 1,
		        currentLoan: {},
		        paymentAmount: 0,
		        hasSearched: false,
		        canPrevious: false,
		        loadingLoans: true,
		        currentLoanPayments: [],
		        displayPaginator: false,
		        showFilterOptions: false,	
			}
		},
		filters: {
			numberFormat (value) {
	            let number = Number(value);
	            if (isNaN(number)) {return value;}
	            const formatter = new Intl.NumberFormat('en-US', {
	                minimumFractionDigits: 2,
	                maximumFractionDigits: 2
	            });
	            return formatter.format(number);
	        }
		},
		mounted () {
			this.loadingLoans = false;
			this.loans = window._loans;
			this.sources = window._sources;
		},
		watch: {
			pageCount () {
	            this.canPrevious = this.pageCount > 1;
	            this.canNext = this.total > this.pageCount * 10;
	        },
	        loans () {
	            this.loans.forEach(loan => {
	                this.sources.forEach(source => {
	                    if (loan.loan_source_id === source.id ) {
	                        loan.source_name = source.name;
	                    }
	                });
	            });
	        }
		},
		methods: {
			filterBy (key) {
            if (key === "source") {
                let loanArray = [];
                let sourceNames = [];
                this.sources.forEach(source => {
                   sourceNames.push(source.name);
                });
                sourceNames.sort().forEach(source => {
                    loanArray.push(...this.loans.filter(loan => loan.source_name === source))
                });
                this.loans = loanArray;
            } else if (key === 'status') {
                let loanArray = [];
                let statuses = ['running', 'completed'];
                statuses.forEach(status => {
                    loanArray.unshift(...this.loans.filter(loan => loan.status === status))
                });
                this.loans = loanArray;
            }

            this.showFilterOptions = false;
        },
			toNext () {
	            this.loadingLoans = true;
	            axios.get(`/loans/paginated?page=${++this.pageCount}`).then(res => {
	                this.loadingLoans = false;
	                this.loans = res.data.loans;
	                this.total = res.data.total;

	                this.hasSearched = false;
	            });
	        },
	        searchLoan () {
	            let query = this.search;
	            if (!query.trim()) {
	                return;
	            }
	            this.loadingLoans = true;
	            axios.get(`/loans/search?query=${query.trim()}`).then(res => {
	                this.loadingLoans = false;
	                this.hasSearched = true;
	                this.loans = res.data.results;
	            }).catch (err => {
	                console.error(err);
	            });
	        },
	        toPrevious () {
	            this.loadingLoans = true;
	            axios.get(`/loans/paginated?page=${--this.pageCount}`).then(res => {
	                this.loadingLoans = false;
	                this.loans = res.data.loans;
	                this.total = res.data.total;
	                this.hasSearched = false;
	                this.loans.forEach(loan => {
	                    this.sources.forEach(source => {
	                        if (loan.loan_source_id === source.id ) {
	                            loan.source_name = source.name;
	                        }
	                    });

	                });
	            })
	        },
	        toOriginal () {
	            this.loadingLoans = true;
	            this.search = "";
	            axios.get('/loans/paginated').then(res => {
	                this.loadingLoans = false;
	                this.total = res.data.total;
	                if (res.data.total > 10) {
	                    this.displayPaginator = true
	                }
	                this.loans = res.data.loans;
	                this.hasSearched = false;
	            })
	        }
		}
	}
</script>
