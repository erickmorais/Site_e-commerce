<?php
include_once'../model/manager.php';
include_once'../model/urls.php';


$data =$_POST;
//var_dump($data);

$filter['id'] ="2";


$tipo =$data['banco'];

if ($data['banco'] == "tb_contact" && isset($data['tele'])) {

unset($data['filter']);
unset($data['banco']);	
$data['email']="-";
unset($data['tableGeral_length']);

insert_common('tb_contact',$data);



}else if($data['banco'] == "tb_contact" && isset($data['email'])){

unset($data['filter']);
unset($data['banco']);	
$data['tele']="-";
unset($data['tableGeral_length']);

insert_common('tb_contact',$data);



}else if($data['banco'] == 'name'){

$filter['id']= 1;

unset($data['banco']);
update_common('tb_config', $data, $filter, null);


	
}




//$result = insert_common($banco,$data);


if ($tipo == 'tb_contact') {
	session_start();

    $_SESSION['contact_all_ok']='ok';

	header("location:../admin.php?option=contacts");

}else{
  
session_start();

$_SESSION['name_all_ok']='ok';

header("location:../admin.php?option=name");

}

?>