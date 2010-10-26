#!/bin/bash

echo ">> build     Connecting via ssh and running build.sh script"
ssh wowo@10.254.254.94 -i xs33_id_rsa "cd /home/wowo/localhost/CarCalc && ./build.sh --xml=build.xml"

echo ">> build     Downloading build.xml"
scp -i xs33_id_rsa  wowo@10.254.254.94:/home/wowo/localhost/CarCalc/build.xml .
