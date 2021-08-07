# moat
app

1 - Clone the project

2 - Create the database moat, using mysql

3 - It there is a password, change the passoword in the file moat\application\config.php  - $db['default']['password'] = 'password'

4 - Run the migrations 
  4.1 - in browser https://localhost/teste/migrate - the tables users and migrations will be created  
  4.2 - in the file moat\application\migration.php, change the version of migration to 002, here $config['migration_version'] = 002;
  4.3 - in browser https://localhost/teste/migrate - the tables artist will be created  
  4.4 - in the file moat\application\migration.php, change the version of migration to 003, here $config['migration_version'] = 003;
  4.5 - in browser https://localhost/teste/migrate - the tables album will be created
  
5 - if migration doesn't work, you can use the script database.sql to create the database
