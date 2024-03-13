<?php
    session_start();
    include_once("conexao.php");


    if(filter_input(INPUT_GET, 'id_pac')){
        $id_pac = filter_input(INPUT_GET, 'id_pac', FILTER_SANITIZE_NUMBER_INT);
        $result_usuario = "SELECT * FROM dados_paciente WHERE id_pac = '$id_pac'";
    }elseif(filter_input(INPUT_POST, 'CPF')){
        $CPF = filter_input(INPUT_POST, 'CPF');
        $result_usuario = "SELECT * FROM dados_paciente WHERE CPF = '$CPF'";
    }

    //$id_pac = filter_input(INPUT_GET, 'id_pac', FILTER_SANITIZE_NUMBER_INT);
    //$result_usuario = "SELECT * FROM dados_paciente WHERE id_pac = '$id_pac'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<html>

    <head>
        <?php include "./header.php"; ?>
	</head>

<body>     

    <div class="top">
        </br>
    </div>

    <div class="middle">
        <div id="home-dashboard">

            <?php include "return-menu.php"; ?>

            <div id="information" class="form-group">
                </br>
                </br>
                </br>
                <p> Edição dos Dados Pessoais </p> 
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </div>
            
            </br>

            <form method="POST"	action="./proc_edit_usuario.php">

                <input type="hidden" name="id_pac" value="<?php echo $row_usuario['id_pac']; ?>">

                <div class="form-group">
                    <div class="question">
                        <p2>Nome completo</p2>
                    </div>

                    <div class="answer">
                        <input type="text" name="nome" placeholder="Seu nome" value="<?php echo $row_usuario['nome']; ?>"/>
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <div class="question">
                        <p2>Celular de contato</p2>
                    </div>

                    <div class="answer">
                        <input type="text" name="celular" placeholder="12 98102-6589" value="<?php echo $row_usuario['celular']; ?>" maxlength="14" onkeypress="formatar_mascara(this,'## #####-####')"/>
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <div class="question">
                        <p2>Data de nascimento</p2>
                    </div>

                    <div class="answer">
                        <input type="text" name="idade" placeholder="01/01/2001" value="<?php echo $row_usuario['idade']; ?>" maxlength="10" onkeypress="formatar_mascara(this,'##/##/####')"/>
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <div class="question">
                        <p2>CPF</p2>
                    </div>

                    <div class="answer">
                        <input type="text" name="CPF" placeholder="123.456.789-11" value="<?php echo $row_usuario['CPF']; ?>" maxlength="14" onkeypress="formatar_mascara(this,'###.###.###-##')"/>
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <div class="question">
                        <p2>Estado civil</p2>
                    </div>

                    <div class="answer">
                        <input type="text" name="estado_civil" placeholder="Exemplo: Solteiro(a)" value="<?php echo $row_usuario['estado_civil']; ?>"/>
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <div class="question">
                        <p2>E-mail</p2>
                    </div>

                    <div class="answer">
                        <input type="email" name="email" placeholder="email@provedor.com" value="<?php echo $row_usuario['email']; ?>"/>
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <div class="question">
                        <p2>Profissão</p2>
                    </div>

                    <div class="answer">
                        <input type="text" name="work" placeholder="Exemplo: Professor" value="<?php echo $row_usuario['work']; ?>"/>
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <div class="question">
                        <p2>Sexo</p2>
                    </div>

                    <div class="answer-radio">

                        <input type="radio" name="gender" id="gen-man" class="input-hidden" value="<?php echo $row_usuario['gender']; ?>"/>
                        <label for="gen-man">
                            <img src="../../images/man.png" alt="I'm man" />
                        </label>

                        <input type="radio" name="gender" id="gen-woman" class="input-hidden" value="<?php echo $row_usuario['gender']; ?>"/>
                        <label for="gen-woman">
                            <img src="../../images/woman.png" alt="I'm woman" />
                        </label>

                        <input type="radio" name="gender" id="gen-other" class="input-hidden" value="<?php echo $row_usuario['gender']; ?>"/>
                        <label for="gen-other">
                            <img src="../../images/other.png" alt="I'm other" />
                        </label>
                        
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <div class="question">
                        <p2>Convênio</p2>
                    </div>

                    <div class="answer">
                        <input type="text" name="convenio" placeholder="Particular" value="<?php echo $row_usuario['convenio']; ?>"/>
                    </div>
                </div>

                </br>

                <div class="form-address">
                    <div class="question">
                        <p2>Endereço</p2>
                    </div>

                    <div class="answer">
                        <input type="text" name="CEP" id="cep" placeholder="CEP" value="<?php echo $row_usuario['CEP']; ?>" onblur="pesquisacep(this.value);" />
                    </div>

                    <div class="answer">
                        <input type="text" name="ad_number" placeholder="Número da Casa ou Ap" value="<?php echo $row_usuario['ad_number']; ?>"/>
                    </div>

                    <div class="answer">
                        <input type="text" name="street" id="street" placeholder="Rua" value="<?php echo $row_usuario['street']; ?>"/>
                    </div>

                    <div class="answer">
                        <input type="text" name="district" id="district" placeholder="Bairro" value="<?php echo $row_usuario['district']; ?>"/>
                    </div>

                    <div class="answer">
                        <input type="text" name="city" id="city" placeholder="Cidade" value="<?php echo $row_usuario['city']; ?>"/>
                    </div>

                    <div class="answer">
                        <input type="text" name="state" id="state" placeholder="Estado" value="<?php echo $row_usuario['state']; ?>"/>
                    </div>

                </div>

                </br>

                <input type="submit" id="btn-cadastro" class="btn-home" style="color: white; font-weight:800;" value="Cadastrar" name="enviar"><p></p></input>

            </form>

        </div>
    </div>

    <div class="footer">
        </br>
    </div>   

</body>

</html>