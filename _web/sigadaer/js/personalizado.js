$(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
	});
});

$(function(){
	
	$("#pesquisa").keyup(function(){

		
		
			//Recuperar o valor do campo
			var pesquisa = $(this).val();

			setTimeout(function(){
			
			//Verificar se há algo digitado
			if(pesquisa != ''){
				var dados = {
					palavra : pesquisa
				}
				$.post('proc_pesq_user.php', dados, function(retorna){
					//Mostra dentro da ul os resultado obtidos 
					$(".resultado").html(retorna);
				});
			}else{
				//Com a barra de pesquisa vazia ele carrega a pagina padrao com todos os usuários
				$("#home-editar").load('home-padrao.php');
			}

		}, 500);

	});	
});