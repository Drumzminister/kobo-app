    <section id="top">
        <div class="container p-2">
            <div class="row py-2">
                <h2><a href="/client/banking" class="text-dark">Banks</a></h2>
                <div class="row ml-auto ">
                    <button class="col btn bank-button btn-addBank mr-2" data-toggle="modal" data-target="#add-bank">
                        Add Bank               
                    </button>
                    <button class="accountant btn bank-button btn-accountant btn-transfer col" data-toggle="modal" data-target="#make-transfer">
                        Make a transfer           
                    </button>
                </div>
            </div>
        </div>
    </section>

    
    @include('client::banking.addBank-modal')

    @include('client::banking.makeTransfer-modal')

