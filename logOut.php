<?php
session_unset();
session_destroy();

header("Location: ./WebApp/login.php");