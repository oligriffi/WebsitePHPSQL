# Setting Up Apache, PHP, MySQL, HTML, and PHP Script

## Install Apache, PHP, and MySQL

### Install Apache:
```bash
sudo apt update
sudo apt install apache2

### Install PHP and MySQL support:

```bash
sudo apt install php mysql-server php-mysql
sudo systemctl start mysql
sudo systemctl enable mysql
sudo apt install php-mysqli


### Log in to the MySQL server as the root user:

```bash

mysql -u root -p

### Enter the MySQL root password when prompted.

### Now, create the myloginapp database:

```sql

CREATE DATABASE myloginapp;

### Create a MySQL user for the myloginapp database and grant it privileges:

```sql

CREATE USER 'myuser'@'localhost' IDENTIFIED BY 'mypassword';
GRANT ALL PRIVILEGES ON myloginapp.* TO 'myuser'@'localhost';
FLUSH PRIVILEGES;

### Replace 'myuser' and 'mypassword' with your desired username and password.

### Now, create the users table within the myloginapp database:

``` sql

USE myloginapp;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

## Enable Apache

```bash
sudo systemctl enable apache2

## Move index.html and test.php into var/www/html


