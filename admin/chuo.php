<?php 

$title = "Chuo Learning Management System";

include "extensions/header.php";
include "extensions/chuo/nav.php"; ?>
<div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top"><?php 

if(isset($_GET["create"])){

    include "extensions/wapi/create.php";

} elseif(isset($_GET["otas"])){

    include "extensions/wapi/otas.php";

} else {

    include "extensions/wapi/wapi.php";
}

include "admin-footer.php"; ?>