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

	//la funcion explode es un parseador
	$auto = explode("=>", $renglon);

	$listadoDeAutos[] = $auto;

	}
	fclose($archivo);


	return $listadoDeAutos;
}

public static function Sacar($patente)
{
	$miListadoDeEstacionado = Estacionamiento::leer();

	foreach ($miListadoDeEstacionado as $auto) {
		if($auto[0] == $patente)
		{

			$ahora = date("Y-m-d H:i:s");

			$diferencia = strtotime($ahora)-strtotime($auto[1]);

			//echo "Tiempo transcurrido ".$diferencia;
			return $diferencia;
		}
	}
}

public static function calcular()
{

	$tiempo = Estacionamiento::leer();

	$tiempo = intval($tiempo)/3600;

	echo "$tiempo";
}

}

?>