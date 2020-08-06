<div class="topnav">
  <div class="topnav-right">
    <div class="dropdown">
      <?php
      if (!isset($_SESSION['admin_flg'])) {
        $dataSaveUser = json_decode($_COOKIE[COOKIE_LOGIN], true);
        $_SESSION['txtUsername'] =  $dataSaveUser['usr'];
        $_SESSION['avatar'] = $dataSaveUser['avatar'];
        echo "<button class='dropbtn'>$_SESSION[txtUsername]";
      } else {
        echo "<button class='dropbtn'>$_SESSION[txtUsername]";
      }
      ?>
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <?= "<a href='./" . SITE_INDEX_UADMIN . "?type=logout'>Đăng Xuất</a>"; ?>
      </div>
    </div>
    <?php !empty($_SESSION['avatar']) ? $_SESSION['avatar'] : $_SESSION['avatar'] = "avatar_null.png";
    echo "<img class='avatar' src='../img/" . $_SESSION['avatar'] . "'>" ?>
  </div>
</div>

<div style="padding-bottom:0.5%">
</div>