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
?>