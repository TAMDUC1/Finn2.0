READ ME!!!
**connect to server**
			ssh root@128.199.173.89


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
        ServerName 128.199.173.89
        ServerAlias http://128.199.173.89/
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
	
		**when we face a problem"show ErrorException file_put_contents failed to open stream: No such file or directory (OS Windows)"
		remember to clear cache by following line of codes
		php artisan config:cache**
		
		
		