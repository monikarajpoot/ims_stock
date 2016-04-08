<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @ Function Name      : pr
 * @ Function Params    : $data {mixed}, $kill {boolean}
 * @ Function Purpose   : formatted display of value of varaible
 * @ Function Returns   : foramtted string
 */
function no_cache() {
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
}

function getdetails($tablename,$id) 
{
    $CI = & get_instance();
    $sessionemp = emp_session_id();
    $query =   $CI->db->query("SELECT * FROM ft_".$tablename." where ".$tablename."_id = $id ");
    $state_name = $query->row_array();
    return $state_name['state_name'];
}