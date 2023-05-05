<?php
include '../../project/config.php'; 
if(isset($_GET['del'])){
  $post_id = $_GET['del'];
  $sql= "DELETE FROM `posts` WHERE `post_id` = '$post_id'";
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous">
    </script>
  </head>

  <body style="background-color:#eee">
    <table style="background: whitesmoke; width: 50%; position: absolute; left: 50%; top: 50% ;transform: translate(-50%, -90%); height: 295px;"
      class="table table-bordered">
      <tbody>
        <tr>
          <td>Post_ID</td>
          <td>User_ID</td>
          <td>User_Name</td>
          <td>Post_Title</td>
          <td>Date</td>
          <td>Delete</td>
        </tr>
        <?php 
     $result = mysqli_query($conn, "SELECT post_id,posts.id,title,username,posts.date FROM posts,user WHERE user.id=posts.id ORDER BY id DESC");
        while($res = mysqli_fetch_assoc($result)) {    ?>
        <tr>
          <td>
            <?php echo $res['post_id']; ?>
          </td>
          <td>
            <?php echo $res['id']; ?>
          </td>
          <td>
            <?php echo $res['username']; ?>
          </td>
          <td>
            <?php echo $res['title']; ?>
          </td>
          <td>
            <?php echo $res['date']; ?>
          </td>
          <td>
            <a href="user_posts.php?del=<?php echo $res['post_id']; ?>">
              <i style="color:#c90000" class="fa-solid fa-circle-minus"></i>
            </a>
          </td>
          <?php } ?>
      </tbody>
    </table>
  </body>

  </html>