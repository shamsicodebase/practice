<?php
function checkResponseformat($format){
	$responses = array('array','json','xml');
	if(!is_string($format)){
		return false;
	}elseif(!in_array( strtolower($format),$responses)){
		return false;
	}
	return true;	
}