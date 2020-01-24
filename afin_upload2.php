<?php

 $targetfolder = base_url()."home/testupload/";
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 echo $targetfolder;
$file_type=$_FILES['file']['type'];
if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {
 echo "File Berhasil di Upload  file ". basename( $_FILES['file']['name']). " is uploaded";
 //Jalankan perintah insert ke database
 }
 else {
 echo "File Gagal di Upload";
 }
}
else {
 echo "Hanya Boleh upload PDF, JPEG GIF .<br>";
}
?>
