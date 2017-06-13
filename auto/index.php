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
/*
//Lees de URL-varianten in arrays in
$request_uri = explode("/", $_SERVER["REQUEST_URI"]);
$script_name = explode("/", $_SERVER["script_name"]);

for ($i=0; $i < count($script_name); $i++)
{
	if ($request_uri[$i] == $script_name[$i])
	{
		unset($request_uri[$i]);
	}
}

//Maak een array van de overgebleven URL-delen
$command = array_values($request_uri);
*/
//Instantieer de controller
$ctr = new AutoController();

//Wat moet er worden weergegeven?
if (isset($_GET["auto"]))
{
	//Toon het gevraagde boek
	$ctr->editAuto($_GET["auto"]);
}

else
{
	//Toon de boekenlijst
	$ctr->index();
}
?>