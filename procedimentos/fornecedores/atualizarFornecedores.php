<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/fornecedores.php";



$obj = new fornecedores();



$dados=array(
	$_POST['idfornecedorU'],
	$_POST['nomeU'],
	$_POST['apelidoU'],
	$_POST['enderecoU'],
	$_POST['emailU'],
	$_POST['telefoneU']
	

);

echo $obj->atualizar($dados);

 ?>