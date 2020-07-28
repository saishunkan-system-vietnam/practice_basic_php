<?php
$query = "SELECT MaThietBi, TenThietBi FROM thietbi WHERE Del_Flg = 0";
$result = mysqli_query($connect, $query);
?>
<link rel="stylesheet" href=<?= FILE_CSS_POPUP?>>
<div id="modal-wrapper" class="modal">

    <form class="modal-content" action="" id="form_Muon" method="POST">
        <div class="imgcontainer">
            <span onclick="Closeform()" class="close" title="Close PopUp">&times;</span>
            <h1 style="text-align:center">Thêm thiết bị mượn</h1>
        </div>

        <div class="container">
            <select id="thietbi" name="thietbi">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <option value=" <?php echo $row['MaThietBi']; ?> ">
                        <?php echo $row['TenThietBi']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            <div>
                <table id="tbl_muon">
                    <tr>
                        <td>
                            <label for="">Số lượng</label>
                        </td>
                        <td >
                            <input type="number" id="inpSoluong" min="1" max="99" onKeyPress="if(this.value.length==2) return false;" value="1">
                        </td>
                    </tr>
                </table>
            </div>
            <div id="reason">
                <label for="story">Nhập lý do mượn thiết bị</label><br>
                <textarea id="inpReason" cols="45" rows="5">
                </textarea>
                <script>
                    CKEDITOR.replace('inpReason');
                </script>
            </div>
            <button>Mượn thiết bị</button>
        </div>
    </form>
</div>
<script src=<?= FILE_JS_AJAX ?>></script>