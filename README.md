# Purpose

This site is for the BEF calculator and store.  

# Requirements
- PHP 7.4+
- Composer - https://getcomposer.org/
- MySQL 5.7
- NGNIX

# Project branch strategy
    master                           :: Push automatically deploys to dev env. 
    BC-ticket-number-description     :: Feature branch corresponding to a Jira ticket.   If you want to create a PR for your work on Github, create a feature branch.


### Prerequisites

#### Docker
- https://www.docker.com/get-started

#### Docker Compose
- https://docs.docker.com/compose/install/

# Environment Setup (1)
All commands from root (`befstore/`) directory unless otherwise state.  
All terminal commands begin with `$`

This project uses a central environment variables file `.env` to store all secret information.

**1.1**
Copy over default environment file `.env.example` to `.env.development` 
 
 ```
 $ cp .env.example .env.development
 ```
 
This project setup will import a .sql db into the docker container.   As a result, there aren't any unique MYSQL 
for this dev setup and can be anything.

**1.2**   Update mysql ENV's in your `.env.development` 
```
MYSQL_USER=
MYSQL_PASSWORD=
MYSQL_DATABASE=
```

Example:
```
MYSQL_USER=befstoredev
MYSQL_PASSWORD=<INSERT A SECURE PASSWORD HERE>
MYSQL_DATABASE=wp_befstoredev
```
**1.3** Generate Salt keys for WP.
https://roots.io/salts.html

NOTE:  Simply copy-paste all the ENV Format results in your `.env.development` .    
These are only needed as placeholders, so it's fine to use randomly 
generated ones for your local setup. 

ALL env's in `.env.development` should have entries.   
NOTE:  DB_USER=${MYSQL_USER} syntax is for a local reference.   So these ENV's need to be the same, 
but you only need to enter it once.   

**1.4**
Generate SSL certificate for localhost use.   Just cut-paste this line!

```
$ openssl req -config docker/nginx/openssl.cnf -new -sha256 -newkey rsa:2048 -nodes -keyout nginx-selfsigned-befstore.key -x509 -days 825 -out nginx-selfsigned-befstore.crt
```


# Build docker images (2)

**2.1**
Launch setup command
```
$ ./docker-setup.sh
```

**2.2**
Setup latest stable database, run:

```
$ ./docker-database-setup.sh
```

# Launch Docker (3)

**3.1**
To launch wordpress and webpack build for javascript and testing
```
$ docker-compose -f docker-compose.yml -f docker-compose.testing.yml up;
```

Site is available at:

```
https://befstore.localhost
```

WP admin available at:
```
https://befstore.localhost/wp-login.php
```

In another terminal window you can run this to check on your server status:

```
$ docker ps
```
You should see something like this:  4 containers.

```
CONTAINER ID   IMAGE           COMMAND                  CREATED          STATUS          PORTS                                                              NAMES
6f58512c9348   nginx:latest    "/docker-entrypoint.…"   28 seconds ago   Up 27 seconds   0.0.0.0:80->80/tcp, 0.0.0.0:443->443/tcp, 0.0.0.0:8090->8090/tcp   befstore-web
e4aa7acd5dbf   befstore_php    "docker-php-entrypoi…"   29 seconds ago   Up 28 seconds   9000/tcp                                                           befstore-php
1e73930c5198   befstore_node   "docker-entrypoint.s…"   29 seconds ago   Up 29 seconds                                                                      befstore-node
8d6d8e232e3d   mysql:5.7       "docker-entrypoint.s…"   29 seconds ago   Up 29 seconds   33060/tcp, 0.0.0.0:4306->3306/tcp                                  befstore-db
```

# Stopping the stack
In the directory you started the stack in, run the following:

```
$ docker-compose down
```

# PR's and development:

This environment is self-contained with the wordpress database.   

When creating a PR, also export a copy of the database (as configuration may exist)


### Export database for PR

Database dump located in the `database` folder must be imported into local db.

Scenario #1 (most common).   If you have data you want to merge in from a PR (not WIP/QA), use the `stable` tag

```
$ ./export.sh wp_befstoredev stable
```

This will overwrite your local database to `wp_befstoredev-stable.sql.gz`    This it the "root" directory used in the import script

Scenario #2 (QA/midway through for review).   If you want to create a temporary version of your database, 
you can use any term as the second field.   For example, the ticket number.  

```
$ ./export.sh wp_befstoredev <TICKET>
```

example:
```
$ ./export.sh wp_befstoredev BC-12
```

This will create a database dump of your current DB in the database directory with the <TICKET> tag.

For example `wp_befstoredev-BC-12.sql.gz`   

---
To zip a .slq file:   

```
$ gzip *.sql
```

To unzip a file:

```
$ gunzip *.sql.gz
```

## Debugging local setup 
to manually build each stage as needed

```
$ docker-compose build --no-cache
```

Composer Install:   Install app dependencies

```
$ docker-compose run php php composer.phar install
```

To completely remove all the installed elements and start over again (the nuclear option)

Remove all generated directories
```
$ rm -rf data; rm -rf wp; rm -rf wp-content/vendor
```
Remove all stop docker containers.   NOTE, this will remove ALL docker containers, possibly 
impacting other project containers.   Use with caution!
```
$ docker rm $(docker ps -a -f status=exited -q)
```

### Import database 
(If needed for specific database... not "stable")

Database dump located in the `database` folder must be imported into local db.
File must be in format .sql.gz. 

In order to properly import a database the import command requires you _do not_ use the file extension `.sql.gz`. The import script will handle adding the extension for you.

```
$ ./import.sh <DB FILE NAME>
```

Example: If your file name is `wp_befstoredev-10132020_BC-12-business-calculator.sql.gz` then you'd run the following command: 
```
$ ./import.sh wp_befstoredev-10132020_BC-12-business-calculator
``` 

## XDEBUG 

###PhpStorm:
Set xdebug port:
- Preferences -> Languages & Frameworks -> PHP -> Debug | Xdebug: Debug port = `9010`
    * (NOTE: There does not seem to be consistency in port selection here, but you need to use 9010… or you need to change the DockerFile (php)

Create Server for xdebug:
- Preferences -> Languages & Frameworks -> PHP -> Servers
    * (Click +)
    * Name:  `PHPSERVERDOCKER`
    * Host:  `befstore.localhost`
    * Port: `80`
    * Select (User path mapping)
    * Under "project files", add (using the pencil) to "absolute plath on the server":  `/code`

Setup Run/Debug Configuration:
- (In tool bar, on the left of where you click the phone to “Listen for PHP debug connection”, on drop-down menu select “Edit Configurations…"
    * (Click +)
    * Select `“Remote PHP Debug"`
    * Name:  `docker`
    * Select:  Flight debug connection by IDE key
        * Server:  `PHPSERVERDOCKER`
        * IDE Key: `PHPSTORM`

Enable docker support from CLI
https://www.jetbrains.com/help/phpstorm/docker.html

## Testing Setup
All Javascript calculator code is generated in a node container.
To include this container in your setup, run:
```
$ docker-compose -f docker-compose.yml -f docker-compose.testing.yml up
```

Calculator javascript testing is done using jest.   After launching a normal docker setup, in a new 
terminal window, run: 
```
$ docker-compose -f docker-compose.testing.yml run node npm run test
```

To run and leave open (so that any JS updates will trigger all tests to be re-run)
```
$ docker-compose -f docker-compose.testing.yml run node npm run test:watch
```

This will launch a jest in watch/poll mode.   Then any javascript changes to the calculator code
will also fire all available jest test to be run automatically


### Docker/Setup details

The server must be set up to point to the `public` folder. A brief into on the current setup on the folder structure can be found here: 

- https://composer.rarst.net/recipe/site-stack/#wordpress-configuration
- https://wordpress.org/support/article/giving-wordpress-its-own-directory/
- https://wordpress.org/support/article/editing-wp-config-php
- https://wordpress.org/support/article/create-a-network

# Development for wordpress specific plugins NOT installed via wpengine
Current theme set up to work with is located in the `wp-content/themes/twentytwenty-child-minimize` folder. It inherits from the `twentytwenty` theme.

- https://developer.wordpress.org/themes/advanced-topics/child-themes/

NOTE:  For this project, we are only using wpackagist for WP core and Theme updates

To install a supported new plugin, find the package on wordpress https://wordpress.org/

```
https://wordpress.org/plugins/<PLUGIN NAME>/
```
`(ie, https://wordpress.org/plugins/advanced-custom-fields/ for advance-custom-fields)`

Verify the package exists on wpackagist in the search (ie: advance-custom-fields )

https://wpackagist.org/

Add to composer.json file as `require`

```
"require": {
  ...
  "wpackagist-plugin/advanced-custom-fields": "5.9.*",
```

Rerun compose to rebuild:  

```
$ docker-compose run php php composer.phar install
```

If updating dependencies (and want to also update the composer.lock file):
```
$ docker-compose run php php composer.phar update

```

Verify plugin now exists in `wp-content/plugins` directory

If you can't find the plugin (or it is a custom one), you can just add it to the `wp-content/plugin` directory
It won't be controlled by composer, but it still will be included.  

## Deploy to WP-ENGINE

Production JS build via webpack:

```
$ docker-compose -f docker-compose.testing.yml run node npm run build:webprod
```
