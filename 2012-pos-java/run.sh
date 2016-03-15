#!/bin/bash
./pdflatex.sh
./clear.sh
mv *.pdf ./pdf
./backup.sh
