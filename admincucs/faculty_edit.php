<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Faculty </h6>
        </div>
        <div class="card-body">
            <?php
            $connection = mysqli_connect("localhost","root","","adminpanelcucs");
            if(isset($_POST['edit_data_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM faculty WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="edit_id" value="<?php echo $row['id'] ?>" class="form-control" placeholder="Enter Username">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Upload image</label>
                        <input type="file" name="faculty_image" id="faculty_image" value="<?php echo $row['images'] ?>" class="form-control" placeholder="Enter Email">
                    </div>
                    
                        <a href="faculty.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="faculty_update_btn" class= "btn btn-primary"> update </button>
                </form>
            </div>
    </div>
</div>

        <?php
            }
        }
        ?>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>