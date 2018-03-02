<?php

function insert_categories(){

  global $connection;

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


}

function allCategories(){

  global $connection;

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

}

function deleteCategories(){

global $connection;

if(isset($_GET['delete'])){
  
                      $cat_delete_id = $_GET['delete'];
  
                    $query = "DELETE FROM categories WHERE cat_id = {$cat_delete_id}";
  
                    mysqli_query($connection, $query);
  
                    header("Location: categories.php");
  
                    }

}

?>