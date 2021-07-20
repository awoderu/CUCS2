<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT NEWS </h6>
        </div>
        <div class="card-body">
            <?php
            $connection = mysqli_connect("localhost","root","","adminpanelcucs");
            if(isset($_POST['edit_data_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM news WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="edit_id" value="<?php echo $row['id'] ?>" class="form-control" placeholder="">
                   <div class="form-group">
                        <label>Upload image</label>
                        <input type="file" name="news_image" id="news_image" value="<?php echo $row['images'] ?>" class="form-control" placeholder="">
                    </div> 
                    <div class="form-group">
                        <label>Title </label>
                        <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" name="edit_content" value="<?php echo $row['content'] ?>" class="form-control" placeholder="">
                    </div> 
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" name="edit_date" value="<?php echo $row['date'] ?>" class="form-control" placeholder="">
                    </div> 
                        <a href="news.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="news_update_btn" class= "btn btn-primary"> update </button>
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