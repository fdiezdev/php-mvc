<?php 
session_start();

include 'components/navbar.php';

if (isset($_SESSION["id"]))
{

    if (isset($_GET["ruta"]))
    {
        if($_GET["ruta"] == "dashboard" || $_GET["ruta"] == "logout")
        {
            include "routes/".$_GET["ruta"].".php";
        } else {
            include "components/404.php";
        }
    } else {
        include "routes/dashboard.php";
    }
} else {
    if(isset($_GET['ruta'])) {
        include "routes/login.php";
    }
}

?>

<?php include 'components/footer.php' ?>
