

<?php
    require 'dbConfig.php';

   // Project add
    if (isset($_POST['saveProject'])) {

        $upload_status = false; 
        if (isset( $_FILES['project_thumb'])) {
            $imgArray = $_FILES['project_thumb'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/projectImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message= $File_extension. " is not valid" ;
            }
        } else {
            $message = "File Not Found";
        }

         // Image end
        
         $category_id  = $_POST['category_id'];
         $project_name = $_POST['project_name'];
         $project_link = $_POST['project_link'];
     

         if(empty($category_id) || empty($project_name) || empty($project_link) || $upload_status==false) {
            $message= "All field are required";
        }
         else {
            $insertQry = "INSERT INTO projects (category_id, project_name, project_link, project_thumb) VALUES ('{$category_id}', '{$project_name}', '{$project_link}', '{$random_file_name}')";
            $isSubmit = mysqli_query($dbCon,$insertQry);     

            if ($isSubmit == true) {
                $message = "Project Insert Succesfull";
            } else {
                $message = "Insert Failed";
            }
        }
        header("Location:../project/projectList.php?msg={$message}");
       
    }



   // Update project
     if (isset($_POST['updateProject'])){
        
        // GET THE IMAGE NAME
        $project_id = $_POST['project_id'];
        $getSingleDataQry = "SELECT * FROM projects WHERE id={$project_id}";
        $getResult = mysqli_query($dbCon, $getSingleDataQry);
        
        $oldImg = '';
        foreach ($getResult as $key => $project) {
            $oldImg = $project['project_thumb'];
        }
        // END GET THE IMAGE NAME


        $upload_status = false;
        if (isset($_FILES['project_thumb']) && $_FILES['project_thumb']['size'] > 0) {

            $imgArray = $_FILES['project_thumb'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if ($random_file_name != $oldImg) { //WHEN NEW IMAGE NAME DOES NOT MATCH WITH OLD IMAGE
                
                //IMAGE FILE REMOVE
                $file = '../uploads/projectImage/'.$oldImg;
                if (file_exists($file)) {
                    unlink($file);
                }
                // Image FILE REMOVE End

                // NEW FILE UPLOAD
                if (in_array($file_extension, $valid_extensions)) {
                    move_uploaded_file($tmp_file_name, '../uploads/projectImage/'.$random_file_name);
                    $upload_status = true;
                } else {
                    $message = $file_extension." is not Supported";
                }

            }
        } else {
            $random_file_name = $oldImg;
        }

        // image remove end

        $project_id = $_POST['project_id'];
        $category_id     = $_POST['category_id'];
        $project_name = $_POST['project_name'];
        $project_link   = $_POST['project_link'];

      // For backend validation
      if (empty($category_id) || empty($project_name) || empty($project_link)) {
            $message = "All fields are required";
        } else {
            $updateQry = "UPDATE projects SET category_id='{$category_id}', project_name='{$project_name}', project_link='{$project_link}',project_thumb='{$random_file_name}' WHERE id='{$project_id}'";

            $isSubmit = mysqli_query($dbCon, $updateQry);

            if ($isSubmit == true) {
                $message = "Project Update Succesfull";
            } else {
                $message = "Update Failed";
            }
        }
        
    // For project update page redirection
    //    header("Location:../project/projectUpdate.php?project_id={$project_id}&msg={$message}");

    // For Project list page redirection
       header("Location:../project/projectList.php?msg={$message}");
        
    }
