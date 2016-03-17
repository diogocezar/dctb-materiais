/**
* Script que valida todos os campos de um form.
* Para habilitar a validação em um form, deve-se alterar
* a sua classe para: 'checkForm'.
* Dentro do formulário, os objQueryetos que tiverem como prefixo do id:
* 'frm_obg' -> Não podem ficar em branco;
* 'frm_ema' -> Se se não vazio, faz a validação de e-mail;
*/

var Validate = {
	
	error: false,
	
	msgErro: '',
	
	campoFocus:'',
	
	primeiroCheck: 0,

	init: function(){
		if(jQuery("#enviar")) jQuery("#enviar").click(Validate.validateFields);
		if(jQuery("#voltar")) jQuery("#voltar").click(Validate.voltar);
	},
	
	initAlerts: function(){
		Validate.msgErro = '';
		Validate.primeiroCheck = 0;
		Validate.campoFocus = '';
	},
	
	voltar: function(){
		history.go(-1);
	},
	
	msg: function(msg, campo){
		alert(msg);
		campo.focus();
		Validate.error = true;
	},
	
	msgEmptyField: function(campo){
		var nameCmp = campo.name.toUpperCase().replace("[]", "");
		Validate.msgErro += "O campo '" + nameCmp + "' está vazio. \n";
		if(Validate.primeiroCheck == 0){
			Validate.primeiroCheck++;
			Validate.campoFocus = campo;
		}
		campo.focus();
		Validate.error = true;
	},
	
	validateCombos: function(){
		if(jQuery("#frm_opt_fornecedor").attr("disabled") && jQuery("#frm_opt_cliente").attr("disabled") && jQuery("#frm_opt_agregado").attr("disabled")){
			alert('Selecione uma pessoa para cadastrar um contato.');
			Validate.error = true;
		}	
	},
	
	validateField: function(campo){
		if(campo.value == "" || campo.value == "NULL"){
			Validate.msgEmptyField(campo);
		}
	},
	
	validateFieldEmail: function(campo){
		if(campo.value != ""){
			if(campo.value.indexOf('@') == -1 || campo.value.indexOf('.') == -1){
				Validate.msg('O e-mail digitado não é valido.', campo);
			}
		}
	},
	
	validateFields: function(){
		 Validate.error = false;
		 var prefixoId;
		 jQuery(document).find("form").each(function(){
			 if(jQuery(this).attr("className") == "checkForm"){
				 jQuery(this).find("input, textarea, select").each(function(){
					if(jQuery(this).attr("type") != 'submit'){
						prefixoId = jQuery(this).attr("id").substring(0,7).toLowerCase();
						switch(prefixoId){
							case "frm_obg":
								Validate.validateField(this);	
							break;
							
							case "frm_ema":
								Validate.validateFieldEmail(this);	
							break;
							
							case "frm_lst":
								Acervos.selectAll();
								Validate.validateField(this);
							break;
						}
					}
				})
				Validate.validateCombos();
				if(!Validate.error){
					jQuery(this).submit();	
				}
				else{
					alert(Validate.msgErro);
					Validate.campoFocus.focus();
					Validate.initAlerts();
				}
			}
		})
	}
}

jQuery(document).ready(function(){
	Validate.init();
});