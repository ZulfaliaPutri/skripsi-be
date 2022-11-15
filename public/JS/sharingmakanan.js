var selectRow = null;
function onFormSubmit(){
    event.preventDefault();
    var formData = readFormData();
    if(selectRow === null){
        insertNewRecord(formData);
    }
    else{
        updateRecord(formData);
    }
    resetForm();
}

//Retrive the data
function readFormData(){
    var formData = {};
    formData["productID"] = document.getElementById("productID").value;
    formData["makananID"] = document.getElementById("makananID").value;
    formData["namaMakanan"] = document.getElementById("namaMakanan").value;
    formData["kategori"] = document.getElementById("kategori").value;
    formData["masaPenyimpanan"] = document.getElementById("masaPenyimpanan").value;
    formData["qty"] = document.getElementById("qty").value;
    formData["perPrice"] = document.getElementById("perPrice").value;
    formData["rating"] = document.getElementById("rating").value;
    formData["fotoProduk"] = document.getElementById("fotoProduk").value;
    return formData;
}

//Insert The Data
function insertNewRecord(data){
    var table = document.getElementById("storeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    var cell1 = newRow.insertCell(0);
        cell1.innerHTML = data.productID;
    var cell2 = newRow.insertCell(1);
        cell2.innerHTML = data.makananID;
    var cell3 = newRow.insertCell(2);
        cell3.innerHTML = data.namaMakanan;
    var cell4 = newRow.insertCell(3);
        cell4.innerHTML = data.kategori;
    var cell5 = newRow.insertCell(4);
        cell5.innerHTML = data.masaPenyimpanan;
    var cell6 = newRow.insertCell(5);
        cell6.innerHTML = data.qty;
    var cell7 = newRow.insertCell(6);
        cell7.innerHTML = data.perPrice;
    var cell8 = newRow.insertCell(7);
        cell8.innerHTML = data.rating;
    var cell9 = newRow.insertCell(8);
        cell9.innerHTML = data.fotoProduk;
    var cell10 = newRow.insertCell(9);
        cell10.innerHTML = `<button onClick= 'onEdit(this)'>Edit</button> <button onClick= 'onDelete(this)'>Delete</button>`
}

//Edit The Data
function onEdit(td){
    selectRow = td.parentElement.parentElement;
    document.getElementById('productID').value = selectRow.cells[0].innerHTML;
    document.getElementById('makananID').value = selectRow.cells[1].innerHTML;
    document.getElementById('namaMakanan').value = selectRow.cells[2].innerHTML;
    document.getElementById('kategori').value = selectRow.cells[3].innerHTML;
    document.getElementById('masaPenyimpanan').value = selectRow.cells[4].innerHTML;
    document.getElementById('qty').value = selectRow.cells[5].innerHTML;
    document.getElementById('perPrice').value = selectRow.cells[6].innerHTML;
    document.getElementById('rating').value = selectRow.cells[7].innerHTML;
    document.getElementById('fotoProduk').value = selectRow.cells[8].innerHTML;
}

function updateRecord(formData){
    selectRow.cells[0].innerHTML = formData.productID;
    selectRow.cells[1].innerHTML = formData.makananID;
    selectRow.cells[2].innerHTML = formData.namaMakanan;
    selectRow.cells[3].innerHTML = formData.kategori;
    selectRow.cells[4].innerHTML = formData.masaPenyimpanan;
    selectRow.cells[5].innerHTML = formData.qty;
    selectRow.cells[6].innerHTML = formData.perPrice;
    selectRow.cells[7].innerHTML = formData.rating;
    selectRow.cells[8].innerHTML = formData.fotoProduk;
}

//Delete Data
function onDelete(td){
    if(confirm('Do you want to delete this record?')){
        row = td.parentElement.parentElement;
        document.getElementById('storeList').deleteRow(row.rowIndex);
    }
    resetForm();
}

//Reset The Data
function resetForm(){
    document.getElementById('productID').value ='';
    document.getElementById('makananID').value ='';
    document.getElementById('namaMakanan').value ='';
    document.getElementById('kategori').value ='';
    document.getElementById('masaPenyimpanan').value ='';
    document.getElementById('qty').value ='';
    document.getElementById('perPrice').value ='';
    document.getElementById('rating').value ='';
    document.getElementById('fotoProduk').value ='';
}