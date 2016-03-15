#!/bin/bash
echo "---------------------------------------------------------------------"
echo "| I N I C I A N D O   C O M P I L A C A O   D O S   A R Q U I V O S |"
echo "---------------------------------------------------------------------"
echo ""
pdflatex S21_Projeto_FInal.tex
pdflatex S20_Consideracoes_Finais.tex
pdflatex S19_JSP_Mini_Sistema.tex
pdflatex S18_JSP_Ajax.tex
pdflatex S17_JSP_BD_Hibernate.tex
pdflatex S16_JSP_BD_JDBC.tex
pdflatex S15_JSP_JSTL.tex
pdflatex S14_JSP_Envio_Arquivos.tex
pdflatex S13_JSP_Cookies.tex
pdflatex S12_JSP_Sessoes.tex
pdflatex S11_JSP_Bean.tex
pdflatex S10_JSP_Introducao.tex
pdflatex S09_Servlets.tex
pdflatex S08_JS_Objeto_Literal.tex
pdflatex S07_jQuery.tex
pdflatex S06_Javascript.tex
pdflatex S05_Tableless.tex
pdflatex S04_CSS_02.tex
pdflatex S04_CSS_01.tex
pdflatex S03_XHTML_03.tex
pdflatex S03_XHTML_02.tex
pdflatex S03_XHTML_01.tex
pdflatex S02_HTTP_HTML_Basico.tex
pdflatex S01_HTML5.tex
pdflatex S00_Apresentacao.tex

mv *.pdf ./pdf
echo "---------"
echo "| F I M |"
echo "---------"
echo ""
