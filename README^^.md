READ ME!!!
**connect to server**
			ssh root@ip-adress
**copy Files to Remote** (do it from local machine) **remember to rip files before sending!!!**
			sudo scp -r /Users/TamPham/Finn2.0 root@ip-address:/root

1) **apache Mysql PHP on Virtual Host**
 follow link:
 https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04
 then install composer!!!
2) **Set Up Apache Virtual Hosts on Ubuntu**
	follow link to set up directory, grant permission , set up config file, enable the new virtual Host Files
https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts

  following is how we modify config file with ip-address (feel free to take a look in the future project)
  config file:
  *		ServerAdmin admin@example.com
        ServerName ip-adress
        ServerAlias ip-adress/
        DocumentRoot /root/Finn2.0/public/index.php*
        *	 ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
        <Directory  /root/Finn2.0/public>
         Options Indexes FollowSymLinks MultiViews
         AllowOverride all
         Require all granted
        </Directory>*

3) **some code needed to remember!**
	* test log
	tailf /var/log/apache2/error.log
	* nano vim : text edit file
	* ll , ll -a, pwd
	*  Grant permission
		chmod -R 755 /root/Finn2.0
	*	enable vitual host file
		a2ensite example.com.conf
	* 	composer install : to check php function and backit
	*   sudo chown -R www-data:www-data /var/www
		sudo chown -R $USER:www-data /var/www
		sudo chmod -R 640 /var/www
	* 	maybe needed to delete env file if we pushed env file to server
	* 	need to setup mySQL on server , then edit the config file to connect properly to database!
	* 	sometimes have a problem with permission so we need to grant a folder permission!

		**when we face a problem"show ErrorException file_put_contents failed to open stream: No such file or directory (OS Windows)"
		remember to clear cache by following line of codes
		php artisan config:cache**
