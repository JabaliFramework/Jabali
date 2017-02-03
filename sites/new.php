<?php
/** 
 * @see       http://mtaandao.co.ke/docs/banda/lipa-na-mpesa/
 * @author    Mtaandao
 * @package   Banda/M-Pesa
 * @version     17.01
**/
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>New Site</title>
  <link rel="stylesheet" href="app.css">
  <style>
a:link    {color:white; text-decoration:none}
a:visited {color:red; background-color:transparent; text-decoration:none}
a:hover   {color:green; background-color:transparent; text-decoration:underline}
a:active  {color:yellow; background-color:transparent; text-decoration:underline}
</style>
</head>

  <body>
  <div class="login">
      <br><br><br>
    <center>
    <div class="login-screen">
      <div class="app-logo">
        <img src="mpesa-white.png" width="250px">
      </div>

      <form class="login-form" action="" method="POST">
        <p class="control-group">
        <label style="color:white">Site Name</label><input type="text" class="login-field" placeholder="Site name" name="Site_name" value="">
        </p>

        <p class="control-group">
        <input type="hidden" class="login-field" value="10" name="amount">
        </p>

          <p class="submit">
          <input type="submit" name="submit" id="submit" class="btn" value="Pay Now"/></p>
        
      </form>
    </div>
      <br>
      <br>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //The name of the directory that we need to create.
    $site_name = $_POST["site_name"]; 
   
    //Check if the directory already exists.
    if(!is_dir($site_name)){
        //Directory does not exist, so lets create it.
        mkdir($site_name, 0755);
    }
      	} 



function download($filename){
  if(!empty($filename)){
    // Specify file path.
    $path = ''; // '/uplods/'
    $download_file =  $path.$filename;
    // Check file is exists on given path.
    if(file_exists($download_file))
    {
      // Getting file extension.
      $extension = explode('.',$filename);
      $extension = $extension[count($extension)-1]; 
      // For Gecko browsers
      header('Content-Transfer-Encoding: binary');  
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
      // Supports for download resume
      header('Accept-Ranges: bytes');  
      // Calculate File size
      header('Content-Length: ' . filesize($download_file));  
      header('Content-Encoding: none');
      // Change the mime type if the file is not PDF
      header('Content-Type: application/'.$extension);  
      // Make the browser display the Save As dialog
      header('Content-Disposition: attachment; filename=' . $filename);  
      readfile($download_file); 
      exit;
    }
    else
    {
      echo 'File does not exists on given path';
    }
 
 }
}


//$file is the name and location of the uploaded zip file
//$target is the diectory where file will be extracted

function extractZip($file, $target){

    // Creating new ZipArchive object
    $zip = new ZipArchive();

    // Opening the file
    $open = $zip->open($file);

    //Checking if file has been opened properly
    if($open === true) {

        // Extracting the zip file
        $zip->extractTo($target);

        //Closing the zip file
        $zip->close();

        // Deleting the zip file
        unlink($file);

        return true;
    } 
    else {
        return false;
    }

}

$dir = ".";//"path/to/targetFiles";
    $dirNew = "viejo2014";//path/to/destination/files
    // Open a known directory, and proceed to read its contents
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
            echo '<br>Archivo: '.$file;
            //exclude unwanted 
            if ($file=="move.php")continue;
            if ($file==".") continue;
            if ($file=="..")continue;
            if ($file=="viejo2014")continue;
            if ($file=="viejo2013")continue;
            if ($file=="cgi-bin")continue;
            //if ($file=="index.php") continue; for example if you have index.php in the folder
            if (rename($dir.'/'.$file,$dirNew.'/'.$file))
                {
                echo " Files Copyed Successfully";
                echo ": $dirNew/$file"; 
                //if files you are moving are images you can print it from 
                //new folder to be sure they are there 
                }
                else {echo "File Not Copy";}
            }
            closedir($dh);
        }
    }


    $srcDir = 'dir1';
$destDir = 'dir2';

if (file_exists($destDir)) {
  if (is_dir($destDir)) {
    if (is_writable($destDir)) {
      if ($handle = opendir($srcDir)) {
        while (false !== ($file = readdir($handle))) {
          if (is_file($srcDir . '/' . $file)) {
            rename($srcDir . '/' . $file, $destDir . '/' . $file);
          }
        }
        closedir($handle);
      } else {
        echo "$srcDir could not be opened.\n";
      }
    } else {
      echo "$destDir is not writable!\n";
    }
  } else {
    echo "$destDir is not a directory!\n";
  }
} else {
  echo "$destDir does not exist\n";
}



  $files = scandir("f1");
  $oldfolder = "f1/";
  $newfolder = "f2/";
  foreach($files as $fname) {
      if($fname != '.' && $fname != '..') {
          rename($oldfolder.$fname, $newfolder.$fname);
      }
  }
?>
  </div>
</body>
</html>

<?php

// Include the two functions explained above here

if(isset($_FILES['zip']['name'])){

        /****************checking file credentials***************/
        $file_name = $_FILES['zip']['name'];
        if($file_name==""){
            echo "<p style='color:red;font-size:15px;'>No file uploaded</p>";
        }
        else{
            $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            if($ext!="zip")
                echo "<p style='color:red;font-size:15px;'>Upload file with zip extension only</p>";
            else{

                if($_FILES["zip"]["size"]>102400)
                    echo "<p style='color:red;font-size:15px;'>Maximum file size allowed is 100Kb.</p>";
                else{
                    $tmp = $_FILES['zip']['tmp_name'];
                    $target = "Your target directory/files/";

                    //Using file name and time to name the new directory
                    $target = $target.basename($file_name,'.zip').'-'.time().'/';
                    // basename($file_name,'.zip') removes extension of the file leaving only the name

                    //Creating the target directory
                    mkdir($target);

                    $target_file = $target.$file_name;

                    if (move_uploaded_file($tmp, $target_file)) {

                        /*******************Extracting zip file********************/
                        $result = extractZip($target_file,$target);

                        if($result){
                            //Successful extraction
                            echo "<p style='color:green;font-size:18px;'>Files extracted</p>";
                            // Show the contents of the directory
                            showFileContents($target);
                        }
                        else{
                            echo "<p style='color:red;font-size:15px;'>There was a problem. Please try again!</p>";
                        }

                    } 
                    else {
                        echo "<p style='color:red;font-size:15px;'>Sorry, there was an error uploading your file.</p>";
                    }
                }

            }
        }

    }
?>
