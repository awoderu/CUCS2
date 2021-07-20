<?php
include('security.php');



$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if(isset($_POST['graduate_delete_btn']))
{
    $id = $_POST['graduate_delete_id'];

    $query = "DELETE FROM graduateprojects WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = 'Project Data is Deleted';
        header('location: graduateprojects.php');
    }
    else{
        $_SESSION['success'] = 'Project Data is Not Deleted';
        header('location: graduateprojects.php');
    }

}




// Save faculty

$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if(isset($_POST['save_graduateprojects']))
{
    $id = $_POST['edit_id'];
    $title = $_POST['graduateprojects_title'];
    $content = $_POST['graduateprojects_content'];
    $date = $_POST['graduateprojects_date'];
    $images = $_FILES['graduateprojects_image']['name'];

    if(file_exists("upload/".$_FILES["graduateprojects_image"]["name"]))
    {
            $store = $_FILES["graduateprojects_image"]["name"];
            $_SESSION['status'] =  "Image already exists. '.$store.'";
            header('location:graduateprojects.php');

    }
    else
    {
            $query = "INSERT  INTO graduateprojects(title,content,date,images) VALUES('$title','$content','$date','$images')";
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
            move_uploaded_file($_FILES["graduateprojects_image"]["tmp_name"], "upload/".$_FILES["graduateprojects_image"]["name"]);
            $_SESSION['success'] =  "Project Added";
            header('location: graduateprojects.php');
            }
            else
            {
            $_SESSION['success'] =  "Project Not Added";
            header('location: graduateprojects.php');
            }
    }
}







// faculty update

$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if (isset($_POST['graduateprojects_update_btn']))
 {
    $edit_id = $_POST['edit_id'];
    $edit_title = $_POST['edit_title'];
    $edit_content = $_POST['edit_content'];
    $edit_date = $_POST['edit_date'];


    $edit_graduateprojects_image = $_FILES['graduateprojects_image']['name'];


    $facul_query =" SELECT * FROM graduateprojects WHERE id='$edit_id'";
    $facul_query_run = mysqli_query($connection, $facul_query);
    foreach($facul_query_run as $fa_row)
    {
        // echo $fa_row['images'] ;
        if ($edit_graduateprojects_image == NULL)
         {
            //Update withexisting image
            $image_data = $fa_row['images'];
        }
        else
         {
            //Update with new image and delete with old image   
            if($img_path = "upload/".$fa_row['images'])
            {
                unlink($img_path);
                $image_data = $edit_graduateprojects_image;
            }
            
        }

    }
    $query = "UPDATE graduateprojects SET title='$edit_title', content='$edit_content',date='$edit_date', images='$image_data' WHERE id = '$edit_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        if ($edit_graduateprojects_image == NULL)
         {
            //Update with existing image
            $_SESSION['success'] =  "Project Updatated with existing image";
            header('location: graduateprojects.php');
        }
        else
         {
            //Update with new image and delete with old image   
            move_uploaded_file($_FILES["graduateprojects_image"]["tmp_name"], "upload/".$_FILES["graduateprojects_image"]["name"]);
            $_SESSION['success'] =  "Project Updatated";
            header('location: graduateprojects.php');
        }

        
    }
    else 
    {
        $_SESSION['success'] =  "Project Not Updated";
        header('location: graduateprojects.php');
    }
}



























































// news page
// delete news
$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if(isset($_POST['news_delete_btn']))
{
    $id = $_POST['news_delete_id'];
    // $images = $_FILES['news_image']['name'];
    // $title = $_POST['news_title'];
    // $content = $_POST['news_content'];
    // $date = $_POST['news_date'];

    $query = "DELETE FROM news WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = 'News Data is Deleted';
        header('location: news.php');
    }
    else{
        $_SESSION['success'] = 'News Data is Not Deleted';
        header('location: news.php');
    }
}


// edit News


$connection = mysqli_connect("localhost","root","","adminpanelcucs");

if(isset($_POST['save_news']))
{   
    $id = $_POST['edit_id'];
    $images = $_FILES['news_image']['name'];
    $title = $_POST['news_title'];
    $content = $_POST['news_content'];
    $date = $_POST['news_date'];

    if(file_exists("upload/".$_FILES["news_image"]["name"]))
    {
            $store = $_FILES["news_image"]["name"];
            $_SESSION['status'] =  "Image already exists. '.$store.'";
            header('location: news.php');

    }
    else
    {
            $query = "INSERT  INTO news (images,title,content,date) VALUES('$images','$title','$content','$date')";
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
            move_uploaded_file($_FILES["news_image"]["tmp_name"], "upload/".$_FILES["news_image"]["name"]);
            $_SESSION['success'] =  "Image Added";
            header('location: news.php');
            }
            else
            {
            $_SESSION['success'] =  "Image Not Added";
            header('location: news.php');
            }
    }
}




// Update news

$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if (isset($_POST['news_update_btn']))
 {
    $edit_id = $_POST['edit_id'];
    $edit_title = $_POST['edit_title'];
    $edit_content = $_POST['edit_content'];
    $edit_date = $_POST['edit_date'];


    $edit_news_image = $_FILES['news_image']['name'];


    $facul_query =" SELECT * FROM news WHERE id='$edit_id'";
    $facul_query_run = mysqli_query($connection, $facul_query);
    foreach($facul_query_run as $fa_row)
    {
        // echo $fa_row['images'] ;
        if ($edit_news_image == NULL)
         {
            //Update withexisting image
            $image_data = $fa_row['images'];
        }
        else
         {
            //Update with new image and delete with old image   
            if($img_path = "upload/".$fa_row['images'])
            {
                unlink($img_path);
                $image_data = $edit_news_image;
            }
            
        }

    }

    $query = "UPDATE news SET title='$edit_title', content='$edit_content', images='$image_data' WHERE id = '$edit_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        if ($edit_news_image == NULL)
         {
            //Update with existing image
            $_SESSION['success'] =  "News Updatated with existing image";
            header('location: news.php');
        }
        else
         {
            //Update with new image and delete with old image   
            move_uploaded_file($_FILES["news_image"]["tmp_name"], "upload/".$_FILES["news_image"]["name"]);
            $_SESSION['success'] =  "News Updatated";
            header('location: news.php');
        }

        
    }
    else 
    {
        $_SESSION['success'] =  "News Not Updated";
        header('location: news.php');
    }
}














































// Homepageslider page

$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if(isset($_POST['homepageslider_delete_btn']))
{
    $id = $_POST['homepagedelete_id'];

    $query = "DELETE FROM homepageslider WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = 'Image Data is Deleted';
        header('location:homepageslider.php');
    }
    else{
        $_SESSION['success'] = 'Image Data is Not Deleted';
        header('location: homepageslider.php');
    }

}





$connection = mysqli_connect("localhost","root","","adminpanelcucs");

if(isset($_POST['save_homepageslider']))
{
    $images = $_FILES['homepageslider_image']['name'];

    if(file_exists("upload/".$_FILES["homepageslider_image"]["name"]))
    {
            $store = $_FILES["homepageslider_image"]["name"];
            $_SESSION['status'] =  "Image already exists. '.$store.'";
            header('location: homepageslider.php');

    }
    else
    {
            $query = "INSERT  INTO homepageslider (images) VALUES('$images')";
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
            move_uploaded_file($_FILES["homepageslider_image"]["tmp_name"], "upload/".$_FILES["homepageslider_image"]["name"]);
            $_SESSION['success'] =  "Image Added";
            header('location: homepageslider.php');
            }
            else
            {
            $_SESSION['success'] =  "Image Not Added";
            header('location: homepageslider.php');
            }
    }
}

























// Faculty Page
// Delete faculty
$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if(isset($_POST['faculty_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM faculty WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = 'Faculty Data is Deleted';
        header('location: faculty.php');
    }
    else{
        $_SESSION['success'] = 'Faculty Data is Not Deleted';
        header('location: faculty.php');
    }

}




// Save faculty

$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if(isset($_POST['save_faculty']))
{
    $name = $_POST['faculty_name'];
    $description = $_POST['faculty_description'];
    $images = $_FILES['faculty_image']['name'];

    if(file_exists("upload/".$_FILES["faculty_image"]["name"]))
    {
            $store = $_FILES["faculty_image"]["name"];
            $_SESSION['status'] =  "Image already exists. '.$store.'";
            header('location: faculty.php');

    }
    else
    {
            $query = "INSERT  INTO faculty(name,description,images) VALUES('$name','$description','$images')";
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
            move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/".$_FILES["faculty_image"]["name"]);
            $_SESSION['success'] =  "Faculty Added";
            header('location: faculty.php');
            }
            else
            {
            $_SESSION['success'] =  "Faculty Not Added";
            header('location: faculty.php');
            }
    }
}







// faculty update

$connection = mysqli_connect("localhost","root","","adminpanelcucs");
if (isset($_POST['faculty_update_btn']))
 {
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_description = $_POST['edit_description'];


    $edit_faculty_image = $_FILES['faculty_image']['name'];


    $facul_query =" SELECT * FROM faculty WHERE id='$edit_id'";
    $facul_query_run = mysqli_query($connection, $facul_query);
    foreach($facul_query_run as $fa_row)
    {
        // echo $fa_row['images'] ;
        if ($edit_faculty_image == NULL)
         {
            //Update withexisting image
            $image_data = $fa_row['images'];
        }
        else
         {
            //Update with new image and delete with old image   
            if($img_path = "upload/".$fa_row['images'])
            {
                unlink($img_path);
                $image_data = $edit_faculty_image;
            }
            
        }

    }

    $query = "UPDATE faculty SET name='$edit_name', description='$edit_description', images='$image_data' WHERE id = '$edit_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        if ($edit_faculty_image == NULL)
         {
            //Update with existing image
            $_SESSION['success'] =  "Faculty Updatated with existing image";
            header('location: faculty.php');
        }
        else
         {
            //Update with new image and delete with old image   
            move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/".$_FILES["faculty_image"]["name"]);
            $_SESSION['success'] =  "Faculty Updatated";
            header('location: faculty.php');
        }

        
    }
    else 
    {
        $_SESSION['success'] =  "Faculty Not Updated";
        header('location: faculty.php');
    }
}






























































// about us


if(isset($_POST['about_save']))
{
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $links = $_POST['links'];

    $query = "INSERT INTO aboutus (title, subtitle,description,links) VALUES ('$title','$subtitle', '$description','$links')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = 'About us added';
        header('location: aboutus.php');
    }
    else{
        $_SESSION['success'] = 'About us not added';
        header('location: aboutus.php');
    }

}   




if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
        $query="INSERT INTO register (username,email,password) VALUES('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo "saved";
            $_SESSION['success'] = "Admin Profile Added";
            header('location: register.php');
        }
        else
        {
            // echo "not saved";
            $_SESSION['status'] = "Admin Profile NOT Added";
            header('location: register.php');
        }
    }
    else{
        $_SESSION['status'] = "Password and Confirm Password Does Not Match";
        header('location: register.php');
    }
}


































// Login Page
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email ='$email_login'AND password= '$password_login'";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] ='Email ID or Password is incorrect';
        header('Location: login.php');
    }


}














?>