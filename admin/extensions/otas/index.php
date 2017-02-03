<?php include "header.php";

if(isset($_GET["pdf"])){

    include "templates/new-pdf.php";

} elseif(isset($_GET["otas"])){

    include "templates/otas.php";

} else {

    include "templates/otas.php";
}

include "footer.php"; ?>