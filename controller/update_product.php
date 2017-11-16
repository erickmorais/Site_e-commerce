<?php
 
include_once'../model/manager.php';
include_once'../model/urls.php';


$data = $_POST;
var_dump($data);

$img = $data['imagem'];




if(!empty($_FILES['file']['name']) ){
unlink("../img/$img");
$imagem = $data['imagem']; 


	
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

$data['imagem']=$novo_nome;



}

$filte['id']=$data['filter'];


unset($data['filter']);


$update = update_common('tb_product', $data, $filte, null);

header("location:../admin.php?option=list_products");





?>