<?php
session_start();

//Incluir a conexao com BD
include_once("conexao.php");

//Receber os dados do formulário
//$arquivo = $_FILES['arquivo'];
//var_dump($arquivo);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

//ler todo o arquivo para um array
$dados = file($arquivo_tmp);
//var_dump($dados);

foreach($dados as $linha){
	$linha = trim($linha);
	$valor = explode(';', $linha);
	var_dump($valor);
	
	$div_sigla = $valor[0];
	$div_nome = $valor[1];
	$qtd_pendentes = $valor[2];
	
	$result_usuario = "INSERT INTO doc_pendentes (div_sigla, div_nome, qtd_pendentes) VALUES ('$div_sigla', '$div_nome', '$qtd_pendentes')";
	
	$resultado_usuario = mysqli_query($conn, $result_usuario);	
}
$_SESSION['msg'] = "<p style='color: green;'>Carregado os dados com sucesso!</p>";
header("Location: index.php");



