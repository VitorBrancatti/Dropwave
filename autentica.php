<?php
	$key = "Dropwave";

    $data=$_REQUEST;

    include_once("config.php");

    $conexao = pg_connect();

    extract($data);
	$email = $edtMail;
	//$senha = base64_encode($edtSenha . '::' . $key);
	$status = "A";
	$senha = $edtSenha;

	$resultado = "ERRO";
	
	$sql = "select usuCodigo, usuNome from usuario where usuMail = :mail and usuSenha = :senha and usuStatus = :status ";

    $comando = $conexao->prepare($sql);

    $comando->bindParam(':mail', $email);
	$comando->bindParam(':senha', $senha);
	$comando->bindParam(':status', $status);

    $comando->execute();

	if( $comando->rowCount() > 0)
	{
		$dados = $comando->fetch(PDO::FETCH_OBJ);
		
		$usuCodigo  = $dados->usucodigo;
		$usuNome 	= $dados->usunome;
		
		
		session_start();
		
		$_SESSION['logged_in'] = true;
		$_SESSION['usuCodigo'] = $usuCodigo;
		$_SESSION['usuNome']   = $usuNome;
		$_SESSION['TEMPO'] = time();
		
		header('location: .');
	}
	else
	{
		header('location: login_invalido.php');
	}
?>