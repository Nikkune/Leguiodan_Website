<?php
unset($_SESSION['connectedUser']);
unset($_SESSION['userPerm']);
header("Location:" . $baseWebSite);
?>