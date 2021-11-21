<?php 

	require_once "../../classes/conexao.php";
	require_once "../../classes/vendas.php";
	$c= new conectar();
	$conexao=$c->conexao();

	$obj= new vendas();

	$sql="SELECT id_venda, dataCompra, id_cliente 
	from vendas group by id_venda order by dataCompra desc;";
	$result=mysqli_query($conexao,$sql); 
	?>


<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: left;">
				<caption><label>Vendas</label></caption>
				<tr>
					<td>Código</td>
					<td>Data</td>
					<td>Cliente</td>
					<td>Total da Compra</td>
					<td>Relatorios</td>
					<!-- <td>Relatório</td> -->
				</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo date("d/m/Y", strtotime($ver[1])) ?></td>
					<td>
						<?php
							if($obj->nomeCliente($ver[2])== ""){
								echo "S/C";
							}else{
								echo $obj->nomeCliente($ver[2]);
							}
						 ?>
					</td>
					<td>
						<?php 
							echo $obj->obterTotal($ver[0]). " Mtn";
						 ?>
					</td>
					<td>
						<a href="../procedimentos/vendas/recibo.php?idvenda=<?php echo $ver[0] ?>" 
                        class="btn btn-danger btn-sm">
                        <!--../procedimentos/vendas/criarComprovantePdf.php-->
							Recibo <span class="glyphicon glyphicon-list-alt"></span>
						</a>
					</td>
					<!--
						<a href="../procedimentos/vendas/criarRelatorioPdf.php?idvenda=<?php echo $ver[0] ?>"
                         class="btn btn-danger btn-sm">
							Relatório <span class="glyphicon glyphicon-file"></span>
						</a>	
					</td  --->
				</tr>
		<?php endwhile; ?>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>