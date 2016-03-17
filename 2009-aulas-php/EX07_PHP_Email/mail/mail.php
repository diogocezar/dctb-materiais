<?php
$destinatario = "ze@criarweb.com";
$assunto      = "Esta mensagem é um teste";
$corpo = '
<html>
<head>
   <title>Teste de correio</title>
</head>
<body>
<h1>Olá amigos!</h1>
<p>
<b>Bem-vindos ao meu correio electrónico de teste</b>. 
</p>
</body>
</html>';

//para o envio em formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html;
charset=iso-8859-1\r\n";

//endereço do remitente
$headers .= "From: Xuxé <xuxe@criarweb.com>\r\n";

//endereço de resposta, se queremos que seja diferente a do remitente
$headers .= "Reply-To: mariano@desarrolloweb.com\r\n";

//endereços que receberão uma copia 
$headers .= "Cc: manel@desarrolloweb.com\r\n";
//endereços que receberão uma copia oculta
$headers .= "Bcc: vinnie@criarweb.com,joao@criarweb.com\r\n";

mail($destinatario,$assunto,$corpo,$headers)
?>
