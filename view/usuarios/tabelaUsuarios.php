<?php 
	
	require_once "../../classes/conexao.php";
	$c= new conectar();
	$conexao=$c->conexao();

	$sql="SELECT id,
					nome,
					user,
					email
			from usuarios";
	$result=mysqli_query($conexao, $sql);

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/tabela.css">
</head>
<body>


<table class="table table-hover table-condensed table-bordered tituloTabcli" style="text-align: center;">
	<caption><label>Usuários :)</label></caption>
	<tr class = "cb">
		<td>Nome</td>
		<td>Usuário</td>
		<td>Email</td>
		<td>Editar</td>
		<td>Excluir</td>
	</tr>

	<?php while($mostrar = mysqli_fetch_row($result)): ?>

	<tr class = "cb1">
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td><?php echo $mostrar[3]; ?></td>
		<td>
			<span data-toggle="modal" data-target="#atualizaUsuarioModal"
             class="btn btn-warning btn-xs" 
             onclick="adicionarDados('<?php echo $mostrar[0]; ?>')">

				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs btcor" onclick="eliminarUsuario('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>

<?php endwhile; ?>
</table>