<?php

function env($value){

	include(__DIR__ . '/../../env.php');

	if(isset($$value))
		return $$value;
	else
		die("variavel \"$value\" não existe");
}
function asset($value){

	include(__DIR__ . '/../../env.php');

	return $public_path . $value;
}

