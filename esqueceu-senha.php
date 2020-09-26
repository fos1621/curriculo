<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Message;
use \Curri\Model\DadosPessoa;




$app->get('/esqueceu-senha', function() {

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("esqueceu-senha");

});

?>