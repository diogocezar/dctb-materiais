@echo off

makeindex -s tabela-siglas.ist -o propostaTd.sigla propostaTd.siglax
makeindex -s tabela-simbolos.ist -o propostaTd.romanlow propostaTd.romanlowx
makeindex -s tabela-simbolos.ist -o propostaTd.romanupp propostaTd.romanuppx
makeindex -s tabela-simbolos.ist -o propostaTd.greeklow propostaTd.greeklowx
makeindex -s tabela-simbolos.ist -o propostaTd.greeklow propostaTd.greeklowx
makeindex -s tabela-simbolos.ist -o propostaTd.greeklow propostaTd.greeklowx
makeindex -s tabela-simbolos.ist -o propostaTd.greeklow propostaTd.greeklowx
makeindex -s ist/makeglo.ist -o propostaTd.gls propostaTd.glo

pause
