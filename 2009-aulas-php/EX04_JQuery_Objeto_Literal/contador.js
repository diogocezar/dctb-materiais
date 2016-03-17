var Contador = {
	num: 0,
	
	init: function(){
		Contador.atualiza();
		$("#aumenta").click(Contador.aumenta);
		$("#diminui").click(Contador.diminui);
	},
	
	atualiza: function(){
		$("#numero").val(Contador.num);	
	},
	
	aumenta: function(){
		Contador.num++;
		Contador.atualiza();
	},
	
	diminui: function(){
		Contador.num--;
		Contador.atualiza();
	}
}

$(document).ready(function(){
	Contador.init();
});