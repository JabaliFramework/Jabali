<form id="settings-mpesa-form" action="" method="POST" class="form">
        <h3>M-PESA Details</h3>
        <p>Merchant Name:<input class="mdl-textfield__input" type="text" name="merchname" id="merchname" placeholder="Product" value="A Mtaandao Site" /></p>
        <p>Merchant ID:<input class="mdl-textfield__input" type="text" name="merchid" id="merchid" placeholder="Product" value="898998" /></p>
        <p>SAG Password:<input class="mdl-textfield__input" type="text" name="sagpassword" id="sagpassword" placeholder="Product" value="ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==" /></p>
        <p>Timestamp:<input class="mdl-textfield__input" type="text" name="merchtimestamp" id="merchtimestamp" placeholder="" value="20160510161908" /></p>
        <p>Callback URL:<input class="mdl-textfield__input" type="text" name="merchcallback" id="merchcallback" placeholder="http://" value="http://" /></p>
        <input type="submit" id="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
</form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    $sql = "UPDATE pot_options SET merch_name = '".$_POST["merchname"]."', merch_id = '".$_POST["merchid"]."', sag_password = '".$_POST["sagpassword"]."', merch_timestamp = '".$_POST["merchtimestamp"]."', merch_callback = '".$_POST["merchcallback"]."' WHERE id=1 ";

    if (mysqli_query($conn, $sql)) {
    echo "<script type = \"text/javascript\">
                    alert(\"M-PESA Settings updated successfully\");
                </script>";
    } else {
        echo "Error updating database: " . mysqli_error($conn);
    }

    $conn->close();

    }