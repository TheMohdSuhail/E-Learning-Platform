<?php
session_start();

session_unset();
session_destroy();

header("location: /learn/index.php");
exit;
?>