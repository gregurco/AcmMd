##  AcmMD

### Description

### Requirements
- PHP 5.1.0+
- curl enabled
- FPC
- GCC

### Interface languages
- Russian
- Romanian

##  Instalation
### Install all necessary packages
    $ apt-get install mc ssh apache2 mysql-client mysql-server php5 php5-mysql htop phpmyadmin git-core sudo gcc zip -y

### Install Lockrun for infinit cron
    $ wget unixwiz.net/tools/lockrun.c
    $ gcc lockrun.c -o lockrun
    $ cp lockrun /usr/local/bin/
    $ rm lockrun lockrun.c

### Connect to git
    $ git config --global user.name "login"
    $ git config --global user.email "email"
    $ ssh-keygen -t rsa -C "email"
    $ cat ~/.ssh/id_rsa.pub
Get a key and put it on ssh trusted keys

    $ cd /var/www/
    $ git clone git@github.com:Gregurco/AcmMd.git

### Change etc/crontab
\* *		* * *   root	/usr/local/bin/lockrun --lockfile=/tmp/cron.lockrun -- /var/www/AcmMd/protected/yiic cron
*/10 *  * * *   root    cd /var/www/AcmMd && git pull

### Final touches
    $ a2enmod rewrite
    $ chown www-data:www-data -R /var/www

Редактируем настройки apache
