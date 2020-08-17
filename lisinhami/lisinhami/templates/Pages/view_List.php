<div class="container">
    <div class="back-gray pad-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-products-category">
                        <div class="head-box-category">
                            <div class="filter">
                                <div class="fl price">
                                    <label>Chọn mức giá: </label>
                                    <a href="/<?= isset($ctgry_url) ? $ctgry_url : " " ?>?p=duoi-1-trieu" class=" " data-id="7">
                                        Dưới 1 triệu
                                    </a>
                                    <a href="/<?= isset($ctgry_url) ? $ctgry_url : " " ?>?p=tu-1-2-trieu" class=" " data-id="9">
                                        Từ 1 - 2 triệu
                                    </a>
                                    <a href="/<?= isset($ctgry_url) ? $ctgry_url : " " ?>?p=tren-2-trieu" class=" " data-id="289">
                                        Trên 2 triệu
                                    </a>
                                </div>
                                <div class="fl price new">
                                    <a href="?p=moi-ra-mat" data-id="moi-ra-mat" class=" ">
                                        Sản phẩm Mới
                                    </a>
                                </div>
                                <div style="float:right;">
                                    <select class="selectpicker" id="sel_pcker">
                                        <option hidden value="">Sắp xếp</option>
                                        <option value="asc">Giá cao đến thấp</option>
                                        <option value="desc">Giá thấp đến cao</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="body-box-category">
                            <? foreach($TProduct as $key => $item){?>
                            <div class="col-2-ct">
                                <div class="pd-box pd-box-category">
                                    <div class="box-images">
                                        <a href="/sua-rua-mat-chong-lao-hoa-senka-perfect-whip-collagen-in.html" title="Sữa Rửa Mặt Senka Perfect Whip Collagen In">
                                            <img class="img-reponsive lazy " src="https://adminbeauty.hvnet.vn/Upload/Files/01(8).jpg?width=350&amp;height=391&amp;v=15042020" style="">
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <h3>
                                            <a href="/sua-rua-mat-chong-lao-hoa-senka-perfect-whip-collagen-in.html" title=<?= $item->name ?>>
                                                <?= $item->name ?></a>
                                        </h3>
                                        <div>
                                            <span class="price-drop"><?= $item->discount ?></span>
                                            <span class="price "><?= $item->price ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? }?>
                            <div class="clr"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->element('paginate'); ?>
</div>

<style>
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    .pad-30 {
        padding: 30px 0;
    }


    .container {
        max-width: 1150px;
        position: relative;
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }


    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    @media (min-width: 992px) {
        .col-lg-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }
    }



    .box-products-category {
        background: #fff;
    }

    .head-box-category {
        border-bottom: 2px solid #459429;
        position: relative;
    }

    .left-head {
        display: inline-block;
        background: #459429;
        color: #fff;
        float: left;
        height: 50px;
        padding: 11px 10px;
    }

    .left-head h2 {
        font-size: 20px;
        display: inline-block;
        float: left;
        margin: 0;
        font-weight: 100;
        padding: 4px 0;
        margin-right: 10px;
    }

    .left-head i {
        display: inline-block;
        float: left;
        font-size: 26px;
        padding: 2px;
    }

    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .ul-category {
        float: left;
    }

    .ul-non {
        margin: 0;
        padding: 0;
    }

    .ul-category li {
        display: inline-block;
        float: left;
    }

    .ul-non li {
        list-style-type: none;
    }

    .ul-category li a {
        display: block;
        line-height: 48px;
        color: #333;
        text-transform: capitalize;
        font-size: 14px;
        padding: 1px 16px;
        position: relative;
    }

    .ul-category li.active a:before {
        content: "";
        height: 1px;
        width: 100%;
        background-color: #199427;
        position: absolute;
        top: 0;
        left: 0;
    }

    .ul-category li.active a:after {
        content: "";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 4px 8px;
        border-color: transparent transparent #199427;
        position: absolute;
        bottom: 0;
        left: 50%;
        margin-left: -4px;
    }

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
    }

    .btn-ct {
        float: right;
        font-size: 21px;
        height: 50px;
        background: #fff;
        border: none;
        padding: 0 10px;
    }

    @media (min-width: 992px) {
        .hidden-md {
            display: none !important;
        }
    }

    [type=button],
    [type=reset],
    [type=submit],
    button {
        -webkit-appearance: button;
    }

    button,
    select {
        text-transform: none;
    }

    button,
    input {
        overflow: visible;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    button {
        border-radius: 0;
    }

    .body-box-category {
        border: 1px solid #eee;
    }

    .clr {
        clear: both;
    }

    @media (min-width: 992px) {
        .col-2-ct {
            width: 16.66666666666667%;
        }
    }

    .col-2-ct {
        display: inline-block;
        float: left;
        padding: 0;
    }

    .pd-box-category {
        border: none !important;
    }

    .pd-box {
        border: 1px solid #fff;
        overflow: hidden;
    }

    .pd-box-category .box-images {
        border-right-color: #fff;
        border-top-color: #fff;
    }

    .box-images {
        position: relative;
        overflow: hidden;
        border: 1px solid #eee;
        border-bottom: none;
        min-height: 190px;
    }

    a {
        color: #0366d6;
    }

    a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
    }

    a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
    }

    .box-content h3 a:hover {
        color: #f60
    }

    .img-reponsive {
        max-width: 100%;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

    .box-images img {
        transition: all .2s ease-in-out;
        -webkit-transition: all .2s ease-in-out;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

    .hide {
        display: none !important;
    }

    .pd-box-category .box-content {
        border-right-color: #fff;
    }

    .box-content {
        padding: 5px 6px 3px;
        border: 1px solid #eee;
        border-top: none;
    }

    .box-content h3 {
        margin: 0;
        line-height: 11px;
        margin-bottom: 3px;
    }

    .h3,
    h3 {
        font-size: 1.75rem;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    .box-content h3 a {
        font-size: 14px;
        line-height: 20px;
        color: #666;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        height: 40px;
    }

    .box-content div span:first-child {
        font-size: 16px;
        color: #199427;
        font-weight: 700;
        margin-bottom: 2px;
        line-height: 1;
        padding-top: 5px;
        display: inline-block;
        margin-right: 5px;
    }

    .box-content div span {
        margin: 0;
        line-height: 1;
    }

    .box-content div span:last-child {
        font-size: 15px;
        color: #666;
        text-decoration: line-through;
        font-weight: 400;
    }

    .pd-box:hover>.box-images button.btn-addlike {
        right: 9px;
        visibility: visible
    }

    .pd-box:hover>.box-images img {
        -webkit-transition: all .2s ease-in-out;
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1)
    }

    .pd-box:hover>.box-images button.btn-addcard {
        bottom: 0;
        visibility: visible
    }

    .pd-box:hover>.box-images {
        border-color: #39a929
    }

    .pd-box:hover>.box-content {
        border-color: #39a929
    }

    .pagination {
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: .25rem
    }

    .pagina ul li a {
        background: #fff;
        color: #000;
        padding: 6px 12px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: all .5s ease-out;
        -webkit-transition: all .5s ease-out;
    }

    .pagina ul li {
        list-style-type: none;
        display: inline-block;
        margin: 3px;
    }

    .filter .price a {
        color: #288ad6;
        position: relative;
        font-size: 1.5rem;
    }

    .filter .price * {
        display: inline-block;
        vertical-align: top;
        padding-right: 10px;
        line-height: 40px;
    }

    .filter {
        padding: 10px 0;
    }

    .filter .fl {
        float: left;
        margin-right: 10px;
    }

    .filter label {
        font-size: 1.5rem;
    }

    .filter .price .new {
        margin-left: 10px;
    }

    #sel_pcker {
        float: right;
        font-size: 1.5rem;
        color: #288ad6;
        border-color: #288ad6;
    }
</style>

<script>
    //  alert($('#sel_pcker').val());
    $('#sel_pcker').change(function() {
        alert($(this).val());
    })
</script>