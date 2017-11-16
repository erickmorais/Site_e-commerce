<?php
	ini_set("display_errors", 1);

	/**
	*@author: Anthony Jefferson
	*@package: controller
	*
	*Este arquivo conterá a conexão com o banco de dados
	**/

	//Váriáveis de Conexão u749552018_bank
	$db_host = "localhost";
	$db_user = "root";
	$db_password = "123";
	$db_name = "web_site";


	//Iniciando a conexão com o servidor da base de dados
	$conn = mysqli_connect($db_host,$db_user,$db_password) or die(mysqli_error($conn));

	//conectar com o banco de dados
	mysqli_select_db($conn,$db_name) or die(mysqli_error($conn));


?>