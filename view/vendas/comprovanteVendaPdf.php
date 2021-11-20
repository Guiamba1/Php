<?php 
	require_once "../../classes/conexao.php";
	require_once "../../classes/vendas.php";

	$objv= new vendas();


	$c= new conectar();
	$conexao=$c->conexao();
	$idvenda=$_GET['idvenda'];

 $sql="SELECT ve.id_venda,
		ve.dataCompra,
		ve.id_cliente,
		pro.nome,
        pro.preco,
        pro.descricao
	from vendas  as ve 
	inner join produtos as pro
	on ve.id_produto=pro.id_produto
	and ve.id_venda='$idvenda'";

$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);

	$comp=$ver[0];
	$data=$ver[1];
	$idcliente=$ver[2];

 ?>	
<link rel="stylesheet" href="css/relatorio.css">

 	<style type="text/css">
		
@page {
            margin-top: 0.3em;
            margin-left: 0.6em;
        }
    body{
    	font-size: 20px;
    }

    div{
        background: #fff !important;
        box-shadow: 0 0 10px rgb(0, 0, 0,0.2) !important;
        
        
    }

    div p{
        margin-left: 100px;
    }
    div table{
        margin-left: 100px;
        border-radius: 5px;
        border-left: 2px !important;
        border-right: 2px !important;
    }

    div table .cabecalho{
        background: #ccc;
        color: #fff;
    }
    div h4{
        width: 50px;
        height: 50px;
        margin-left: 50px;
       
        border-radius: 50%;
    }
	</style>

  <div>
<!-- <h4>LOGOS</h4> -->
 		<p>Vendas</p>
         <hr>
 		<p>
 			Data: 
 			<?php echo date("d/m/Y", strtotime($data)) ?>
 		</p>
 		<p>
 			Recibo Numero: <?php echo $comp ?>
 		</p>
 		<p>
 			Cliente: <?php echo $objv->nomeCliente($idcliente); ?>
 		</p>
         <hr>
 		
 		<table style="border-collapse: collapse;" width="550px">
 			<tr class= "cabecalho">
 				<td>Nome</td>
 				<td>Preco unitario</td>
 				<td>Quantidade</td>
                 <td>Sub Total</td>
 			</tr>
 			<?php 
 				$sql="SELECT ve.id_venda,
							ve.dataCompra,
							ve.id_cliente,
							pro.nome,
					        pro.preco,
					        pro.descricao,
					        ve.quantidade,
					        ve.total_venda
						from vendas  as ve 
						inner join produtos as pro
						on ve.id_produto=pro.id_produto
						and ve.id_venda='$idvenda'";

				$result=mysqli_query($conexao,$sql);
				$total=0;
				while($mostrar=mysqli_fetch_row($result)){
 			 ?>
              <?php  $soma = $mostrar[4] * $mostrar[6];?>
 			<tr>
 				<td><?php echo $mostrar[3]; ?></td>
 				<td><?php echo $mostrar[4]?></td>
 				<td><?php echo $mostrar[6]; ?></td>
                 <td><?php echo $soma; ?></td>
                 
 			</tr>
 			<?php
 				$total=$total + $mostrar[7];
 				} 
 			 ?>
 			 <tr  class = "cabecalho">
 			 	<td colspan="4">Total: <?php echo $total." Meticais" ?></td>
 			 </tr>
 		</table>
         </div>
 		
