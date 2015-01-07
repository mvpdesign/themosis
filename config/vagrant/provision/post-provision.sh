#!/bin/bash

# Enable Remote MySQL Access
mysql -uroot < "/vagrant/config/vagrant/provision/enable_remote_mysql_access.sql"
sed -i "s/^bind-address/#bind-address/" /etc/mysql/my.cnf
sudo service mysql restart

composer update
composer install
composer run-script post-create-project-cmd