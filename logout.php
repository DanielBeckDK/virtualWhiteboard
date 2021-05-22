<?php
//Destory the session which from a front-end perspective logs out the user
session_start();
session_destroy();
header("Location: index.php");
exit();
