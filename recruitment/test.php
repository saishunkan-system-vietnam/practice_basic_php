<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "./config/router.php"; ?>
    <style>
        label:hover {
            color: blue;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php include FILE_PHP_HEADER;  ?>
    <div id="d">
        <label  onclick="a()">sfffffffffffffffffffff</label>
    </div>
    <?php include FILE_PHP_FOOTER ?>
    <script src="<?= FILE_JS_INDEX ?>"></script>
</body>
<script>
    function a() {
        alert("sdscd");
    }
</script>

</html>