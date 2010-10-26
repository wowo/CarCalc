#!/bin/bash

host="10.254.254.94"
user="wowo"
keys="/var/keys/xs33_id_rsa"
path="/home/wowo/localhost/CarCalc"
file="build.xml"

echo ">> build     Removing existing $file file"
if [ -e "$file" ]
then
  rm  $file
fi

echo ">> build     Connecting via ssh and running build.sh script"
ssh $user@$host -i $keys "cd $path && ./build.sh --xml=$file"

echo ">> build     Downloading $file"
scp -i $keys $user@$host:$path/$file .
