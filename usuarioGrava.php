<?php
	include_once("verifica.php");

	$key = "PortalZ";

    $data = $_REQUEST;

    include_once("config.php");

    $conexao = pg_connect();

    extract($data);
	$senha = base64_encode($edtSenha . '::' . $key);
	
	$resultado = "ERRO";	
	
	if( $op == "A")
	{
		$sql = "update usuario set usuMail = :mail, usuNome = :nome,
				usuStatus = :status, usuTipo = :tipo  
				where usuCodigo = :codigo ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':codigo', 		$edtCodigo);
		$comando->bindParam(':mail', 		$edtMail);
		$comando->bindParam(':nome', 		$edtNome);
		$comando->bindParam(':status', 		$edtStatus);
		$comando->bindParam(':tipo', 		$edtTipo);

		$comando->execute();
	}
	else
	{
		$sql = "insert into usuario ( usuMail, usuSenha, usuNome, usuStatus, usuTipo )
				values( :mail, :senha, :nome, :status, :tipo ) ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':mail', 		$edtMail);
		$comando->bindParam(':senha', 		$senha);
		$comando->bindParam(':nome', 		$edtNome);
		$comando->bindParam(':status', 		$edtStatus);
		$comando->bindParam(':tipo', 		$edtTipo);


		$comando->execute();
	}

	header('location: usuario.php');
?>