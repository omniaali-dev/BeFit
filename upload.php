<?php 
 

 $accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com"); 

// upload folder 
$imageFolder = "upload_image/"; 
 
if (isset($_SERVER['HTTP_ORIGIN'])) {  
    if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) { 
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']); 
    } else { 
        header("HTTP/1.1 403 Origin Denied"); 
        return; 
    } 
} 
// Don't attempt to process the upload on an OPTIONS request 
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { 
    header("Access-Control-Allow-Methods: POST, OPTIONS"); 
    return; 
} 
 
reset ($_FILES); 
$temp = current($_FILES); 
if (is_uploaded_file($temp['tmp_name'])){ 

    // Sanitize input 
    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) { 
        header("HTTP/1.1 400 Invalid file name."); 
        return; 
    } 
 
    
    if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "jpeg", "png"))) { 
        header("HTTP/1.1 400 Invalid extension."); 
        return; 
    } 
 
    $filetowrite = $imageFolder . $temp['name']; 
    if(move_uploaded_file($temp['tmp_name'], $filetowrite)){ 
        // Determine the base URL 
          $size = getimagesize($filetowrite);
           $maxWidth = 500;
           $maxHeight = 500;
           if ($size[0] > $maxWidth || $size[1] > $maxHeight){
               $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://"; 
               $baseurl = $protocol . $_SERVER["HTTP_HOST"] . rtrim(dirname($_SERVER['REQUEST_URI']), "/") . "/"; 
     
    
        echo json_encode(array('location' => $baseurl . $filetowrite)); 
    }}else{ 
        header("HTTP/1.1 400 Upload failed."); 
        return; 
    } 
} else { 
    // Notify that the upload failed 
    header("HTTP/1.1 500 Server Error"); 
} 
 
?>