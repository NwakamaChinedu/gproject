# Group G Project
## _Most setup instructions will be found here'_

## https://github.com/CMM004-Group-G/playground.git

# Pull the Repository to your Laptop before you start working on the project

### please make sure you sync your changes to make sure you don't override other files

#####  The Main goal here is collaboration and Project management 

#

##  Setting Up your local environment
- setup XAMP Stack on your windows PC - tutorials = https://www.youtube.com/watch?v=k9em7Ey00xQ
- make sure you use php version 7.x and above
- SQL version 8.x and above
- All asset files in the asset folder, including CSS
- Prefered Database client = Adminer. 
- to access the Database client, use your ~root_path/db-client.php
- your root_path can be localhost or any other virtual file you have added to the webserver
- Database hosting = AWS RDS = group-g-database.cccdhar8ekox.eu-north-1.rds.amazonaws.com
- Webserver hosting = DigitalOcean (yet to be provisioned)


## Plugins
Instructions on how to use them in your own application are linked below.

| Applicaion | Version |
| ------ | ------ |
| Apache | [2.4 ]|
| GitHub | https://github.com/CMM004-Group-G/playground.git |
| PHP | => v7.x  |
| MYSQL | => 8.x |
| HTML | V5|
| CSS | version 3 | -->

## Database
Database is hosted on a docker in Essien's environment, you can check the source code assets/sql to import a copy of the database to your local Environ.

Make sure to change the parameters in db-conn.php, db-conn2.php and db_var.php to match your database credentials if using a localhost.

# Note database communication do not work from RGU's Network

## Production deployment
#

### Cpanel deployment for the time at http://groupg.cinemaxng.com/

#
## Docker
There is a docker buld file and a docker-compose file.
- install docker on your system
- clone the git repo
- enter the directory and open cmd within the derectory
- type docker-compose up -d

this will build the image and fire up the applicatio

## Note that the Docker environment is still buggy and we do not have enough time to resolve it this semseter. 


## License
MIT
