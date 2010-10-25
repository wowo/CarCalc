#!/bin/bash

echo "Creating cache dir"
if [ -e "cache" ]
then
  echo "Cache dir already exists"
else
  mkdir cache
fi


echo "Creating log dir"
if [ -e "logs" ]
then
  echo "Logs dir already exists"
else
  mkdir logs
fi

./symfony project:permissions
./symfony test:unit
