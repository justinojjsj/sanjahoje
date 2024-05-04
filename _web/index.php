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
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="180">
        <title>Sanja Hoje</title>
        <link rel="icon" type="image/png" href="./img/favicon.ico"/>
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

                                    echo "<div id='chuva' class='inpe-titulo'>";             
                                        echo "Chuva";   
                                        echo "<br>";	   
                                        echo "<div class='inpe'>";                  
                                            if ($dados['chuva_manha']!='Sem dados'){
                                                echo "<div id='chuva-manha' class='inpe'>";
                                                    echo "Manhã: ".$dados['chuva_manha'];  
                                                    echo "<div id='gota' class='inpe'></div>";                                                
                                                echo "</div>";                                  									
                                            }                                    
                                            echo "<div id='chuva-tarde' class='inpe'>";
                                                echo "Tarde: ".$dados['chuva_tarde'];        
                                                echo "<div id='gota' class='inpe'></div>";                                                
                                            echo "</div>";        
                                            echo "<div id='chuva-noite' class='inpe'>";
                                                echo "Noite: ".$dados['chuva_noite'];
                                                echo "<div id='gota' class='inpe'></div>";                                                
                                            echo "</div>";        
                                            echo "<br>";	                                    
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div id='temperatura' class='inpe-titulo'>";                                        
                                        echo "Temperatura";
                                        echo "<br>";	
                                        echo "<div class='inpe'>";
                                            echo "<div id='temperatura-min' class='inpe'>";
                                                echo "Mínima: ".$dados['temp_min'];
                                            echo "</div>";
                                            echo "<div id='temperatura-max' class='inpe'>";
                                                echo "Máxima: ".$dados['temp_max'];                                        							
                                            echo "</div>";
                                            echo "<br>";	
                                        echo "</div>";	
                                    echo "</div>";								
                                    echo "<div id='induv' class='inpe'>";
                                        echo "Índice UV: ".$dados['ind_uv'];
                                        echo "<br>";								
                                    echo "</div>";										
                                    echo "<div id='sol' class='inpe'>";
                                        echo "<div id='sol-nascer' class='inpe'>";
                                            echo "Nascer do Sol";
                                            echo "<br>";	
                                            echo $dados['amanhecer'];
                                        echo "</div>";	
                                        echo "<div id='sol-por' class='inpe'>";
                                            echo "Pôr do Sol";
                                            echo "<br>";	
                                            echo $dados['entardecer'];
                                        echo "</div>";									
                                    echo "</div>";										
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
                                    <img src="./img/file.jpg" class="card-img-top" alt="...">   
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