<?php

/**
 * Example 1: Using an anonymous function as the single parameter for `spl_autoload_register`
 * 
 * @see http://php.net/manual/en/functions.anonymous.php
 */



spl_autoload_register( function( $class_name ) {
	/**
	 * Note that actual usage may require some string operations to specify the filename
	 */
	$file = strtolower($class_name . '.php');
	if( file_exists( "..".DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR.$file ) ) {
		require "..".DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR.$file;
    }
    if( file_exists( "..".DIRECTORY_SEPARATOR."dao".DIRECTORY_SEPARATOR.$file ) ) {
		require "..".DIRECTORY_SEPARATOR."dao".DIRECTORY_SEPARATOR.$file;
	}
    if( file_exists( "..".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR.$file ) ) {
		require "..".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR.$file;
	}
} );




session_start();
if(isset($_SESSION["logged"])){
		if($access=="aluno"){
				if(isset($_SESSION["professor"]))
				header("Location: ../aluno/principal-professor.php");
				if(isset($_SESSION["admin"]))
				header("Location: ../pages/index.php");
		}
		if($access=="professor"){
			if(!isset($_SESSION["professor"])){
				if(isset($_SESSION["admin"]))
				header("Location: ../pages/index.php");
				if(isset($_SESSION["aluno"]))
				header("Location: ../aluno/principal-alunos.php");
	}
	}
		if($access=="admin"){
			if(!isset($_SESSION["admin"])){
				if(isset($_SESSION["professor"]))
				header("Location: ../professor/principal-professor.php");
				if(isset($_SESSION["aluno"]))
				header("Location: ../aluno/principal-alunos.php");

			}
	}
	
}
else {
	if(!isset($login))header("Location: ../pages/login.php");}

?>