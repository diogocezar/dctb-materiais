var Gerenciar = {
	
	digitado: '',
	
	campo: '',
	
	tabela: '',
	
	init: function(){
		Gerenciar.tabela = tabela;
		Gerenciar.hideLoading();
		Gerenciar.hideResultado();
		$('#gerenciar').keyup(Gerenciar.goGerenciar);
	},

	teste: function(parm){
		alert(parm);
	},
	
	goGerenciar: function(){
		Gerenciar.digitado = $('#gerenciar').attr('value');
		Gerenciar.campo    = $('#campo').attr('value');
		$('#loading').ajaxStart(Gerenciar.startAjax);
		$('#loading').ajaxStop(Gerenciar.stopAjax);
		$.post('./gerenciar/gerenciar.php', 
			   
			   {digitado:Gerenciar.digitado,
			    campo:Gerenciar.campo,
				tabela:Gerenciar.tabela},
			   
			   function(data){
			      $("#resultado").empty().html(data);  
			   }
		);
	},
	
	startAjax: function(){
		Gerenciar.showLoading();
		Gerenciar.hideResultado();
	},
	
	stopAjax: function(){
		Gerenciar.hideLoading();
		Gerenciar.showResultado();
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
	Gerenciar.init();
});