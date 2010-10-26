#!/bin/bash

host="10.254.254.94"
user="wowo"
keys="/var/keys/xs33_id_rsa"
path="/home/wowo/localhost/CarCalc"

echo ">> build     Connecting via ssh and running build.sh script"
ssh $user@$host -i $keys "cd $path && ./build.sh --xml=build.xml"

echo ">> build     Downloading build.xml"
scp -i $keys $user@$host:$path/build.xml .
