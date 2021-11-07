<?php 


//require_once "../../classes/conexao.php";
require_once "../classes/conexao.php";
	$c = new conectar();
		$conexao=$c->conexao();

	$sql = "SELECT id_categoria, nome_categoria FROM categorias";
	$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "menu.php"; ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.dataTables.min.css">
	<!-- link rel="stylesheet" href="../css/tabela.css" -->
</head>
<body>

<table id="example" class="display" style="width:90%">
<caption><label >Tabela de Categorias</label></caption>
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Apagar</th>
                
            </tr>
        </thead>
           
<tbody>
        <?php while($mostrar = mysqli_fetch_row($result)): ?>

 <tr>
    <td><?php echo $mostrar[1]; ?></td>
    <td>
        <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#atualizaCategoria" onclick="adicionarDado('<?php echo $mostrar[0]; ?>','<?php echo $mostrar[1]; ?>')">
            <span class="glyphicon glyphicon-pencil"></span>
        </span>
    </td>
    <td>
        <span class="btn btn-danger btn-xs" onclick="eliminaCategoria('<?php echo $mostrar[0]; ?>')">
            <span class="glyphicon glyphicon-remove"></span>
        </span>
    </td>
</tr>


<?php endWhile; ?>

</tbody>
        <tfoot>
        </tfoot>
    </table>

    


<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
</body>
</html>


<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        fixedHeader: true
    } );
} );
</script>