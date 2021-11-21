<?php 

class conectar{
	private $servidor = "mysql000.umbler.com";
	private $usuario = "oscar";
	private $senha = "guiamba22";
	private $bd = "phpoo";

	public function conexao(){
		$conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->bd);

		return $conexao;
	}
}

 ?>