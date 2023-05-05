<?php 
session_start();
include 'config.php';
$id=$_SESSION['id'];
setcookie('key', 'value', ['samesite' => 'None', 'secure' => true]);
if(isset($_POST['share'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $sql = "INSERT INTO `posts` (`body`, `title`, `id`)
                          VALUES ('$body', '$title', '$id')";
$result = mysqli_query($conn, $sql);
if($result){
    echo'<script> alert("Your post has been shared.")</script>';
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,300;0,400;0,500;1,400&family=Lexend+Deca:wght@200;300&display=swap"
    rel="stylesheet">
  <title>Document</title>
  <script src="https://cdn.tiny.cloud/1/a74840ta4cxlq9b8ju84pay9sxko0s7c1031yh6uqkejqcjj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    // tinymce intaliazation
    tinymce.init({
      selector: '#mytextarea',
      object_resizing: false,
      indent: false,
      width: 900,
      forced_root_blocks: false,
      max_width: 1000,
      plugins: 'code image',
      toolbar: 'undo redo | image code',
      images_file_types: 'jpg,svg,webp,png,jpeg',
      images_upload_url: 'upload.php',
    });

//  image upload handler 
    const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', 'upload.php');

      xhr.upload.onprogress = (e) => {
        progress(e.loaded / e.total * 100);
      };

      xhr.onload = () => {
        if (xhr.status === 403) {
          reject({
            message: 'HTTP Error: ' + xhr.status,
            remove: true
          });
          return;
        }

        if (xhr.status < 200 || xhr.status >= 300) {
          reject('HTTP Error: ' + xhr.status);
          return;
        }

        const json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
          reject('Invalid JSON: ' + xhr.responseText);
          return;
        }

        resolve(json.location);
      };

      xhr.onerror = () => {
        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
      };

      const formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());

      xhr.send(formData);
    });
  </script>
</head>

<body style="">
  <div class="post">
    <div style="width: 50%;
    margin: auto;" class="card">
      <div style="background-color:#ffebee;" class="card-body">
        <h5 style="font-size: 18px;text-align: center;color: #757575;">Please make sure that you have read the coummunity rules and guidelines before you share your post</h5>
      </div>
    </div>
    <form class="post-f"  name="share" action="" method="post">
      <h5>Title of your post : </h5>
      <div style="width: 963px; height: 61px;" class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"></span>
        <input type="text" name="title" class="form-control" aria-describedby="basic-addon1" Required>
      </div>
      <h5>Write your post here : </h5>
      <div class="input-group">
        <span class="input-group-text"></span>
        <textarea id="mytextarea" name="body" class="form-control" aria-label="With textarea"></textarea>
      </div>
      <button style="width:250px;margin-top:50px;margin-bottom: 150px;" name="share" class="btnn">Share my post</button>
    </form>
</body>

</html>