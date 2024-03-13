<?php include "./header.php"; ?>


<div class="conteudo">

    <hr style="margin-top: 15px;">

    <ul class="resultado">

    </ul>

    <!--
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="./js/personalizado.js"></script>
    -->

</div>

<?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>