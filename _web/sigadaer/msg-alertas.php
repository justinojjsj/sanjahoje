<div id="msg-alert-sucesso" class="alert alert-success" role="alert" style="display:none;">
    Edição realizada com sucesso!
</div>

<div id="msg-alert-erro" class="alert alert-danger" role="alert" style="display:none;">
    Edição não realizada!
</div>   

<div id="msg-alert-sucesso-apagar" class="alert alert-success" role="alert" style="display:none;">
    Apagado com sucesso!
</div>

<div id="msg-alert-erro-apagar" class="alert alert-danger" role="alert" style="display:none;">
    Não apagado!
</div>

<script>

    var secao = "<?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>" 

    var container_sucesso = document.querySelector('#msg-alert-sucesso');
    var container_erro = document.querySelector('#msg-alert-erro');

    var container_sucesso_apagar = document.querySelector('#msg-alert-sucesso-apagar');
    var container_erro_apagar = document.querySelector('#msg-alert-erro-apagar');

    function exibir(info){
        if(info == "sucesso"){
            container_sucesso.style.display = 'block';  
        }else if(info == "erro"){
            container_erro.style.display = 'block';  
        }else if(info == "sucesso_apagar"){
            container_sucesso_apagar.style.display = 'block';
        }else if(info == "erro_apagar"){
            container_erro_apagar.style.display = 'block';  
        }
    }

    function apagar(info){
        container_sucesso.style.display = 'none';
        container_erro.style.display = 'none';
        container_sucesso_apagar.style.display = 'none';
        container_sucesso_apagar.style.display = 'none';
    }

    exibir(secao);
    setTimeout(apagar, 2500);

</script>