<?php

if (!function_exists('check_radio')){

	function check_radio($name, $value, $default = null){
		$old = old($name);

		if(!is_null($default) && empty($old)) return 'checked';

		if($old == $value) return 'checked';
	}
}

if (!function_exists('check_radio_edit')){

	function check_radio_edit($name, $value, $default = null){

		if(isset($name) && isset($name) && $name == $value) return 'checked';
	}
}

if (!function_exists('check_select')){

	function check_select($name, $value){
		if(old($name) == $value) return 'selected';
	}
}

if (!function_exists('check_select_edit')){


    function check_select_edit($obj, $id)
    {
        if (!is_null($obj) && $obj->id == $id)return 'selected';
    }

}

if (!function_exists('color_status')) {
    function color_status($status)
    {
        if($status == 'published') return 'green darken-1 status';
        if($status == 'unpublished') return 'red darken-1 status';
        if($status == 'draft') return 'yellow lighten-3 status';
    }
}
