<?php
/**
 * Created by PhpStorm.
 * User: slf_8
 * Date: 2016/4/28
 * Time: 16:51
 */

function check_verify($code,$id=''){
    $verify =new \Think\Verify();
    return $verify->check($code,$id);
}



