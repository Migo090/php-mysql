function delButton(id) {
    if(confirm('Are you sure you want to delete this user?')) {
        window.location.href = `home.php?action=del&id=${id}`;
    }
}

function editButton(id) {
    window.location.href = `add.php?action=edit&id=${id}`;
}