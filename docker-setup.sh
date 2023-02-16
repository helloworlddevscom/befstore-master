#!/bin/bash

# Ensure any old docker containers are removed/shut-down
echo "removing any previous docker containers"
docker-compose down --remove-orphans

if [ -d "./wp" ]
then
  echo "removing any previous /wp directory settings"
  rm -rf wp; rm -rf wp-content/vendor;
  sleep 2;
else
  echo "No previous installation (wp and vendor) found directory found"
fi

if [ -d "./node_modules" ]
then
  echo "removing any previous node_modules directory"
  rm -rf node_modules;
  sleep 2;
else
  echo "No previous installation (node_modules) found directory found"
fi

echo "building new docker images"
docker-compose build

echo "installing composer dependencies"
docker-compose run --rm php php composer.phar update

echo "for stable database,  run: ./docker-database-setup.sh"
echo "for standard setup,   run:   docker-compose up";
echo "for javascript setup, run:   docker-compose -f docker-compose.yml -f docker-compose.testing.yml up";