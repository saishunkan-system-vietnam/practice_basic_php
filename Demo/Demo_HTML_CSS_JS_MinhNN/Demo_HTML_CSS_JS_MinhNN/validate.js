function Validate() {
    var userName = document.getElementsByName("userName")[0].value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var dob = document.getElementById('dob');
    var id = document.getElementById('id').value;
    var gender = document.getElementsByName('radioGender');
    var country = document.getElementById('country').value;
    var district = document.getElementById('district').value;
    var cityTown = document.getElementById('cityTown').value;
    var street = document.getElementById('street').value;
    var hobbies = document.getElementById('hobbies').value;
    var confirm = document.getElementById('confirm').value;
    var errorMessage = document.getElementById('errorMessage').value;
    var message;

    if (userName == "") {
        message = "Please Enter user name";
        document.getElementById("userName").style.background = "red";
        errorMessage.innerHTML = message;
        return false;
    }

    if (userName.length == 1) {
        message = "The legth of user name must be greater than 9";
        document.getElementById("userName").style.background = "red";
        errorMessage.innerHTML = message;
        return false;
    }

    if (password == "") {
        message = "Please Enter password";
        document.getElementById("password").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    if (confirmPassword == "") {
        message = "Please Enter confirmPassword";
        document.getElementById("confirmPassword").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    if (confirmPassword != password) {
        message = "Password incorrect";
        document.getElementById("password").style.background = "red";
        document.getElementById("confirmPassword").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    var re = /(\d\d\d\d)\-(\d\d)\-(\d\d)/;
    var myArray = dob.value.match(re);

    if (id == "") {
        message = "Please Enter Identification Card";
        document.getElementById("id").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    if (id < 10) {
        message = "Identification Card incorrect";
        document.getElementById("id").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    if (country == "") {
        message = "Please Enter Country";
        document.getElementById("country").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    if (district == "") {
        message = "Please Enter district";
        document.getElementById("district").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    if (cityTown == "") {
        message = "Please Enter cityTown";
        document.getElementById("cityTown").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    if (street == "") {
        message = "Please Enter street";
        document.getElementById("street").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    if (hobbies == "") {
        message = "Please Enter hobbies";
        document.getElementById("hobbies").style.background = "red";
        document.getElementById("errorMessage").innerHTML = message;
        return false;
    }

    return false;
}
