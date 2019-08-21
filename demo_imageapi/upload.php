<?php

    require "init.php";

    if($con)
    {
        $title = $_POST['title'];
        $image = $_POST['image'];

        $upload_path = "uploads/$title.jpg";

        $sql = "INSERT INTO imageinfo (title, path) values ('$title', '$upload_path');";

        if(mysqli_query($con,$sql))
        {
            file_put_contents($upload_path,base64_decode($image));
            echo json_encode(array('response'=>"Image uploaded Success...."));
        }
        else
        {
            echo json_encode(array('response'=>"Image Upload Failed..."));
        }

        mysqli_close($con);

    }

?>