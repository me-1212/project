<?php
// connect to the database
    include "connection.php";

    // $sql = "SELECT * FROM res";
    // $result = mysqli_query($conn, $sql);
    // $books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM res WHERE Res_id = $id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = $file['File_path'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('resources/' . $file['Title']));
        readfile('uploads/' . $file['Title']);
        exit;
    }

}

?>