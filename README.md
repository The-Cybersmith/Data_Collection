# Data_Collection
This was implemented on a fresh linux distribution (a VBox virtual machine, running the 20.04.2.0 LTS version of Ubuntu).
Apache2, php, and mysql were installed via command line. The mysql server was configured to use no password validation, use the port 3306, and have a root password of "password".
If you want a more secure password, you will need to change the php code, and also use this command: `sudo mysqladmin -u root password <secure_password>`

The file "/ect/apache2/sites-available/your_domain.conf" must be amended to contain the following content:


`<VirtualHost *:80>`
    `ServerName Data_Collection`
    `ServerAlias www.Data_Collection`
    `ServerAdmin webmaster@localhost`
    `DocumentRoot /var/www/Data_Collection`
    `ErrorLog ${APACHE_LOG_DIR}/error.log`
    `CustomLog ${APACHE_LOG_DIR}/access.log combined`
`</VirtualHost>`


And the file "/ect/apache2/apache2.conf" must have this content:

`<Directory /var/www/>`
	`Options Indexes FollowSymLinks`
	`AllowOverride none`
	`Require all granted`
`</Directory>`

replaced with this:

`<Directory /var/www/>`
	`Options Indexes FollowSymLinks`
	`AllowOverride all`
	`Require all granted`
`</Directory>`


This will allow the ".htaccess" file to work properly.
To install these files on your own computer, please navigate to the "/var/www" folder, and clone the git directory.

These commands can now be used to get the apache server configured.

`sudo a2ensite Data_Collection`

`sudo a2dissite 000-default`

`sudo systemctl reload apache2`

Also Note:
If you need to restart your computer at any point, these commands are useful:

`sudo service mysql start`

`sudo service apache2 start`
