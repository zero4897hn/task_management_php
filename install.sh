# update server
apt-get update -y
apt-get upgrade -y

# LAMP

# Apache server
apt-get install -y apache2

# MySQL server
debconf-set-selections <<< 'mysql-server mysql-server/root_password password nobita12'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password nobita12'
apt-get install -y mysql-server 

# PHP 7.2
apt-add-repository ppa:ondrej/php
apt-get update -y

apt-get install -y php7.2 php7.2-common php7.2-zip php7.2-mysql libapache2-mod-php7.2 --allow-unauthenticated

# enable rewrite mode
a2enmod rewrite

service apache2 restart