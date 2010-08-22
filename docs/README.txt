README
======

This directory should be used to place project specfic documentation including
but not limited to project notes, generated API/phpdoc documentation, or 
manual files generated or hand written.  Ideally, this directory would remain
in your development environment only and should not be deployed with your
application to it's final production location.

Installing the zend framework
=============================
Details at 
http://files-source.zend.com/help/Zend-Server-Community-Edition/zend-server-community-edition.htm#deb_installation.htm

Add this line to /etc/apt/sources.list

deb http://repos.zend.com/zend-server/deb server non-free

and install it with 
install aptitude install zend-server-ce-php-5.2 #or 5.3

Add the alias to zf.sh command:
alias zf='/usr/local/zend/share/ZendFramework/bin/zf.sh'


Setting Up Your VHOST
=====================

Here's the virtual host config I used, my VirtualBox had ip 192.168.1.4.
I could then access the index controller on http://192.168.1.4:10084

Listen *:10084
NameVirtualHost *:10084
<VirtualHost *:10084>
   ServerName 192.168.1.4
    DocumentRoot /home/rb/zend/quickstart/public/

    SetEnv APPLICATION_ENV "development"

    <Directory /home/rb/zend/quickstart/public>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>


Web console
===========
A web console is available at 
   http://localhost:10081/

Creating the database
=====================

Install Sqlite3: 
  apt-get install sqlite3
And create the database manually:
  sqlite3 data/db/guestbook.db
At that time you can enter the sql queries on the CLI.


