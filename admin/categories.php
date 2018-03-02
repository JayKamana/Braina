<?php include "includes/header.php" ?>



    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel
                            <small>Subheading</small>
                        </h1>
                        <?php

  if(isset($_POST['submit'])){
    $cat = $_POST['cat_title'];

    if ($cat == "" || empty($cat)){
      echo "This field should not be empty";
    }

    else {
      $query = "INSERT INTO categories (cat_title) VALUES ('{$cat}')";

      mysqli_query($connection, $query);
    }

    header("Location: categories.php");

  }

?>
                        <div class="row">
                          <div class="col-xs-6">
                            <form action="" method = "post">
                              <div class="form-group">
                                <input type="text" class="form-control" name="cat_title">
                              </div>
                              <div class="form-group">
                                <input class = "btn btn-primary" type="submit" value = "Add Category" name="submit">
                              </div>
                            </form>

                            <?php
                            if(isset($_GET['update'])){
                              $cat_id = $_GET['update'];

                              include "edit_categories.php";
                            }

                             ?>

                          </div>

                          <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Category Title</th>
                                  <th>Delete</th>
                                  <th>Edit</th>
                                </tr>
                              </thead>
                              <tbody>

                              <?php
                  
                    $query = "SELECT * FROM categories";
                    $all_categories = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($all_categories)){
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "
                        
                        <tr>
                          <td>{$cat_id}</td>
                          <td>{$cat_title}</td>
                          <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                          <td><a href='categories.php?update={$cat_id}'>Edit</a></td>
                        </tr>
                        
                        ";
                    }
                    
                  ?>

                  <?php
                  
                  if(isset($_GET['delete'])){

                    $cat_delete_id = $_GET['delete'];

                  $query = "DELETE FROM categories WHERE cat_id = {$cat_delete_id}";

                  mysqli_query($connection, $query);

                  header("Location: categories.php");

                  }
                  
                  ?>



                              </tbody>
                            </table>
                          </div>
                        </div>
                        

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/footer.php" ?>
