<?php

include_once'controller/connect.php'; 
include_once'model/manager.php'; 
include_once'model/meu_manager.php'; 


$product = select_common("tb_product",null,null,null);
$social =select_common("tb_social",null,null,null); 
$contact = select_common("tb_contact",null,null,null);
$config = select_common("tb_config",null,null,null);
                                                                    
$config = $config[0];
$cont = count($contact);
$cont_pro=count($product);
                        

?>