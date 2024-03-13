<?php
	//session_start();
	error_reporting(0);
	include_once('conexao.php');
?>

<div id="tabela-dados">
	<table width='100%'>
		<tr>
			<td valign="top">
				<table class="table table-striped table-dark table-bg" style="border-radius: 0px !important;">
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">Sigla</th>
						<th scope="col">Nome</th>
						<th scope="col">Data</th>
						<th scope="col">Pendentes</th>	
						</tr>
					</thead>

					<tbody>
						<?php
							$sql = "SELECT historico_pendentes.div_sigla, doc_pendentes.div_nome, historico_pendentes.qtd_pendentes, historico_pendentes.data FROM historico_pendentes INNER JOIN doc_pendentes ON historico_pendentes.div_sigla=doc_pendentes.div_sigla  WHERE data='2024-02-19' ORDER BY qtd_pendentes DESC";
							$result = $conn->query($sql);
														
							$contador = 0;
							$cont = 0;

							while($tab_historico = mysqli_fetch_assoc($result)){

								$array[] = $tab_historico['div_sigla'];
								$contador++;

								echo "<tr>";
								echo "<td>".$contador."</td>";
								echo "<td>".$array[$cont++]."</td>";
								echo "<td style='border-right: 1px solid #fff;'>".substr($tab_historico['div_nome'], 0, 60)."</td>";										
								echo "<td>".$tab_historico['data']."</td>";			
								echo "<td>".$tab_historico['qtd_pendentes']."</td>";
								echo "</tr>";
							}
						
					echo "</tdoby>";
				echo "</table>";

			echo "</td>";
			echo "<td valign='top'>";
				echo "<table class='table table-striped table-secondary table-dark'>";
					echo "<thead>";
						echo "<tr>";
						//echo "<th scope='col'>Sigla</th>";
						echo "<th scope='col'>Data</th>";
						echo "<th scope='col'>Pendentes</th>";
						echo "</tr>";
					echo "</thead>";

					echo "<tbody>";
						
							$cont3 = 0;

							while($cont3 < 95){

								$hist_sigla = "SELECT * FROM historico_pendentes  WHERE data='2024-03-01' AND div_sigla='$array[$cont3]'";
								$resultado = mysqli_query($conn, $hist_sigla);
								$row_historico = mysqli_fetch_assoc($resultado); 

								echo "<tr>";		
								//echo "<td>".$array[$cont3++]."</td>";										
								echo "<td style='border-left: 1px solid #fff;'>".$row_historico['data']."</td>";									
								echo "<td>".$row_historico['qtd_pendentes']."</td>";   
								echo "</tr>";		
								$cont3++; //Se descomentar 		echo "<td>".$array[$cont3++]."</td>"; devo comentar o cont3					
							}

						?>
					</tdoby>
				</table>
			</td>
		</tr>
	</table>
</div>