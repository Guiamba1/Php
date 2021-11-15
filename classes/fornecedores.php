<?php 

class fornecedores{
	public function adicionar($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "INSERT into fornecedores (id_usuario, nome, apelido, endereco, email, telefone) 
		VALUES 
		 ('$dados[0]',
		 '$dados[1]', 
		   '$dados[2]',
		   '$dados[3]',
			'$dados[4]',
			'$dados[5]'
			)";



		return mysqli_query($conexao, $sql);
	}




	public function obterDados($id){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql = "SELECT id_fornecedor, nome, apelido, endereco, email, telefone from fornecedores where id_fornecedor='$id' ";

			$result = mysqli_query($conexao, $sql);
			$mostrar = mysqli_fetch_row($result);


			$dados = array(
				'id_fornecedor' => $mostrar[0],
				'nome' => $mostrar[1],
				'apelido' => $mostrar[2],
				'endereco' => $mostrar[3],
				'email' => $mostrar[4],
				'telefone' => $mostrar[5],
				
			);

			return $dados;

	}


	public function atualizar($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "UPDATE fornecedores 
		SET nome = '$dados[1]', apelido = '$dados[2]',endereco = '$dados[3]',email = '$dados[4]',telefone = '$dados[5]' where id_fornecedor = '$dados[0]'";

		
		echo mysqli_query($conexao, $sql);
	}


	public function excluir($id){
		$c = new conectar();
		$conexao=$c->conexao();
		

		$sql = "DELETE from fornecedores where id_fornecedor = '$id' ";

		return mysqli_query($conexao, $sql);
	}

}

?>