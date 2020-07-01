<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

try {
	$dotenv = Dotenv\Dotenv:: create($_SERVER['DOCUMENT_ROOT']);
	$dotenv->load();
	Valitron\Validator::lang(getenv('LIBERTY_LANG'));
}catch (Exception $e){
}