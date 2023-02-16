#!/bin/sh
sleep 30 && gunzip < database/$1.sql.gz | mysql -hdb -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE