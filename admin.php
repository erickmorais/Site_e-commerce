<!DOCTYPE html>
<html>
<head>
<title>Area do administrador</title>
<style type="text/css">
        a {text-decoration: none;}
        p {color:blue;}
        body{background-color:black; }
       
</style>

<body>

</body>
</html>




<?php
include_once'controller/validate.php';

session_start();
if (!isset($_SESSION['logado'])) {
	header("location:view/forms/login.html");
}

include_once'view/template.html';


?>



