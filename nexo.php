<?php 

/*
if(isset($_POST))

if(isset($_POST['_texto']))
{
	$mostrar = $_POST['_texto'];
echo "$mostrar";

}

*/
require('PHP/Estacionamiento.php');
if(isset($_POST['Alta']))
{
//Estacionamiento::guardar($_POST['_texto']);
	$milistado = Estacionamiento::leer();
	var_dump($milistado);
}
else
{
	$milistado = Estacionamiento::calcular($_POST['_texto']);

}
?>