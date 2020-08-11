function ClearError(id) {
    document.getElementById(id).style.borderColor = "#ddd";
    var err = "error_" + id;
    document.getElementById(err).innerHTML = "";
}