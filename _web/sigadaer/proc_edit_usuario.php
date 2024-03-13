<?php
session_start();
include_once("conexao.php");

$id_pac = filter_input(INPUT_POST, 'id_pac', FILTER_SANITIZE_NUMBER_INT);
//$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome');
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_EMAIL);
$CPF = filter_input(INPUT_POST, 'CPF');
$estado_civil = filter_input(INPUT_POST, 'estado_civil');
$email = filter_input(INPUT_POST, 'email');
$work = filter_input(INPUT_POST, 'work');
$gender = filter_input(INPUT_POST, 'gender');
$convenio = filter_input(INPUT_POST, 'convenio');
$CEP = filter_input(INPUT_POST, 'CEP');
$ad_number = filter_input(INPUT_POST, 'ad_number');
$street = filter_input(INPUT_POST, 'street');
$district = filter_input(INPUT_POST, 'district');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');

//echo "Id: $id_pac <br>";
//echo "Nome: $nome <br>";
//echo "Celular: $celular <br>";
//echo "Idade: $idade <br>";

$dado_consulta = "UPDATE events SET title='$nome' WHERE color='$CPF'";
$exec_dado_consulta = mysqli_query($conn, $dado_consulta);

$result_usuario = "UPDATE dados_paciente SET nome='$nome', celular='$celular', idade='$idade', CPF='$CPF', estado_civil='$estado_civil', email='$email', work='$work', gender='$gender', convenio='$convenio', CEP='$CEP', ad_number='$ad_number', street='$street', district='$district', city='$city', state='$state', modificado=NOW() WHERE id_pac='$id_pac'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "sucesso";
	header("Location: index.php");		
}else{
	$_SESSION['msg'] = "erro";
	header("Location: index.php");
	//header("Location: editar_usuario.php?id_pac=$id_pac");
}
?>