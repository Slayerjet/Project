<?php 
session_start();



// if(isset($_SESSION['username'])){
//     echo "test123";
// }else{
//     echo "no123";
// }

if(isset($_SESSION['user_id'])) {

    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    session_destroy();    
}
    header('location:index.php'); 
?>