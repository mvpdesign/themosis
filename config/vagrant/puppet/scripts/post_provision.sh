#!/bin/bash

mysql -uroot < "/vagrant/config/vagrant/puppet/scripts/enable_remote_mysql_access.sql"
sed -i "s/^bind-address/#bind-address/" /etc/mysql/my.cnf
sudo service mysql restart

# cd /vagrant && composer run-script pre-archive-cmd
