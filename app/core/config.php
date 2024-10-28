<?php 

defined('ROOTPATH') OR exit('Access Denied!');

if((empty($_SERVER['SERVER_NAME']) && php_sapi_name() == 'cli') || (!empty($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'))
{
	/** local database config **/
	define('DBNAME', 'quiz_app');
	define('DBHOST', 'localhost');
	define('DBUSER', 'irbba');
	define('DBPASS', 'incorrect');
	define('DBDRIVER', '');
	
	define('ROOT', 'http://localhost/quiz-mvc/public');
	define('EMAIL_VIEW', dirname(__DIR__) . '/views');

}else
{
	/** live database config **/
	define('DBNAME', 'irbba_devs_quiz_system');
	define('DBHOST', 'localhost');
	define('DBUSER', 'irbbadevs');
	define('DBPASS', 'incorrect');
	define('DBDRIVER', '');

	define('ROOT', 'ec2-3-8-131-201.eu-west-2.compute.amazonaws.com');

}

/** Email configurations **/
define('MAIL_PORT', 465);
define('MAIL_HOST', "smtp.gmail.com");
define('MAIL_USERNAME', "irbbawebsdev@gmail.com");
define('MAIL_PASSWORD', "hckfnkwvocysaure");

/** Application configuration and metadata **/
define('APP_NAME', "Irbba Devs");
define('APP_DESC', "Best student centered quiz application for Ghanaian SHS, TVET, JHS and Primary school students");
define('AUTHOR', "Raymond Affedzie");
define('AUTHOR_EMAIL', "raymondaffedzie@gmail.com");

/** true means show errors **/
define('DEBUG', true);

/** Time zone **/
date_default_timezone_set('Africa/Accra');
