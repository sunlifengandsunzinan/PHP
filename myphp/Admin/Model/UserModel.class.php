<?php
/**
 * Created by PhpStorm.
 * User: slf_8
 * Date: 2016/4/21
 * Time: 15:09
 */

namespace Admin\Model;


use Think\Model;

class UserModel extends  Model
{
    public function check_login($username,$password){
            $r = $this ->where(array('username'=>$username))->find();
            if(!$r){
                $this->error=("用户不存在");
                return false;
            }
            $user = $this->where(array('username'=>$username,'password'=>md5($password)))->find();
            if(!$user){
                $this->error=("密码错误");
                return false;
            }
            session('userInfo',$user['id']);
            return true;
    }

}