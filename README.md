## README

# Adequate
-> "Adequate" is a free open-source PHP web framework, created by Gerald Nika and intended for the development of web applications following the model-view-controller (MVC) architectural pattern.
Adequate offers an expressive and elegant syntax, helping you develop more fluently and without errors.
It has an expressive and beautiful syntax in terms of code elegance, simplicity, and readability. It has a bunch of helpful tools to help develop faster, keep things clean and avoid syntax errors. It offers Form Builders and Query Builders. It offers a Packaging System to organize your external packages and APIs. It uses concepts from URL Routing, CSRF Token Authentication, Middleware, and other security aspects.
Created in 2020.

# License
The Adequate framework is open-sourced software licensed under the MIT license.

# Getting Started
-> These instructions will get you a copy of the project up and running on your local machine for development or testing purposes. See deployment for notes on how to deploy the project on a live system.

# Prerequisites
-> To run this software on your machine you need to have:
	
	A host			: 	OS x64 / x32.
	PHP				: 	v.7 or above.
	Server type		:	MariaDB – v.10 or above
	DBMS			:	MySQL – phpMyAdmin v.4 or above
	OpenSSL PHP Extension
	PDO PHP Extension
	Tokenizer PHP Extension

# Deployment
-> To be able to run this properly you should:
	
	1. Open the configurations folder and change in the 'database_params.php' file these fields:
		DB_TYPE 			-> 		Replace with your database type;
		DB_HOST 			-> 		Replace with your host address;
		DB_NAME 			-> 		Replace with your database name;
		DB_USERNAME 		-> 		Replace with your database username;
		DB_PASSWORD 		-> 		Replace with your database password;
		
	2. Open the configurations folder and change in the 'configs.php' file these fields:
		HASH_GENERAL_KEY	->		Replace with your desired general key;
		HASH_PASSWORD_KEY	->		Replace with your desired database key;

	3. Create a database record of admin credentials in admin table:
		(Admins are created in phpMyAdmin manually);
		(You have to encrypt it sha256, so get the password from a user you registered through the form and paste it);
		(Then you can change it later in admin profile settings);

# Details
-> Built With:

	PHP Version: 7.3.10
	Bootstrap Version: 4.1.1
	Visual Studio Code Version: 1.42.0 x64
	Apache/2.4.33 (Win32) OpenSSL/1.1.0h PHP/7.2.5 Server at localhost Port 80
	Created: Wednesday, February 12, 2020, 7:59 PM
	Last modified: Wednesday, February 12, 2020, 8:01 PM
	Size: 559 KB (484,750 bytes)
	Contains: 81 Files, 44 Folders

# Authors
-> Gerald Nika - Software Engineer.

# Acknowledgments
-> To come in help of those who struggle developing dynamic and scalable web applications.
