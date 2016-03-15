#!/bin/bash
DROPBOX=/home/diogo/Dropbox/posJava/backup_aulas
DATE=`date +%Y-%m-%d_%H\.%M\.%S`
NAME=pos_java
DIR_NAME=/home/diogo/Desktop/aulasPos/
MAKE_DIR_NAME=$NAME'_'$DATE

clear
echo "-----------------------------------"
echo "| I N I C I A N D O   B A C K U P |"
echo "-----------------------------------"
echo ""

echo "Realizando backup do diretório: "
echo ../$MAKE_DIR_NAME
echo ""
mkdir ../$MAKE_DIR_NAME
cp -Rf $DIR_NAME/* ../$MAKE_DIR_NAME
rm -Rf ../$MAKE_DIR_NAME/pdf
rm -Rf ../$MAKE_DIR_NAME/images
rm -Rf ../$MAKE_DIR_NAME/arquivos
tar -zcf ../$MAKE_DIR_NAME.tar.gz ../$MAKE_DIR_NAME
rm -Rf ../$MAKE_DIR_NAME
mv ../$MAKE_DIR_NAME.tar.gz $DROPBOX

echo "---------"
echo "| F I M |"
echo "---------"
echo ""
