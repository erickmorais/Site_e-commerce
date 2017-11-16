<?php
include_once '../model/manager.php';

	$filter = $_POST['filter'];
    
    $filte['id'] = $filter;
	
	$delete = delete_common("tb_contact",$filte,null);

  header("location:../admin.php?option=contacts" );

?>