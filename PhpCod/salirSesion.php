<?php

session_start();

session_destroy();

header("location: ../LoginAdmin.html");
exit();

?>