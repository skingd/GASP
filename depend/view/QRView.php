
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
if (!empty($_POST['fileToUpload'])){
  $file = $_POST['fileToUpload'];

  $qRModal->CheckForQREvent($file, $user_id);
}

?>
