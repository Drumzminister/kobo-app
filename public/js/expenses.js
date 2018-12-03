function addExpense(id) {

    let tbody = document.querySelector(`#${id} tbody`);
    let row = document.createElement('tr');

    let td1 = document.createElement('td');
    let dateInput = document.createElement('input');
    dateInput.type = "date";
    dateInput.classList = "form-control myDate";
    dateInput.max = new Date().toISOString().split("T")[0];
    td1.appendChild(dateInput);

    let td2 = document.createElement('td');
    let descInput = document.createElement('textarea');
    descInput.classList = "form-control myDesc"
    td2.appendChild(descInput);

    let td3 = document.createElement('td');
    let amountInput = document.createElement('input');
    amountInput.type = "number";
    amountInput.classList ="form-control myAmt"
    td3.appendChild(amountInput);

    let td4 = document.createElement('td');
    let typeInput = document.createElement('input');
    typeInput.type = "text";
    typeInput.classList = "form-control myType";
    td4.appendChild(typeInput);

    let td5 = document.createElement('td');
        td5.classList = "d-flex";
    let bankInput = document.createElement('input');
        bankInput.type = "text";
        bankInput.classList = "form-control mr-1 myBank";
    let saveBtn = document.createElement('button');
        saveBtn.classList = "btn btn-xs btn-success p-1";
        saveBtn.innerText = "Save"
        saveBtn.addEventListener('click',
            function () {
                save(row);
            });
    td5.appendChild(bankInput);
    td5.appendChild(saveBtn);

    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);
    row.appendChild(td5);

    tbody.appendChild(row);
}

function save(row)
{
    let token = document.querySelector('meta[name="csrf-token"]').content;
    let date = row.querySelector('.myDate');
    let desc = row.querySelector('.myDesc');
    let amt = row.querySelector('.myAmt');
    let type = row.querySelector('.myType');
    let bank = row.querySelector('.myBank');

    if (date.value.trim() && desc.value.trim() && amt.value.trim() && type.value.trim() && bank.value.trim()) {
        let formData = new FormData();
        formData.append('_token', token);
        formData.append('date', date.value);
        formData.append('details', desc.value);
        formData.append('class_type', type.value);
        formData.append('amount', amt.value);
        formData.append('payment_mode', bank.value);

        axios.post('/expenses/create', formData).then(function (res) {
            swal('Saved', res.data.message, 'success');

            hideElements(row);
        }).catch(function (err) {
           swal('Error', 'An error occurred', 'error');
           console.error(err);
        });
    }
    else {
        swal('Error', 'Some input fields are empty', 'error');
    }
    return;

}

function hideElements(row) {
    if (document.querySelector('#noExpense')){
        document.querySelector('#noExpense').style.display = "none";
    }
    let date = row.querySelector('.myDate');
    assignValToParent(date);

    let desc = row.querySelector('.myDesc');
    assignValToParent(desc);

    let amt = row.querySelector('.myAmt');
    assignValToParent(amt);

    let type = row.querySelector('.myType');
    assignValToParent(type);

    let bank = row.querySelector('.myBank');
    assignValToParent(bank);


}
function hide(elem)
{
    elem.style.display = "none";
}
