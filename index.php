
<?php  include('server.php'); ?>

<!--edit the information that is saved on the  server-->

<?php 
  
  if (isset($_GET['edit'])) {
    $id=$_GET['edit'];
    $update=true;
    $record= mysqli_query($db,"SELECT * FROM info WHERE id=$id");

    if (count($record)==1) {
       $d = mysqli_fetch_array($record);
       $name=$d['name'];
       $address=$d['address'];
    }
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>inputformation  saving  apps </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <!--diplaying the confirmation  message-->

    <?php  if (isset($_SESSION['message'])):?>
            <div class="msg">
                <?php
                    echo $_SESSION['message'];
                     unset($_SESSION['message']);
                 ?>
            </div>

          <?php endif ?>
    <!--end   of  confirmation message  displaying  -->




<!--displaying the  items on the  browser-->

<?php $results = mysqli_query($db ,"SELECT * FROM info"); ?>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>

<?php while ($row = mysqli_fetch_array($results)) {?>
  <tr>
    <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['address']; ?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
        </td>
        <td>
            <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
        </td>
  </tr>
<?php } ?>
</table>

      <form  action="server.php" method="post">
          <div class="input-group">
              <label>Name</label>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="text" name="name" value="<?php echo $name; ?>">
          </div>

          <div class="input-group">
              <label>Address</label>
              <input type="text" name="address" value="<?php echo $address; ?>">
          </div>
          <div class="input-group">

            <?php if($update == true): ?>
              <button type="submit" class="btn" name="update" style="background:#556B2F">Update</button>
            <?php else: ?>
              <button class="btn" type="submit" name="save">Save</button>
            <?php endif  ?>
          </div>
      </form>


  </body>
</html>
