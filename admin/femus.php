<?php 

$title = "fEmUs Facility Management System";

include "extensions/header.php";
include "extensions/femus/nav.php"; ?>
<div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top"><?php 

if(isset($_GET["create"])){

    include "extensions/femus/create.php";

} elseif(isset($_GET["otas"])){

    include "extensions/femus/otas.php";

} else {

    include "extensions/femus/femus.php";
}

include "admin-footer.php"; ?>