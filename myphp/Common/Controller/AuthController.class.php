<?php
/**
 * Created by PhpStorm.
 * User: slf_8
 * Date: 2016/4/28
 * Time: 18:04
 */

namespace Common\Controller;


use Think\Auth;
use Think\Controller;

class AuthController extends Controller
{
    protected function _initialize()
    {
        $user = session('userInfo');
        if(!$user){
            $this->error('非法操作',U('Login/login'));
        }
        if($user == 1){

            return true;
        }
        $auth = new Auth();
        if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$user)){
            $this->error('没有权限',U('Login/login'));

        }

    }
}