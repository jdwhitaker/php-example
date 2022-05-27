<html>
<body>
    <form 
        method='post' 
        action='upload.php' 
        enctype='multipart/form-data'>
        Select File: 
        <input 
            type='file' 
            name='filename' 
            size='10' />
        <input
            type='submit'
            value='Upload' />
    </form>
<?php
if ($_FILES) {
    $name = $_FILES['filename']['name'];
    move_uploaded_file($_FILES['filename']['tmp_name'], $name);
    echo <<<_END
Uploaded '$name'<br>
<img src='$name'>
_END;
}
?>
</body>