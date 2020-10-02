<?php 

use \Curri\Page;
use \Curri\Model\Message;


$app->get('/como-funciona', function(){

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl('como-funciona');

});

?>