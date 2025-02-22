<?php
	function pg_connect()
	{
		$host = "localhost";
		$db_name = "bancoex";
		$username = "postgres";
		$port = "5432";
		$password = "root";
		
		try
		{
			$PDO = new PDO("pgsql:host=$host; port=$port dbname=$db_name", $username, $password);
			$PDO->exec("set names utf8");
		}
		catch( PDOException $e)
		{

		}
		
		return $PDO;
	}

	function ConverteData($data)
	{
    	if (strstr($data, "/"))//verifica se tem a barra /
     	{
			$d = explode ("/", $data);//tira a barra
			$rstData = "$d[2]-$d[1]-$d[0]";//separa as datas $d[2] = ano $d[1] = mes etc...
			return $rstData;
     	} 
	 	elseif(strstr($data, "-"))
	 	{
			$d = explode ("-", $data);
			$rstData = "$d[2]/$d[1]/$d[0]"; 
			return $rstData;
     	}
		else
	 	{ 
			return "Data inválida";
     	}
    }
?>