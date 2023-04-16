<?php
// connect to the database
    include "connection.php";

    $sql = "SELECT * FROM res";
    $result = mysqli_query($conn, $sql);
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // type of the resource
    $type = $_POST['type'];

    //get admin id
    $admin_id = $_POST['admin_id'];

    // destination of the file on the server
    $destination = 'resources/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if(empty( $filename)){
        header("Location:upload_form.php?msg=Please choose file.");
    }
    else if (!in_array($extension, ['pdf', 'docx'])) {
        header("Location:upload_form.php?msg=You file extension must be .pdf or .docx");
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 100Megabyte
        header("Location:upload_form.php?msg=File too large! Limit is 100MB!"); 
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO res (Title, File_path, Size, Typ, Admin_id) VALUES ('$filename', '$destination', $size, '$type','$admin_id')";
            if (mysqli_query($conn, $sql)) {
                header("Location:upload_form.php?msg=File is successfully uploaded!");
            }
        } else {
            header("Location:upload_form.php?msg=Failed to upload file.");
        }
    }
}
?>