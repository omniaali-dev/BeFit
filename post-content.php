<?php
session_start();
include 'config.php';
$id=$_SESSION['id'];


//delete post
if(isset($_GET['delete'])){
$post_id = $_GET['delete'];
$sql="SELECT * FROM comments WHERE post_id='$post_id'";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
  $sql = "DELETE FROM `comments` WHERE `post_id` = '$post_id'";
 $result = mysqli_query($conn, $sql);
}
 $sql = "DELETE FROM `posts` WHERE `post_id` = '$post_id'";
 $result = mysqli_query($conn, $sql);
 if($result){
  echo "<script>alert('Your post has been deleted');</script>";
  header("Location:fourm.php");

 }

}
//delete comment
    if(isset($_GET['delcomment'])){
$comment_id = $_GET['delcomment'];
 $sql = "DELETE FROM `comments` WHERE `comment_id` = '$comment_id'";
 $result = mysqli_query($conn, $sql);
 if($result){
  echo "<script>alert('Your comment has been deleted');</script>";
  header("Location:fourm.php");

 }
}
?>
 <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,300;0,400;0,500;1,400&family=Lexend+Deca:wght@200;300&display=swap"
      rel="stylesheet">
    <title>Be Fit discussion</title>

  </head>

  <body style="overflow-x: hidden;position: absolute;">
 <div style="margin-bottom:40px;"class="header">
      <a href="" class="logo">
        <img src="images/logo.png" alt="">
      </a>
      <ul class="main-nav" id="main-nav">
        <li>
          <a href="userdiary.php">MY DIARY</a>
        </li>
        <li>
          <a href="contactus.php">CONTACT US</a>
        </li>
             <li>
          <a href="fourm.php">FOURM</a>
        </li>
      </ul>
    </div>
  </body>
  
<?php 
//showing post content

if(isset($_GET['post']) or isset($_GET['wcomment'])){
 $id=$_SESSION['id'];
$sql = "SELECT body,title,date,username ,user.id ,post_id FROM  user,posts WHERE user.id=posts.id ORDER BY post_id DESC ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
  if($_GET['post']== $row['post_id']){
  $post= $row['body'];
  $title=$row['title'];
  $date=$row['date'];
  $username=$row['username'];
  $id=$row['id'];
  $post_id=$row['post_id'];

?>

  <div class="card post-con">
    <p style="margin-left:10px; margin-bottom:10px;margin-top:10px;color: #757575;" class="card-title">posted by:
      <?php echo $username ?>
    </p>
    <div class="post-content">

      <p style="font-weight: bold; color:#757575; ;margin-left: -4px; font-size: 18px; ">
        <?php echo $title ?>
      </p>

      <p style=" font-size: 19px; margin-left: 42px; text-align:center;">
        <?php echo $post ?> </p>
    </div>
    <p style="margin-left: 10px; margin-top: 18px;;color:#757575;">Posted at:
      <?php $d=strtotime($row['date']); echo date("d-m-Y h:i:s",$d) ?>
    </p>
    <?php  if($_SESSION['id'] == $row['id']){?>
    <!-- if the user id from the database is the same as the id stored in the session allow user to delete or edit post-->
    <div style="display: flex;  gap: 24px;  margin-left: 14px;  margin-bottom: 12px;">
      <a href='post-content.php?delete=<?php echo $row['post_id']?>'> Delete post </a>
      <a href='edit_post.php?edit=<?php echo $row['post_id'];?>&post=<?php echo $row['body'];?>&title=<?php echo $row['title'];?>'> Edit post </a>
    </div>
    <?php 
    }?>

  </div>

  <!-- starting comments -->
  <h5 style="transform: translate(247px, 202px); font-size:30px">Comments : </h5>
  <?php }}}
  if(isset($_POST['comment'])){
    $comment=$_POST['comment-body'];
    $sql = "INSERT INTO `comments` (`comment`,`id`,`post_id`)
                          VALUES ('$comment', '$id' ,'$post_id')";
      $result = mysqli_query($conn, $sql);
  }
        $sql= "SELECT comment,comment_id,username,comments.date,user.id,comments.post_id FROM comments,user WHERE user.id=comments.id  ORDER BY comment_id DESC";
        $result = mysqli_query($conn, $sql);
      
while ($row = mysqli_fetch_assoc($result)){
  $post=$row['post_id'];
  $comment= $row['comment'];
  $date=$row['date'];
  $username=$row['username'];
  $id=$row['id'];
  $comment_id=$row['comment_id'];
      if($post == $_GET['post']){?> 
  <div style="border-radius: 7px; transform: translate(248px, 250px); box-shadow: 6px 8px 10px 13px #eee; border: 1px solid white;"
    class="cardf card1">
    <p style="margin-left:10px; margin-bottom:10px;margin-top:10px;color: #757575;" class="card-title">comment by:
      <?php echo $username ?>
    </p>
    <div class="post-content">
      <p class="ppost" style="margin-left:10px">
        <?php echo $comment ?>
      </p>
    </div>
    <p style="margin-left: 10px; margin-top: 18px;;color:#757575; display:inline;">Posted at:
      <?php  $d=strtotime($row['date']); echo date("d-m-Y h:i:s",$d) ?>
    </p>
    <?php  if($_SESSION['id'] == $row['id']){?>
    <a style="margin-left:10px" href="post-content.php?delcomment=<?php echo $row['comment_id'] ?>">Delete</a>
    <?php } ?>
  </div>
  <?php  }} ?>

  <div>
    
    <form class="post-conf" method="post" name="share-comment" action="">
      <h5 >Leave your comment</h5>
      <!-- form for inserting comments -->
      <div style="height: 100%;width: 100%;" class="input-group mb-3">
        <input type="text" name="comment-body" class="form-control" aria-describedby="basic-addon1">
      </div>
      <button name="comment" class="btnn" style="">share comment</button>
    </form>
  </div>
  </html>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>