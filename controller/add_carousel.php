<?php
include_once'../model/manager.php';
include_once'../model/urls.php';

//digite entre as aspas o nome do servidor/host
$servidor = 'ftp.mrweb.hol.es';

//digite entre as aspas a senha 
$senha='erick157741';        

//digite entre as aspas o nome de usuario       
$nome_usuario='u749552018';
        

        $caminho_absoluto = '/public_html/img/';
        $arquivo = $_FILES['file'];
        
        $extensao = strtolower(substr($_FILES['file']['name'], -4));
        $novo_nome= md5(time()).$extensao;
        
        $arquivo['name'] = $novo_nome;
     

        $con_id = ftp_connect($servidor) or die( 'Não conectou em: '.$servidor );
        ftp_login( $con_id, $nome_usuario, $senha );

        ftp_put( $con_id, $caminho_absoluto.$arquivo['name'], $arquivo['tmp_name'], FTP_BINARY );

$data['img']=$novo_nome;
$data['id_product']=$_POST['id_product']; 
$result = insert_common("carousel",$data);
 header("location:../admin.php?option=carou");




?>