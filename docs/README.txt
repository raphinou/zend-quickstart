README
======

This directory should be used to place project specfic documentation including
but not limited to project notes, generated API/phpdoc documentation, or 
manual files generated or hand written.  Ideally, this directory would remain
in your development environment only and should not be deployed with your
application to it's final production location.


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

