<?php 

use \Curri\Model\DadosPessoa;
use \Curri\Model\Login;


function formatDate($date){

	$myDate = date("d-m-Y", strtotime($date));

	return $myDate;
}

function utf8_en($date){

	return utf8_encode($date);
}

?>