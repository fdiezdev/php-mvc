<?php 

# Controllers
include_once "controllers/template.php";
include_once "controllers/user.php";

# Models
include_once "models/user.php";


$template = new TemplateController();
$template->Template();