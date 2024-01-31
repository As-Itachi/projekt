session_start();
<?php
if(!isset($_SESSION['email'])){
    echo "Du bist nicht angemeldet!";
} else{
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
}
?>
