#!/bin/bash

# Ensure any old docker containers are removed/shut-down
echo "removing any previous docker containers"
docker-compose down --remove-orphans

if [ -d "./data" ]
then
  echo "removing any previous /data directory settings"
  rm -rf data;
  sleep 2;
else
  echo "No previous installation data found directory found"
fi

# Import new database from stable version
./import.sh wp_befstoredev-stable;

# Shut down import
docker-compose down

echo "Stable database installed"
