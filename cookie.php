<?php
/* Initialize the session */
session_start();

if (isset($_GET["cookie"])) {
    echo "<b>Your browser cookie is : </b>".$_GET["cookie"];
}

?>