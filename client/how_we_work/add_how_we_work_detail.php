 <?php
            session_start();

    
      include('../assets/include/db.php');

$sql="INSERT INTO how_we_work_detail(title,description) VALUES ('$_POST[title]','$_POST[description]')";
$run=mysqli_query($conn,$sql);
if($run) {
    echo 'done';
}
else {
    echo 'error';
}



          ?>
