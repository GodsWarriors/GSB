<?php


session_start();
session_destroy();
echo 'Vous avez été déconnecté. <a href="../view/frmLogin.php">Retour</a>';


?>