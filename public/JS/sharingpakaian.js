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
    formData["pakaianID"] = document.getElementById("pakaianID").value;
    formData["namaPakaian"] = document.getElementById("namaPakaian").value;
    formData["bahanPakaian"] = document.getElementById("bahanPakaian").value;
    formData["panjangLengan"] = document.getElementById("panjangLengan").value;
    formData["ukuranPakaian"] = document.getElementById("ukuranPakaian").value;
    formData["kategori"] = document.getElementById("kategori").value;
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
        cell2.innerHTML = data.pakaianID;
    var cell3 = newRow.insertCell(2);
        cell3.innerHTML = data.namaPakaian;
    var cell4 = newRow.insertCell(3);
        cell4.innerHTML = data.bahanPakaian;
    var cell5 = newRow.insertCell(4);
        cell5.innerHTML = data.panjangLengan;
    var cell6 = newRow.insertCell(5);
        cell6.innerHTML = data.ukuranPakaian;
    var cell7 = newRow.insertCell(6);
        cell7.innerHTML = data.kategori;
    var cell8 = newRow.insertCell(7);
        cell8.innerHTML = data.qty;
    var cell9 = newRow.insertCell(8);
        cell9.innerHTML = data.perPrice;
    var cell10 = newRow.insertCell(9);
        cell10.innerHTML = data.rating;
    var cell11 = newRow.insertCell(10);
        cell11.innerHTML = data.fotoProduk;
    var cell12 = newRow.insertCell(11);
        cell12.innerHTML = `<button onClick= 'onEdit(this)'>Edit</button> <button onClick= 'onDelete(this)'>Delete</button>`
}

//Edit The Data
function onEdit(td){
    selectRow = td.parentElement.parentElement;
    document.getElementById('productID').value = selectRow.cells[0].innerHTML;
    document.getElementById('pakaianID').value = selectRow.cells[1].innerHTML;
    document.getElementById('namaPakaian').value = selectRow.cells[2].innerHTML;
    document.getElementById('bahanPakaian').value = selectRow.cells[3].innerHTML;
    document.getElementById('panjangLengan').value = selectRow.cells[4].innerHTML;
    document.getElementById('ukuranPakaian').value = selectRow.cells[5].innerHTML;
    document.getElementById('kategori').value = selectRow.cells[6].innerHTML;
    document.getElementById('qty').value = selectRow.cells[7].innerHTML;
    document.getElementById('perPrice').value = selectRow.cells[8].innerHTML;
    document.getElementById('rating').value = selectRow.cells[9].innerHTML;
    document.getElementById('fotoProduk').value = selectRow.cells[10].innerHTML;
}

function updateRecord(formData){
    selectRow.cells[0].innerHTML = formData.productID;
    selectRow.cells[1].innerHTML = formData.pakaianID;
    selectRow.cells[2].innerHTML = formData.namaPakaian;
    selectRow.cells[3].innerHTML = formData.bahanPakaian;
    selectRow.cells[4].innerHTML = formData.panjangLengan;
    selectRow.cells[5].innerHTML = formData.ukuranPakaian;
    selectRow.cells[6].innerHTML = formData.kategori;
    selectRow.cells[7].innerHTML = formData.qty;
    selectRow.cells[8].innerHTML = formData.perPrice;
    selectRow.cells[9].innerHTML = formData.rating;
    selectRow.cells[10].innerHTML = formData.fotoProduk;
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
    document.getElementById('pakaianID').value ='';
    document.getElementById('namaPakaian').value ='';
    document.getElementById('bahanPakaian').value ='';
    document.getElementById('panjangLengan').value ='';
    document.getElementById('ukuranPakaian').value ='';
    document.getElementById('kategori').value ='';
    document.getElementById('qty').value ='';
    document.getElementById('perPrice').value ='';
    document.getElementById('rating').value ='';
    document.getElementById('fotoProduk').value ='';
}