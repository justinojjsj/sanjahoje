<html>
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
                        <img src="./file.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Condições Climáticas</h5>
                            <p class="card-text">Dados obtidos do Centro de Previsão de Tempo e Estudos Climáticos do Instituto Nacional de Pesquisas Espaciais (CPTEC/INPE) </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última atualização 3 mins atrás</small>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                        <img src="./file.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Alertas da Defesa Civil</h5>
                            <p class="card-text">Informações obtidas da Defesa Civil do Estado de São Paulo, referente ao CEP XX.XXX-XXX (Rua Tal, Bairro Tal, SJC-SP).</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="card h-100">
                        <img src="./file.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
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