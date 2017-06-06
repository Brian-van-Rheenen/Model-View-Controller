<?php
//Stel de root-map en directory seperator vast
define("ROOT", dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);

//Lees de config file
require "../../config.php";

spl_autoload_register(function ($class)
{
	//Check of de class bestaat in de 'controllers' map
	if (file_exists(ROOT . DS . 'controllers' . DS . $class . '.php'))
	{
		//Lees de controllers
		include ROOT . DS . 'controllers' . DS . $class . '.php';
	}
	
	//Check of de class bestaat in de 'models' map
	if (file_exists(ROOT . DS . 'models' . DS . $class . '.php'))
	{
		//Lees de models
		include ROOT . DS . 'models' . DS . $class . '.php';
	}
});

//Instantieer de controller
$ctr = new BookController();

//Wat moet er worden weergegeven?
if (isset($_GET["book"]))
{
	//Toon het gevraagde boek
	$ctr->showBook($_GET["book"]);
}

else
{
	//Toon de boekenlijst
	$ctr->index();
}
?>