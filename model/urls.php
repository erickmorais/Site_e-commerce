<?php

	//Variável que guarda o nome do projeto
	$project_name = "site/";

	//variável que guarda a url do projeto no servidor
	$project_index = "http://".$_SERVER['SERVER_NAME'].$project_name;
	
	//variável que guarda o caminho do projeto no servidor
	$project_path = $_SERVER['DOCUMENT_ROOT'].$project_name;

	//variável global do index
	$GLOBALS['project_index'] = $project_index;

	//variavel global para o caminho do dir
	$GLOBALS['project_path'] = $project_path;


?>
