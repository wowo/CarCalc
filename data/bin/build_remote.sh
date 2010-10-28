#!/bin/bash

# Build script used to build project on remote server via SSH
#
# PLEASE NOTE: you must have SSH keys in /var/keys (see keys variable), and public key must be added to 
# user specified in user variable on the remote server (specified in $host)
#
# Author: Wojciech Sznapka <wojciech.sznapka@xsolve.pl>
# Date: 2010-10-28

# remote host which will perform build
host="10.254.254.94"
# owner of a directory of installed host
user="wowo"
# private key, with which script will login to preview host
keys="/var/keys/xs33_id_rsa"
# path in remote host to the project
path="/home/wowo/localhost/CarCalc"
# output file report name (jUnit compilant)
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
