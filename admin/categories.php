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

                        <div class="row">
                          <div class="col-xs-6">
                          <?php insert_categories(); ?>
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

                              <?php allCategories(); ?>

                  <?php deleteCategories(); ?>



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
