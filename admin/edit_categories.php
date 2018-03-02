<form action="" method = "post">
                              <div class="form-group">

                              <?php
                  
                  if(isset($_GET['update'])){

                    $cat_update_id = $_GET['update'];

                  $query = "SELECT * FROM categories WHERE cat_id = {$cat_update_id}";

                  $update_categories = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($update_categories)){
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                    }

                  }
                  
                  ?>


                                <input type="text" class="form-control" name="cat_title" value = <?php if(isset($cat_title)) echo $cat_title; ?> >

                              <?php
                              
                              if(isset($_POST['update_category'])){
                                
                                                    $cat_title = $_POST['cat_title'];
                                
                                                  $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
                                
                                                  mysqli_query($connection, $query);
                                
                                
                                                  }
                              
                              ?>

                              </div>
                              <div class="form-group">
                                <input class = "btn btn-primary" type="submit" value = "Update" name="update_category">
                              </div>
                            </form>