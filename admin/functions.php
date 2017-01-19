<?php 
/**
* 
*/
class Updb
{
    
    function __construct(argument)
    {
        # code...
    }
}
class Updb_options extends Updb
{
    
    function input_fields() {
        $this => id = get_id();
        $this => order_id = get_order_id();
        $this => total = get_total();

        include 'config/db.php';
        // Create connection
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE pot_options SET array($input_fields) WHERE id=$this => id; ";

    mysql_query($sql);

    if (mysqli_query($conn, $sql)) {
    echo "Settings updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $conn->close();

    }
}

$updb_options = new Updb();

function get_header (){
    include "header.php"
}

function get_aheader (){
    include "admin-header.php"
}
function get_footer (){
    include "footer.php"
}

function get_afooter (){
    include "admin-footer.php"
}