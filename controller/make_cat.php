<?php
include_once'../model/manager.php';
include_once'../model/urls.php';

$data = $_POST;

insert_common('tb_cat',$data);
session_start();

$_SESSION['cat_all_ok']='ok';
header("location:../admin.php?option=make_cat");



?>