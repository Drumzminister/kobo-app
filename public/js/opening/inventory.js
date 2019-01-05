$(function() {
    let date = new Date();
    let currentMonth = date.getMonth();
    let currentDate = date.getDate();
    let currentYear = date.getFullYear();
    $('#inventoryDate').datepicker({
        maxDate: new Date(currentYear, currentMonth, currentDate),

    });
});

function addInventory(id)
{
    let tbody = document.querySelector(`#${id} tbody`);
    let row = document.createElement('tr');

    let td1 = document.createElement('td');
    let dateInput = document.createElement('input');
    dateInput.type = "text";
    dateInput.classList = "form-control vendor";
    td1.appendChild(dateInput);

    let td2 = document.createElement('td');
    let typeInput = document.createElement('input');
    typeInput.type = "text";
    typeInput.classList = "form-control details";
    td2.appendChild(typeInput);

    let td3 = document.createElement('td');
    let quantityInput = document.createElement('input');
    quantityInput.type = "number";
    quantityInput.classList ="form-control quantity";
    td3.appendChild(quantityInput);

    let td4 = document.createElement('td');
    let cost_priceInput = document.createElement('input');
    cost_priceInput.type = "number";
    cost_priceInput.classList ="form-control cost_price";
    td4.appendChild(cost_priceInput);

    let td5 = document.createElement('td');
    let selling_priceInput = document.createElement('input');
    selling_priceInput.type = "number";
    selling_priceInput.classList ="form-control selling_price";
    td5.appendChild(selling_priceInput);

    let td6 = document.createElement('td');
    let saveBtn = document.createElement('button');
    saveBtn.classList = "btn btn-sm btn-success px-3";
    saveBtn.innerText = "Add"
    saveBtn.addEventListener('click',
        function () {
            saveInventory(row);
        });
    td6.appendChild(saveBtn);

    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);
    row.appendChild(td5);
    row.appendChild(td6);

    tbody.appendChild(row);
}

function saveInventory(row)
{
    let date = document.querySelector('#inventoryDate').value;
    if (!date.trim()) {
        swal("Error", "Please select a date", "error");
        return;
    }
    let vendor = row.querySelector('.vendor');
    let details = row.querySelector('.details');
    let qty = row.querySelector('.quantity');
    let costPrice = row.querySelector('.cost_price');
    let sellingPrice = row.querySelector('.selling_price');
    let btn = row.querySelector('button');
    if (vendor.value.trim() && qty.value.trim() && details.value.trim() && costPrice.value.trim() && sellingPrice.value.trim()) {
        let formData = new FormData();
        formData.append('_token', token);
        formData.append('date', date);
        formData.append('details', details.value.trim());
        formData.append('quantity', qty.value.trim());
        formData.append('cost_price', costPrice.value.trim());
        formData.append('selling_price', sellingPrice.value.trim());
        formData.append('vendor', vendor.value.trim());
        btn.innerText="Loading...";
        axios.post('/opening/inventory', formData).then(function (res) {
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
    btn.parentElement.innerHTML = "<i class=\"fa fa-edit pr-2\" onclick=\"makeEditable(this.parentElement.parentElement)\" style=\"font-size:24px; cursor: pointer;\"></i><i class=\"fa fa-trash-o\" onclick=\"deleteInventory(this.parentElement.parentElement)\" style=\"font-size:24px; cursor: pointer;\"></i>"
    let vendor = row.querySelector('.vendor');
    assignValToParent(vendor);

    let details = row.querySelector('.details');
    assignValToParent(details);

    let quantity = row.querySelector('.quantity');
    assignValToParent(quantity);

    let costPrice = row.querySelector('.cost_price');
    assignValToParent(costPrice);

    let sellingPrice= row.querySelector('.selling_price');
    assignValToParent(sellingPrice);
}

function makeEditable(row)
{
    let id = row.querySelector('.id').value;
    let tds = row.querySelectorAll('td');

    let td1 = document.createElement('td');
    let dateInput = document.createElement('input');
    dateInput.type = "text";
    dateInput.value = tds[0].innerText;
    dateInput.classList = "form-control vendor";
    td1.appendChild(dateInput);

    let td2 = document.createElement('td');
    let typeInput = document.createElement('input');
    typeInput.type = "text";
    typeInput.classList = "form-control details";
    typeInput.value = tds[1].innerText;
    td2.appendChild(typeInput);

    let td3 = document.createElement('td');
    let quantityInput = document.createElement('input');
    quantityInput.type = "number";
    quantityInput.classList ="form-control quantity";
    quantityInput.value = Number(tds[2].innerText.split(',').join(''));
    td3.appendChild(quantityInput);

    let td4 = document.createElement('td');
    let cost_priceInput = document.createElement('input');
    cost_priceInput.type = "number";
    cost_priceInput.classList ="form-control cost_price";
    cost_priceInput.value = Number(tds[3].innerText.split(',').join(''));
    td4.appendChild(cost_priceInput);

    let td5 = document.createElement('td');
    let selling_priceInput = document.createElement('input');
    selling_priceInput.type = "number";
    selling_priceInput.classList ="form-control selling_price";
    selling_priceInput.value = Number(tds[4].innerText.split(',').join(''));
    td5.appendChild(selling_priceInput);


    let td6 = document.createElement('td');
    let saveBtn = document.createElement('button');
    saveBtn.classList = "btn btn-sm btn-success px-3";
    saveBtn.innerText = "Update";
    saveBtn.addEventListener('click',
        function () {
            updateInventory(row, id);
        });
    td6.appendChild(saveBtn);

    row.innerHTML ="";
    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);
    row.appendChild(td5);
    row.appendChild(td6);
}

function updateInventory(row, id)
{
    let date = document.querySelector('#inventoryDate').value;
    if (!date.trim()) {
        swal("Error", "Please select a date", "error");
        return;
    }
    let vendor = row.querySelector('.vendor');
    let details = row.querySelector('.details');
    let qty = row.querySelector('.quantity');
    let costPrice = row.querySelector('.cost_price');
    let sellingPrice = row.querySelector('.selling_price');
    let btn = row.querySelector('button');
    if (vendor.value.trim() && qty.value.trim() && details.value.trim() && costPrice.value.trim() && sellingPrice.value.trim()) {
        let formData = new FormData();
        formData.append('_token', token);
        formData.append('date', date);
        formData.append('details', details.value.trim());
        formData.append('quantity', qty.value.trim());
        formData.append('cost_price', costPrice.value.trim());
        formData.append('selling_price', sellingPrice.value.trim());
        formData.append('vendor', vendor.value.trim());
        btn.innerText="Loading...";
        axios.post(`/opening/inventory/${id}`, formData).then(function (res) {
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

function deleteInventory(row)
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
            axios.post(`/opening/inventory/${id}/delete`).then(function (res) {
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