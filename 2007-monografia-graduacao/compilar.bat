@echo off

makeindex -s tabela-siglas.ist -o monografia.sigla monografia.siglax
makeindex -s tabela-simbolos.ist -o monografia.romanlow monografia.romanlowx
makeindex -s tabela-simbolos.ist -o monografia.romanupp monografia.romanuppx
makeindex -s tabela-simbolos.ist -o monografia.greeklow monografia.greeklowx
makeindex -s tabela-simbolos.ist -o monografia.greeklow monografia.greeklowx
makeindex -s tabela-simbolos.ist -o monografia.greeklow monografia.greeklowx
makeindex -s tabela-simbolos.ist -o monografia.greeklow monografia.greeklowx
makeindex -s ist/makeglo.ist -o monografia.gls monografia.glo