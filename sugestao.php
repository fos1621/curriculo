<?php 

use \Curri\Page;
use \Curri\Model\Message;

$app->get('/sugestao', function(){

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl('sugestao');

});


$app->post('/sugestao', function(){

	

	$page->setTpl('sugestao');

});

?>