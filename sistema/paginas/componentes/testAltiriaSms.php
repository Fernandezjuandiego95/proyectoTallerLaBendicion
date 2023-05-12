<?php
// Copyright (c) 2020, Altiria TIC SL
// All rights reserved.
// El uso de este c�digo de ejemplo es solamente para mostrar el uso de la pasarela de env�o de SMS de Altiria
// Para un uso personalizado del c�digo, es necesario consultar la API de especificaciones t�cnicas, donde tambi�n podr�s encontrar
// m�s ejemplos de programaci�n en otros lenguajes y otros protocolos (http, REST, web services)
// https://www.altiria.com/api-envio-sms/

// YY y ZZ se corresponden con los valores de identificacion del
// usuario en el sistema.
include('httpPHPAltiria.php');

$altiriaSMS = new AltiriaSMS();
//$altiriaSMS -> setUrl("http://www.altiria.net/api/http");

$altiriaSMS->setLogin('moises_mendez@uajs.edu.co');
$altiriaSMS->setPassword('7fc4n8nb');
// Descomentar para utilizar la autentificaci�n mediante apikey
//$altiriaSMS->setApikey('YY');
//$altiriaSMS->setApisecret('ZZ');
$altiriaSMS->setDebug(true);

//Use this ONLY with Sender allowed by altiria sales team
//$altiriaSMS->setSenderId('TestAltiria');
//Concatenate messages. If message length is more than 160 characters. It will consume as many credits as the number of messages needed
//$altiriaSMS->setConcat(true);
//Use unicode encoding (only value allowed). Can send ����� but message length reduced to 70 characters
//$altiriaSMS->setEncoding('unicode');

//$sDestination = '346xxxxxxxx';
$sDestination = $celular2;

var_dump($sDestination);
//$sDestination = array('346xxxxxxxx','346yyyyyyyy');

$response = $altiriaSMS->sendSMS($sDestination, "Mensaje de prueba hola juan");

if (!$response)
  echo "El env�o ha terminado en error";
else
  echo $response;
?>

