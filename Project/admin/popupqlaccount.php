<script src=<?= FILE_JS_ADMIN_CKEDITOR ?>></script>
<script src=<?= LINK_JQUERY ?>></script>
<link rel="stylesheet" href=<?= FILE_CSS_POPUPADMIN ?>>

<div id="modal-wrapper" class="modal">
    <form class="modal-content" action="" name="form_account" id="form_account" method="POST">
        <div class="imgcontainer">
            <span name="Close" class="close btn" title="Close PopUp">&times;</span>
            <h1 class="title_popup" style="text-align:center"></h1>
        </div>

        <div class="container">
            
            <div class="devicename">
                <p>User Name</p>
                <input class="inpdevice" id="inpUser" type="text" name='inpUser' placeholder="Enter User name" oninput="checkUsername()" required >
                <span hidden id="deviceId"></span>
            </div>

            <div class="devicename">
                <p>Password</p>
                <input class="inpdevice" id="inpPass" type="password" name='inpPass' placeholder="Enter Password name" required pattern=<?= PATTERN_PASSWORD?>/>
            </div>
            <div class="devicename">
                <p>Confirm Password</p>
                <input class="inpdevice" id="inpRePass" type="password" name='inpRePass' placeholder="Enter Confirm Password name" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
            </div>
            <div class="devicename">
                <p>Email</p>
                <input class="inpdevice" id="inpEmail" type="text" name='inpEmail' placeholder="Enter Email name"  oninput="checkEmail()" required pattern=<?= PATTERN_EMAIL?>/>
            </div>
            <div class="devicename">
                <p>Address</p>
                <input class="inpdevice" id="inpaddress" type="text" name='inpaddress' placeholder="Enter Address name"/>
            </div>
            <div style="text-align: center;">
                <label class="custom-file-upload">
                    <input type="file" id="inpimg" name="avatar" accept=".png, .jpeg" onchange="preview()">
                    Avatar
                </label>
                <div class='display_img'>
                    <img id="inpimg" style='width: 150px; height: 130px;' src=''>
                </div>
            </div>
            <button class="btnsave" id="inpSub">SAVE</button>
        </div>
    </form>
</div>
<script src=<?= FILE_JS_AJAXADMIN ?>></script>