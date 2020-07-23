
<div class="password">
<label for="password"> Password </label>
    <input type="password" class="passwrdforsignup" name="password" required pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> <!--pw must contain atleast 6 characters, one uppercase and one number-->
</div>

<script>
$(document).ready(function () {

$('.password').on('keyup', '.passwrdforsignup', function () {
   var getPW =  $(this).find('.passwrdforsignup').get();       
    if (getPW.checkValidity() === false) {
        getPW.setCustomValidity("This password doesn't match the format specified");
    }

});

});
</script>