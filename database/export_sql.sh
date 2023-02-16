#!/bin/sh
sleep 30 && mysqldump --no-tablespaces -hdb -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE | gzip > database/$1-$2.sql.gz