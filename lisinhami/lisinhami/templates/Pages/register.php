<div class="contai">
    <div class="row">
        <div class="well col-md-5 offset-md-4">
            <legend class="head"><i class="glyphicon glyphicon-globe"></i> Đăng ký thành viên!
            </legend>
            <form action="" method="post" class="form" role="form">
                <label >Họ và tên</label>
                <input class="form-control" name="fullname" placeholder="Họ và tên" required autofocus="" type="text">
                <label for="">Email</label>
                <input class="form-control" name="email" placeholder="Email" type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Email không hợp lệ">
                <label for="">Mật khẩu</label>
                <input class="form-control" name="password" placeholder="Mật khẩu" required type="password">
                <label for="">Xác nhận mật khẩu</label>
                <input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" required type="password" oninput='retypepassword.setCustomValidity(retypepassword.value != password.value ? "Passwords do not match." : "")'>
                <label for="">Số điện thoại</label>
                <input class="form-control" type="text" placeholder="Số điện thoại" name="Phone" required pattern="(09|03|07|08|05)+([0-9]{8})\b" title="Số điện thoại hợp lệ" maxlength="10">
                <label for="">Giới tính&emsp;</label>
                <label class="radio-inline">
                    <input name="gender" id="inlineCheckbox1" value="male" type="radio" checked> Nam
                </label>
                <label class="radio-inline">
                    <input name="gender" id="inlineCheckbox2" value="female" type="radio"> Nữ
                </label>
                <br>
                <label >Địa chỉ chính</label>
                <input class="form-control" name="address1" placeholder="Nhập địa chỉ" required type="text">
                <label >Địa chỉ phụ</label>
                <input class="form-control" name="address2" placeholder="Nhập địa chỉ" type="text">
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng ký</button>
            </form>
        </div>
    </div>
</div>

<style>
    .contai {
        margin-top: 2%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .well {
        padding-top: 15px;
        padding-bottom: 15px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
    }

    .head {
        border: 0;
        border-bottom: 1px solid #e5e5e5;
    }

    body {
        padding-top: 0px;
    }

    .form-control {
        margin-bottom: 10px;
    }
</style>