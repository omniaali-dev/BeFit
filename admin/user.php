
<?php
include '../../project/config.php';
 // using mysqli_query instead
if(isset($_GET['del'])){
    $user_id = $_GET['del'];
     
    //comments table
     $sql="SELECT * FROM comments WHERE id='$user_id'";
     $result = mysqli_query($conn,$sql);
     if($result->num_rows > 0){
     $sql = "DELETE FROM `comments` WHERE `id`='$user_id'";
        $result = mysqli_query($conn,$sql);}
    //posts table 
    $sql="SELECT * FROM posts WHERE id='$user_id'";
    $result = mysqli_query($conn,$sql);
     if($result->num_rows > 0){
     $sql = "DELETE FROM `posts` WHERE `id`='$user_id'";
     $result = mysqli_query($conn,$sql);}
  
        //inatke table 
    $sql="SELECT * FROM intake WHERE id='$user_id'";
    $result = mysqli_query($conn,$sql);
     if($result->num_rows > 0){
     $sql = "DELETE FROM `intake` WHERE `id`='$user_id'";
    $result = mysqli_query($conn,$sql);}
  //healthdata
     $sql = "DELETE FROM `healthdata` WHERE `id`='$user_id'";
    $result = mysqli_query($conn,$sql);
   //food table 
    $sql="SELECT * FROM food WHERE id='$user_id'";
    $result = mysqli_query($conn,$sql);
     if($result->num_rows > 0){
     $sql = "DELETE FROM `food` WHERE `id`='$user_id'";
    $result = mysqli_query($conn,$sql);}
    //stastics table 
    $sql="SELECT * FROM statistics WHERE id='$user_id'";
    $result = mysqli_query($conn,$sql);
     if($result->num_rows > 0){
     $sql = "DELETE FROM `statistics` WHERE `id`='$user_id'";
    $result = mysqli_query($conn,$sql);}

    $sql = "DELETE FROM `user` WHERE `id`='$user_id'";
    $result = mysqli_query($conn,$sql);
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet"
    href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <!-- CSS only -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <!-- <link rel="stylesheet" href="css/project.css"> -->
</head>
<body>
    <table style="width: 50%;position: absolute;left: 50%;top: 50%;transform: translate(-50%, -90%);height: 295px;"class="table table-bordered"> 
    <tbody>
    <tr>  
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td >Delete</td>
        </tr>
        <?php 
     $result = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
        while($res = mysqli_fetch_assoc($result)) {         ?>
            <tr>

          <td>
            <?php echo $res['id']; ?> 
          </td>
          
          <td> 
            <?php echo $res['username'] ?> 
        </td>
        <td>
           <?php echo $res['email'] ?>
    
         </td>
            <td><a href="user.php?del=<?php echo $res['id'] ?>"><i style="color:#c90000" class="fa-solid fa-circle-minus"></i> </a></td>
            
        <?php } ?>
        
       
        
        </tbody>
    </table>
    </body>
    </html>