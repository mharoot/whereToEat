<?php
header('Location: public/');


/* 
Did not work:

.htaccess
RewriteEngine On
RewriteBase /whereToEat/
RewriteCond %{THE_REQUEST} /public/([^\s?]*) [NC]
RewriteRule ^ %1 [L,NE,R=302]
RewriteRule ^((?!public/).*)$ public/$1 [L,NC]

.htaccess
RewriteEngine on
RewriteCond %{REQUEST_URI} !^public
RewriteRule ^(.*)$ public/$1 [L]
*/