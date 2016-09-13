<?php 

class Estacionamiento 
{

	static function guardar($patente)
{
date_default_timezone_set('UTC');

$archivo = fopen("estacionados.txt","a");

$ahora = date("Y-m-d H:i:s");

$renglon = $patente."=>".$ahora."\n";
fwrite($archivo, "$renglon");
fclose($archivo);
}

public static function leer()
{
$listadoDeAutos = array();
//forma de agregar un elemento y declarar un array
//$listadoDeAutos() = "primer elemento";



	$archivo = fopen("estacionados.txt", "r");
	while(!feof($archivo))
	{
$renglon = fgets($archivo);

$listadoDeAutos[] = $renglon;



	}
fclose($archivo);


return $listadoDeAutos;
}


}

?>