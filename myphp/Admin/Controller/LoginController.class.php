<?php
/**
 * Created by PhpStorm.
 * User: slf_8
 * Date: 2016/4/29
 * Time: 10:10
 */

namespace Admin\Controller;


use Think\Controller;
use Admin\Model;

class LoginController extends Controller
{

    public function login(){

        if(IS_POST){
            $user=D('User');
            $name = I('post.username');
            $username = I('post.username', '', 'trim') ? I('post.username', '', 'trim') : $this->error('用户名不能为空');
            $password = I('post.password', '', 'trim') ? I('post.password', '', 'trim') : $this->error('密码不能为空');
            //验证码判断
            $code = I('post.validate', '', 'trim') ? I('post.validate', '', 'trim') : $this->error('请输入验证码');
            if(check_verify($code)){
                if($user->check_login($username,$password)){
                    $this->success('登陆成功',U('Admin/Index/index'));
                }else{
                    $this->error($user ->getError());
                }
            }else{
                $this ->error('验证码不正确');
            }
        }else{
            $this->display('login');
        }
    }


    public function code(){
        $verify = new \Think\Verify();
        $verify->useCurve = true;
        $verify->useNoise = false;
        $verify->bg = array(255, 255, 255);

        if (I('get.code_len')) $verify->length = intval(I('get.code_len'));
        if ($verify->length > 8 || $verify->length < 2) $verify->length = 4;

        if (I('get.font_size')) $verify->fontSize = intval(I('get.font_size'));

        if (I('get.width')) $verify->imageW = intval(I('get.width'));
        if ($verify->imageW <= 0) $verify->imageW = 130;

        if (I('get.height')) $verify->imageH = intval(I('get.height'));
        if ($verify->imageH <= 0) $verify->imageH = 50;

        $verify->entry();
    }

    public function _empty(){
        echo "非法操作的方法";
    }
}