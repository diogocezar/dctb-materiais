	/* 
	 * As funções codifica/decodifica são utilizadas para trabalhar com ajax,
	 * pois o mesmo não aceita caracteres com acento, para isso essas funções
	 * são utlizadas
	 */
	
	/*
	 * Codifica string
	 */
	function url_encode(str) {  
		var hex_chars = "0123456789ABCDEF";  
		var noEncode = /^([a-zA-Z0-9\_\-\.])$/;  
		var n, strCode, hex1, hex2, strEncode = "";  
	
		for(n = 0; n < str.length; n++) {  
			if (noEncode.test(str.charAt(n))) {  
				strEncode += str.charAt(n);  
			} else {  
				strCode = str.charCodeAt(n);  
				hex1 = hex_chars.charAt(Math.floor(strCode / 16));  
				hex2 = hex_chars.charAt(strCode % 16);  
				strEncode += "%" + (hex1 + hex2);  
			}  
		}  
		return strEncode;  
	}  
	
	/*
	 * Decodifica string
	 */
	function url_decode(str) {
		var n, strCode, strDecode = "";  
	
		for (n = 0; n < str.length; n++) {  
			if (str.charAt(n) == "%") {  
				strCode = str.charAt(n + 1) + str.charAt(n + 2);  
				strDecode += String.fromCharCode(parseInt(strCode, 16));  
				n += 2;  
			} else {  
				strDecode += str.charAt(n);  
			}  
		}  
	
		return strDecode;  
	}
