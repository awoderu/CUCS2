<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="news_image" id="news_image" class="form-control" required>
            </div>
            <div class="form-group">
                <label> Title </label>
                <input type="text" name="news_title" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label>Content</label>
                <input type="text" name="news_content" class="form-control" placeholder="Enter Description" required>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="text" name="news_date" class="form-control" placeholder="Enter Description" required>
            </div>
            
        </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="save_news" class="btn btn-primary">Save</button>
            </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">News Page
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsModal">
              Add  
            </button>
    </h6>
  </div>

  <div class="card-body">
  
          <?php
          if(isset($_SESSION['success']) && $_SESSION['success']!='')
          {
            echo '<h2 class="bg-primary text white"> '.$_SESSION['success'].'</h2>';
            unset($_SESSION['success']);
          }

          if(isset($_SESSION['status']) && $_SESSION['status']!='')
          {
            echo '<h2 class= "bg-danger text white" > '.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
          }
          ?>

    <div class="table-responsive">
          <?php
            $connection = mysqli_connect("localhost","root","","adminpanelcucs");
            $query ="SELECT * FROM news";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
          ?>


          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title </th>
                <th>Content </th>
                <th>Date</th>
                <th>EDIT </th>
                <th>DELETE </th>
              </tr>
            </thead>
            <tbody>
                <?php
                  while($row = mysqli_fetch_assoc($query_run))
                  {
                ?>
              <tr>
                <td><?php  echo $row['id']?></td>
                <td><?php  echo $row['title']?></td>
                <td><?php  echo $row['content']?></td>
                <td><?php  echo $row['date']?></td> 
                <td><?php  echo '<img src="upload/'.$row['images'].'" width="100px;" height="100px;" alt="image">'?></td>
                <td>
                    <form action="news_edit.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php  echo $row['id']?>">
                        <button  type="submit" name="edit_data_btn" class="btn btn-success"> EDIT</button>
                    </form>
                </td>
                <td>
                    <form action="code.php" method="POST">
                      <input type="hidden" name="news_delete_id" value="<?php  echo $row['id']?>">
                      <button type="submit" name="news_delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                </td>
              </tr>   
          <?php
          }
          ?>
              </tbody>
            </table>
        <?php
        }
        else
        {
        echo "No Record Found";
        }
        ?>

    </div>
  </div>
</div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>