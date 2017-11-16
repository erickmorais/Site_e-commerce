<?php
include_once '../model/manager.php';

	$filter = $_POST['filter'];
    


	$filte['social_id'] = $filter;
	

	$delete = delete_common("tb_social",$filte,null);

  header("location:../admin.php?option=sociais" );

?>