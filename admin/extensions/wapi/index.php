<?php include "header.php";

if(isset($_GET["create"])){

    include "templates/create.php";

} elseif(isset($_GET["otas"])){

    include "templates/otas.php";

} else {

    include "templates/wapi.php";
}

include "footer.php"; ?>