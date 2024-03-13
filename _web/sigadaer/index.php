<html>
	<head>

		<?php include "./header.php"; ?>

		<style>
			h1{
				color: #ffffff;
				font-family: 'Bradley Hand', cursive;
				font-size: 50px;
			}

			.table-bg{
				background: rgba(0,0,0,0.7);
				border-radius: 15px 15px 0 0;
			}
        </style>

        <script>
            //Apresenta a pesquisa dinamicamente a medida que digita. No personalizado.js está o script que apaga a pagina corrente

            $(document).ready(function(){    
                
                $("#pesquisa").keyup(function(){
                    $("#home-editar").load('home-pesquisar.php');
                });
            });
            
        </script>
        
	</head>

	<body>
            <?php include "./msg-alertas.php"; ?>       

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                <a class="navbar-brand" href="#">Documentos pendentes no SIGADAER</a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a href="../index.php" style="text-decoration:none; color:white;"><button type="button" class="btn btn-info" style='width:150px;'>Página inicial</button></a>
                        </li>
 
                    </ul>
                    -->

                    <!--
                    <form class="form-inline my-2 my-lg-0">
                            
                            <form method="POST" id="form-pesquisa" action="">
                                <p style="font-size:18px; color:white;">Pesquisa:</p>
                                <div class="form-row">
                                    <div class="col-6">
                                        <input style="font-size:12px; color:black; width: 600px; margin-left:10px;" type="search" name="pesquisa" id="pesquisa" class="form-control mr-sm-2" placeholder="Sigla ou Nome">
                                    </div>
                                </div>
                            </form>
                    </form>
                    -->
                </div>
            </nav>

            <div id="home-editar">

                <ul class="resultado">

                </ul>

                <?php include "./home-padrao.php"; ?>

                
                <?php
                /*

                    //session_start();
                    include_once('conexao.php');

                    $anamnese = "SELECT * FROM dados_anamnese";
                    $resultado_anamnese = mysqli_query($conn, $anamnese);
                    
                    while($row_anamnese = mysqli_fetch_assoc($resultado_anamnese)){
                        $dados = "SELECT * FROM dados_paciente WHERE CPF=$row_anamnese[CPF]";
                        $resultado_dados = mysqli_query($conn, $dados);
                        $row_dados = mysqli_fetch_assoc($resultado_dados);

                        if($row_anamnese['CPF'] != $row_dados['CPF']){
                            //echo $row_anamnese['CPF'];
                            //echo ' ';
                        ?>
                            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e25353;">
                                <a class="navbar-brand">ANAMNESE SEM DADOS PESSOAIS CADASTRADOS</a>    
                            </nav>
                        
                        <?php
                            include "./home-padrao-anamnese.php";

                        }else{
                            //echo $row_anamnese['CPF'];
                        }
                    }   
                */ 
                ?>

            </div> 
	</body>

</html>