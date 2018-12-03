let token = document.querySelector('meta[name="csrf-token"]').content;
function addDebtor(id)
{
    let tbody = document.querySelector(`#${id} tbody`);
    let row = document.createElement('tr');

    let td1 = document.createElement('td');
    let dateInput = document.createElement('input');
    dateInput.type = "text";
    dateInput.classList = "form-control company_name";
    td1.appendChild(dateInput);

    let td2 = document.createElement('td');
    let typeInput = document.createElement('input');
    typeInput.type = "text";
    typeInput.classList = "form-control details";
    td2.appendChild(typeInput);

    let td3 = document.createElement('td');
    let amountInput = document.createElement('input');
    amountInput.type = "number";
    amountInput.classList ="form-control amount"
    td3.appendChild(amountInput);

    let td4 = document.createElement('td');
    let saveBtn = document.createElement('button');
    saveBtn.classList = "btn btn-sm btn-success px-3";
    saveBtn.innerText = "Add";
    saveBtn.addEventListener('click',
        function () {
            saveDebtor(row);
        });
    td4.appendChild(saveBtn);

    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);

    tbody.appendChild(row);
}

function saveDebtor(row)
{
    let date = document.querySelector('#debtorDate').value;
    if (!date.trim()) {
        swal("Error", "Please select a date", "error");
        return;
    }
    let company_name = row.querySelector('.company_name');
    let details = row.querySelector('.details');
    let amt = row.querySelector('.amount');
    let btn = row.querySelector('button');
    if (details.value.trim() && amt.value.trim() && company_name.value.trim()) {
        let formData = new FormData();
        formData.append('_token', token);
        formData.append('date', date);
        formData.append('details', details.value.trim());
        formData.append('amount', amt.value.trim());
        formData.append('company_name', company_name.value.trim());
        btn.innerText="Loading...";
        axios.post('/opening/debtor', formData).then(function (res) {
            let id = document.createElement('input');
            id.type = "hidden";
            id.value = res.data.id;
            id.classList = "id";
            row.appendChild(id);
            hideElements(row);
        }).catch(function (err) {
            console.error(err);
        });
    }
    else {
        swal("Error", "Some input fields are empty", "error");
    }

}

function hideElements(row)
{
    let btn = row.querySelector('button');
    btn.parentElement.innerHTML = "<i class=\"fa fa-edit pr-2\" onclick=\"makeEditable(this.parentElement.parentElement)\" style=\"font-size:24px; cursor: pointer;\"></i><i class=\"fa fa-trash-o\" onclick=\"deleteDebtor(this.parentElement.parentElement)\" style=\"font-size:24px; cursor: pointer;\"></i>"
    let company_name = row.querySelector('.company_name');
    assignValToParent(company_name);

    let details = row.querySelector('.details');
    assignValToParent(details);

    let amount = row.querySelector('.amount');
    assignValToParent(amount);
}

function makeEditable(row)
{
    let id = row.querySelector('.id').value;
    let tds = row.querySelectorAll('td');
    let td1 = document.createElement('td');
    let dateInput = document.createElement('input');
    dateInput.type = "text";
    dateInput.value = tds[0].innerText;
    dateInput.classList = "form-control company_name";
    td1.appendChild(dateInput);

    let td2 = document.createElement('td');
    let typeInput = document.createElement('input');
    typeInput.type = "text";
    typeInput.value = tds[1].innerText;
    typeInput.classList = "form-control details";
    td2.appendChild(typeInput);

    let td3 = document.createElement('td');
    let amountInput = document.createElement('input');
    amountInput.type = "number";
    amountInput.value = Number(tds[2].innerText.split(',').join(''));
    amountInput.classList ="form-control amount"
    td3.appendChild(amountInput);

    let td4 = document.createElement('td');
    let saveBtn = document.createElement('button');
    saveBtn.classList = "btn btn-sm btn-success px-3";
    saveBtn.innerText = "Update"
    saveBtn.addEventListener('click',
        function () {
            updateDebtor(row, id);
        });
    td4.appendChild(saveBtn);

    row.innerHTML ="";
    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);
}

function updateDebtor(row, id)
{
    let date = document.querySelector('#debtorDate').value;
    if (!date.trim()) {
        swal("Error", "Please select a date", "error");
        return;
    }
    let company_name = row.querySelector('.company_name');
    let details = row.querySelector('.details');
    let amt = row.querySelector('.amount');
    let btn = row.querySelector('button');
    if (details.value.trim() && amt.value.trim() && company_name.value.trim()) {
        let formData = new FormData();
        formData.append('_token', token);
        formData.append('date', date);
        formData.append('details', details.value.trim());
        formData.append('amount', amt.value.trim());
        formData.append('company_name', company_name.value.trim());
        btn.innerText="Loading...";
        axios.post(`/opening/debtor/${id}`, formData).then(function (res) {
            let id = document.createElement('input');
            id.type = "hidden";
            id.value = res.data.id;
            id.classList = "id";
            row.appendChild(id);
            hideElements(row);
        }).catch(function (err) {
            console.error(err);
        });
    }
    else {
        swal("Error", "Some input fields are empty", "error");
    }
}

function deleteDebtor(row)
{
    swal({
        title: "Are you sure?",
        text: "You are trying to delete this entry",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let id = row.querySelector('.id').value;
            axios.post(`/opening/debtor/${id}/delete`).then(function (res) {
                row.remove();
            }).catch(function (err) {
                console.error(err);
            });
        } else {

        }
    }).catch(function (err) {
        console.error(err);
    })
}