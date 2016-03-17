var Busca = {
	
	nomeBusca: '',
	
	init: function(){
		Busca.hideLoading();
		Busca.hideResultado();
		$('#buscar').keyup(Busca.goBusca);	
	},
	
	goBusca: function(){
		Busca.nomeBusca = $('#buscar').attr('value');
		$('#loading').ajaxStart(Busca.startAjax);
		$('#loading').ajaxStop(Busca.stopAjax);
		$.post('busca/busca.php', 
			   
			   {nome:Busca.nomeBusca},
			   
			   function(data){
			      $("#resultado").empty().html(data);  
			   }
		);
	},
	
	startAjax: function(){
		Busca.showLoading();
		Busca.hideResultado();
	},
	
	stopAjax: function(){
		Busca.hideLoading();
		Busca.showResultado();
	},
	
	showLoading: function(){
		$('#loading').show();
	},
	
	hideLoading: function(){
		$('#loading').hide();
	},
	
	showResultado: function(){
		$('#resultado').show();
	},
	
	hideResultado: function(){
		$('#resultado').hide();
	}
}

$(document).ready(function(){
	Busca.init();
});