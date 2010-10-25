#!/bin/bash

echo ">> build     Creating cache dir"

if [ -e "cache" ]
then
  echo ">> build     Cache dir already exists"
else
  mkdir cache
fi


echo ">> build     Creating log dir"
if [ -e "logs" ]
then
  echo ">> build     Logs dir already exists"
else
  mkdir logs
fi

echo ">> build     Fixing project permissions" 
./symfony project:permissions
echo ">> build     Clearing cache" 
./symfony cc
echo ">> build     Running all tests" 
./symfony test:all -t --xml="build.xml"
