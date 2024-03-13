<?php
	session_start();
	include_once("conexao.php");
	//$id_pac = filter_input(INPUT_GET, 'id_pac', FILTER_SANITIZE_NUMBER_INT);
	$CPF = filter_input(INPUT_GET, 'CPF', FILTER_SANITIZE_NUMBER_INT);
	if(!empty($CPF)){
		$result_usuario = "DELETE FROM dados_paciente WHERE CPF='$CPF'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);

		$apaga_no_events = "DELETE FROM events WHERE color='$CPF'";
		$executa_apaga_no_events = mysqli_query($conn, $apaga_no_events);

		$apaga_no_anamnese = "DELETE FROM dados_anamnese WHERE CPF='$CPF'";
		$executa_apaga_no_anamnese = mysqli_query($conn, $apaga_no_anamnese);

		if(mysqli_affected_rows($conn)){
			$_SESSION['msg'] = "sucesso_apagar";
			header("Location: index.php");
		}else{
			$_SESSION['msg'] = "erro_apagar";
			header("Location: index.php");
		}
	}else{	
		$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário!</p>";
		header("Location: index.php");
	}
?>