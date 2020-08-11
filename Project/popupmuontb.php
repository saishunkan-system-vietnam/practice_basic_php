<?php
$query = "SELECT id, device_name FROM t_device WHERE del_flg = 0";
$result = mysqli_query($connect, $query);

?>

<link rel="stylesheet" href=<?= FILE_CSS_POPUP ?>>
<div id="modal-wrapper" class="modal">
    <form class="modal-content" action="" id="form_Muon" method="POST">
        <div class="imgcontainer">
            <span name="Close" class="close btn" title="Close PopUp">&times;</span>
            <h1 style="text-align:center">Mượn thiết bị</h1>
        </div>

        <div class="container">
            <div class="inp_device Row">
                <div class="Column">
                    <label>Tên thiết bị: </label>
                </div>
                <div class="Column">
                    <select class="device" id="device" name="device" readonly>
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option id="opt_device" value=" <?php echo $row['id']; ?>">
                                <?php echo $row['device_name']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="inp_amount Row">
                <div class="Column">
                    <label for="">Số lượng: </label>
                </div>
                <div class="Column">
                    <input type="number" id="inpamount" min="1" max="99" onKeyPress="if(this.value.length==2) return false;" value="1">
                </div>
            </div>
            <div class="intend_date Row">
                <div class="Column">
                    <label for="">Ngày hẹn trả: </label>
                </div>
                <div class="Column">
                    <input type="date" id="inp_intend" value="<?= date('Y-m-d') ?>">
                </div>
            </div>
            <div class="reason">
                <label for="story">Nhập lý do mượn thiết bị</label><br>
                <textarea id="inpReason" cols="45" rows="5">
            </textarea>
                <script>
                    CKEDITOR.replace('inpReason');
                </script>
            </div>
            <button class="btnmuon">Mượn thiết bị</button>
        </div>
    </form>
</div>
<script src=<?= FILE_JS_AJAX ?>></script>