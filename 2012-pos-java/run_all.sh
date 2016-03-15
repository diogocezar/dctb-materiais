#!/bin/bash
./run.sh
./pdflatex.sh
./clear.sh
mv *.pdf ./pdf
./backup_all.sh
