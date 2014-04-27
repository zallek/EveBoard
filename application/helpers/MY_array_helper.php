<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( ! function_exists('array_minKey'))
{
	function array_minKey($array)
    { 
		return min(array_keys($array));
	}
}


if ( ! function_exists('array_maxKey'))
{
	function array_maxKey($array)
    { 
		return max(array_keys($array));
	}
}