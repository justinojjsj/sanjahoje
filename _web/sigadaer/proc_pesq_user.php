<?php
//Incluir a conexão com banco de dados
include_once 'conexao.php';

$div_sigla = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_NUMBER_INT);
$div_nome = filter_input(INPUT_POST, 'palavra');
// $celular = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_EMAIL);
// $idade = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_EMAIL);
// $CPF = filter_input(INPUT_POST, 'palavra');
// $estado_civil = filter_input(INPUT_POST, 'palavra');
// $email = filter_input(INPUT_POST, 'palavra');
// $work = filter_input(INPUT_POST, 'palavra');
// $gender = filter_input(INPUT_POST, 'palavra');
// $convenio = filter_input(INPUT_POST, 'palavra');
// $CEP = filter_input(INPUT_POST, 'palavra');
// $street = filter_input(INPUT_POST, 'palavra');
// $district = filter_input(INPUT_POST, 'palavra');
// $city = filter_input(INPUT_POST, 'palavra');
// $state = filter_input(INPUT_POST, 'palavra');

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM doc_pendentes WHERE div_sigla LIKE '%$div_sigla%' 
OR div_nome LIKE '%$div_nome%'";

$resultado_user = mysqli_query($conn, $result_user);

?>

<table class="table table-striped table-dark table-bg">
			<thead>
				<tr>
                <th scope="col">#</th>
                <th scope="col">Sigla</th>
                <th scope="col">Nome</th>
                <th scope="col">Documentos pendentes</th>
                <th scope="col">Edição manual</th>
                </tr>
			</thead>
			<tbody>

<?php

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)){

		
            echo "<tr>";
            echo "<td>".$row_user['id']."</td>";
            echo "<td>".$row_user['div_sigla']."</td>";
            echo "<td>".$row_user['div_nome']."</td>";
            echo "<td>".$row_user['qtd_pendentes']."</td>";
            
            echo 
            "<td> 
                <a class='btn btn-sm btn-primary' href='editar_usuario.php?id_pac=$row_user[div_sigla]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                    </svg>
                </a>

                <a class='btn btn-sm btn-danger' href='proc_apagar_usuario.php?id_pac=$row_user[div_sigla]' data-confirm='Tem certeza de que deseja excluir o usuário selecionado?'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                    </svg>
                </a>	
                
            </td>";

            echo "</tr>";
        }

        ?>
        </tdoby>
        </table>
        <?php
		
}else{
	echo "<div class='alert alert-danger' role='alert'>
				<strong>Nenhum</strong> Paciente Encontrado ...
				<input type='button' value='X' onClick='window.location.reload()' style='position: right; float:right !important; font-size:15px; cursor:pointer; background: none; border: 0px; color: #721c24;'>
			</div>";
}


?>



