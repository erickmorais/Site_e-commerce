<?php
	


	include_once '../model/manager.php';

	$filter = $_POST['filter'];
    


	$filte['id_mens'] = $filter;
	

	$delete = delete_common("tb_mensage",$filte,null);

  header("location:../admin.php?option=mens" );
?>
