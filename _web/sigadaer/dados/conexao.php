<?php
	$servidor = "170.14.0.3:3306";
	$usuario = "root";
	$senha = "my-secret-pw";
	$dbname = "db_sigadaer";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);