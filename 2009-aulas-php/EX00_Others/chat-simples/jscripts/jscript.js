/**
 * Função para setar o foco no campo de mensagem, ou login;
 */
function focoCampos(){
	var nome     = document.getElementById('nome');
	var mensagem = document.getElementById('mensagem');
	if(nome){
		nome.focus();	
	}
	if(mensagem){
		mensagem.focus();	
	}
}
/**
 * Função para enviar o formulário ao pressionar enter
 */
function enviaFormNoEnter(form, event){
	if(event == 13){
		call_inserirDados();
	}
}

/**
* Função que atualiza o chat de 5 em 5 segundos
*/
function atualizaChat(){
	call_recuperarDados();
	setTimeout("atualizaChat()", 5000);
}

/**
* call_inserirDados();
*/
function call_inserirDados(){
	var mensagem = document.getElementById('mensagem').value;
	x_inserirDados(url_encode(mensagem), return_inserirDados);
}

function return_inserirDados(retorno){
	call_recuperarDados();
	var mensagem = document.getElementById('mensagem');
	mensagem.value = "";
	mensagem.focus();
}

/**
* call_recuperarDados();
*/
function call_recuperarDados(){
	x_recuperarDados(return_recuperarDados);
}

function return_recuperarDados(retorno){
	var chat = document.getElementById('chat');
	chat.innerHTML = url_decode(retorno);
}