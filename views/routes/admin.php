<?php
    if(!isset($_SESSION['id']) || $_SESSION['role'] != 2) {
        header("Location: login");
    } else {
        echo "Zorra, no tienes acceso";
    }