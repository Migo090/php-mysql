//--------------admin functions----------------------------
// file upload verfiction
const fileInput = document.getElementById('file');
const checkIcon = document.getElementById('check-icon');

fileInput.addEventListener('change', function() {
    if (this.files.length > 0) {
        checkIcon.style.display = 'inline-block';
    } else {
        checkIcon.style.display = 'none';
    }
});

function delButton(id){
    document.location.href = `deleteProducts.php?id=${id}`
}
function editButton(id){
    document.location.href = `updateProducts.php?id=${id}`
}
//--------------user functions-----------------------
function addCart(id){
    document.location.href = `verification.php?id=${id}`
}
function delCart(id){
    document.location.href = `deleteCart.php?id=${id}`
}