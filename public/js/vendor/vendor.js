function addRow()
{
    let tableRow = document.querySelector("#vendor");
    let row = document.createElement('tr');

    //name
    let td1 = document.createElement('td');
    let input1 = document.createElement("input");
    input1.setAttribute("type", "text");
    input1.setAttribute("class", "name form-control");
    td1.appendChild(input1);

    //Address
    let td2 = document.createElement('td');
    let input2 = document.createElement("input");
    input2.setAttribute("type", "text");
    input2.setAttribute("class", "address form-control");
    td2.appendChild(input2);

    //Phone Number
    let td3 = document.createElement('td');
    let input3 = document.createElement("input");
    input3.setAttribute("type", "number");
    input3.setAttribute("class", "address form-control");
    td3.appendChild(input3);

    //email
    let td4 = document.createElement('td');
    let input4 = document.createElement("input");
    input4.setAttribute("type", "text");
    input4.setAttribute("class", "email form-control");
    td4.appendChild(input4);

    //website
    let td5 = document.createElement('td');
    let input5 = document.createElement("input");
    input5.setAttribute("type", "text");
    input5.setAttribute("class", "website form-control");
    td5.appendChild(input5);

    //delete
    let td6 = document.createElement('td');
    td6.setAttribute('id', "delete");
    let i = document.createElement("i");
    i.setAttribute("class", "a fa-trash-o");
    i.setAttribute("style", "font-size:24px");
    td6.appendChild(i);
    td6.addEventListener("click", function(){
        deleteRow(row);
    })

    row.appendChild(td1)
    row.appendChild(td2)
    row.appendChild(td3)
    row.appendChild(td4)
    row.appendChild(td5)
    row.appendChild(td6)
    

    tableRow.appendChild(row);
}

function saveVendor()
{
    let token = document.querySelector('meta[name="csrf-token"]').content;
    let tableRow = document.querySelectorAll('tbody tr');
    tableRow.forEach( td => {
    let name = td.querySelector(".name").value;
    console.log(name);
    let address = td.querySelector(".address").value;
    let number = td.querySelector(".number").value;
    let email = td.querySelector(".email").value
    let website = td.querySelector(".website").value;
    if( name.trim() && address.trim() && number.trim() )
    {
        let formData = new FormData();
        formData.append('_token', token);
        formData.append('name', name);
        formData.append('address', address);
        formData.append('number', number);
        formData.append('email', email);
        formData.append('website', website);

        axios.post('/vendor/create', formData).then(response => {
            swal('Saved', response.data, 'Data Saved Successfully');
            document.querySelectorAll('tr').value = "";
        }).catch(error => {
            swal('Sorry', response.data, 'Some input missing');
        });
    }
    });
}


    //delete action
let deleteBtn = document.querySelector('#delete').cursor = "pointer" 
function deleteRow(row)
{
  swal({
    title: "Are you sure?",
    text: "You are trying to delete this entry",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if(willDelete) {
      row.style.display = "none";
    }
  });
}

function activate(id)
{
    let token = document.querySelector('meta[name="csrf-token"]').content;    
    let formData = new FormData();
    formData.append('_token', token);
    // formData.append('id', id);

    axios.post(`/vendor/${id}/activate`, formData).then(response => {
        swal('Saved', response.data, 'Settings Saved')
    }).catch(error => {
        swal('Sorry', response.data, 'Some input missing');        
    })
}

function search()
{
    let query = document.querySelector('.search').value;
    let tableRow2 = document.querySelector(".vendor");
    axios.post(`vendor/search?q=${query}`).then(response => {
        $(".vendor").html('');
        response.data.forEach(function(vendor){
            let tr = document.createElement('tr');
            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');
            let td4 = document.createElement('td');
            let td5 = document.createElement('td');
            let td6 = document.createElement('td');
            let label = document.createElement('label');
            let input = document.createElement('input');
            let span = document.createElement('span');

            td1.innerText = vendor.name;
            td2.innerText = vendor.address;
            td3.innerText = vendor.phone;
            td4.innerText = vendor.email;
            td5.innerText = vendor.website;
            label.setAttribute('class', 'switch');
            input.setAttribute('type', 'checkbox');
            span.setAttribute('class', 'slider round');
            input.appendChild(span);
            label.appendChild(input);
            td6.appendChild(label)

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td1);
            tr.appendChild(td5);
            tr.appendChild(td6);
            
            tableRow2.append(tr);
        })
    });
}

