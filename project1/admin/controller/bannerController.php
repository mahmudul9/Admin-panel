<?php
    require 'dbConfig.php';

   // Banner add
    if (isset($_POST['saveBanner'])) {

        $upload_status = false;
        if (isset($_FILES['image'])) {
            $imgArray = $_FILES['image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/bannerImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $message = "File Not Found";
        }
        
        $title     = $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $details   = $_POST['details'];

        if (empty($title) || empty($sub_title) || empty($details) || $upload_status == false) {
            $message = "All fields are required";
        } else {
            $insertQry = "INSERT INTO banners (title, sub_title, details, image) VALUES ('{$title}', '{$sub_title}', '{$details}', '{$random_file_name}')";
            $isSubmit = mysqli_query($dbCon, $insertQry);

            if ($isSubmit == true) {
                $message = "Banner Insert Succesfull";
            } else {
                $message = "Insert Failed";
            }
        }

        header("Location:../banner/bannerList.php?msg={$message}");
        
    }


    // THIS FOR UPDATE
    if (isset($_POST['updateBanner'])) {
        
        // GET THE IMAGE NAME
        $banner_id = $_POST['banner_id'];
        $getSingleDataQry = "SELECT * FROM banners WHERE id={$banner_id}";
        $getResult = mysqli_query($dbCon, $getSingleDataQry);
        
        $oldImg = '';
        foreach ($getResult as $key => $banner) {
            $oldImg = $banner['image'];
        }
        // END GET THE IMAGE NAME


        $upload_status = false;
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

            $imgArray = $_FILES['image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if ($random_file_name != $oldImg) { //WHEN NEW IMAGE NAME DOES NOT MATCH WITH OLD IMAGE
                
                //IMAGE FILE REMOVE
                $file = '../uploads/bannerImage/'.$oldImg;
                if (file_exists($file)) {
                    unlink($file);
                }
                // Image FILE REMOVE End

                // NEW FILE UPLOAD
                if (in_array($file_extension, $valid_extensions)) {
                    move_uploaded_file($tmp_file_name, '../uploads/bannerImage/'.$random_file_name);
                    $upload_status = true;
                } else {
                    $message = $file_extension." is not Supported";
                }

            }
        } else {
            $random_file_name = $oldImg;
        }


        $banner_id = $_POST['banner_id'];
        $title     = $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $details   = $_POST['details'];

        if (empty($title) || empty($sub_title) || empty($details)) {
            $message = "All fields are required";
        } else {
            $updateQry = "UPDATE banners SET title='{$title}', sub_title='{$sub_title}', details='{$details}', image='{$random_file_name}' WHERE id='{$banner_id}'";

            $isSubmit = mysqli_query($dbCon, $updateQry);

            if ($isSubmit == true) {
                $message = "Banner Update Succesfull";
            } else {
                $message = "Update Failed";
            }
        }
        
    // For banner update page redirection
    //    header("Location:../banner/bannerUpdate.php?banner_id={$banner_id}&msg={$message}");

    // For Banner list page redirection
       header("Location:../banner/bannerList.php?msg={$message}");
        
    }
