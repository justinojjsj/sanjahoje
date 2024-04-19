<html>
    <!-- 
        AJUSTAR HORA DO PHP

        php --ini
        cd /usr/local/etc/php/
        cp php.ini-development php.ini
        nano php.ini
        #procurar Date
        #habilitar
        date.timezone = America/Sao_Paulo
    -->
    <head>
        <?php include "./header.php"; ?>
    </head>

    <body onload="moveRelogio()">
        <div class="top">

            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <h5 class="text-white h4">Sanja Hoje</h5>
                    <span class="text-muted">Sistema de Micro Serviços de Mobilidade para São José dos Campos - Projeto Integrador III - UNIVESP</span>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>
            </nav>

        </div>

        <div class="container">

            <br>    
            
            <div class="alert alert-info text-center rounded-pill" role="alert">
                <h2>
                São José dos Campos - SP
                </h2>
            </div>
            <div id='telaSmart'>
                <div id='relogioSmart'>                    
                    <span id='hSmart'></span><span class='doisPontos'>:</span><span id='mSmart'></span><span class='doisPontos'>:</span><span id='sSmart'></span>
                </div>
                <div id='dataSmart'>
                    <span id='semana'></span>
                    <span id='data'></span>
                </div>                       
            </div>

            <br>

                <div class="row row-cols-1 row-cols-md-3 g-4 ">

                    <div class="col">
                        <div class="card h-100">

                            <div class="card-body">
                                <?php
                                    include_once('conexao_inpe.php');

                                    $consulta = "SELECT * FROM dados ORDER BY id DESC LIMIT 1";
                                    $resultado = mysqli_query($conn, $consulta);
                                    $dados = mysqli_fetch_assoc($resultado); 
                                                                                            
                                    echo "Probabilidade de chuva de manhã: ".$dados['chuva_manha'];	
                                    echo "<br>";										
                                    echo "Probabilidade de chuva a tarde: ".$dados['chuva_tarde'];
                                    echo "<br>";									
                                    echo "Probabilidade de chuva a noite: ".$dados['chuva_noite'];
                                    echo "<br>";										
                                    echo "Temperatura máxima: ".$dados['temp_max'];
                                    echo "<br>";										
                                    echo "Temperatura mínima: ".$dados['temp_min'];
                                    echo "<br>";										
                                    echo "Índice UV: ".$dados['ind_uv'];
                                    echo "<br>";										
                                    echo "Nascer do Sol: ".$dados['amanhecer'];
                                    echo "<br>";										
                                    echo "Pôr do Sol: ".$dados['entardecer'];
                                ?>
                            </div>

                            <div class="card-footer"  style="height: 10rem;">
                                <h5 class="card-title">Condições Climáticas</h5>
                                <p class="card-text">Dados obtidos do Centro de Previsão de Tempo e Estudos Climáticos do Instituto Nacional de Pesquisas Espaciais (CPTEC/INPE) </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Última atualização: <?php echo $dados['hora_coleta']; ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body"> 
                            <?php
                                include_once('conexao_noticias.php');

                                $data = date('Y-m-d');
                                // echo $data;

                                // $consulta = "SELECT * FROM dados WHERE data_coleta='$data' ORDER BY id ASC";
                                // $resultado = mysqli_query($conn, $consulta);
                                // $dados = mysqli_fetch_assoc($resultado);                                                                                             
                                                
                                // echo "<a href=".$dados['url'].">".$dados['titulo']."</a> - ".$dados['tempo'];
                                // echo "<br><br>";		
                                
                                $sql = "SELECT * FROM dados WHERE data_coleta='$data' ORDER BY id DESC LIMIT 4";
                                $result = $conn->query($sql);

                                while($dados = mysqli_fetch_assoc($result)){
                                    echo "<a href=".$dados['url'].">".$dados['titulo']."</a> - ".$dados['tempo'];
                                    echo "<br><br>";		
                                                           
                                }        
                                
                            ?>
                            </div>
                            
                            <div class="card-footer" style="height: 10rem;">
                                <h5 class="card-title">Últimas notícias do G1</h5>
                                <p class="card-text">Notícias de São José dos Campos coletadas no portal do G1</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Última atualização: 
                                    <?php 
                                        $consulta = "SELECT * FROM dados ORDER BY id DESC LIMIT 1";
                                        $resultado = mysqli_query($conn, $consulta);
                                        $dados = mysqli_fetch_assoc($resultado);                                         
                                        echo $dados['hora_coleta'];                                  
                                    ?>                            
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body"> 
                                    <img src="./file.jpg" class="card-img-top" alt="...">   
                                </div>
                            <div class="card-footer" style="height: 10rem;">
                                <h5 class="card-title">Condições de Tráfego na Via Dutra</h5>
                                <p class="card-text">Dados Obtidos da Concessionáio CCR-RIOSP, referente ao trecho de São José dos Campos, Km XXX ao KM XXX.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                </div>   
            
        </div>
        <div class="footer">
            </br>
        </div>
        <script src="datahora.js"></script>
    </body>
</html>