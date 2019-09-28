<?php

try{

	$connect = new pdo('mysql:host=localhost;dbname=gestion_magasin', 'root', '');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
catch(PDOException $e)
	{
		echo"Connection failed". $e->getMessage();
	}