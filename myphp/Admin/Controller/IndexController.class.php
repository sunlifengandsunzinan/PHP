<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Think\Controller;
use Think\Image;
use Think\Verify;

class IndexController extends AuthController {
    public function index(){
        $userInfo = D('User');
       // $menu = D('Menu');
        $userid = session('userInfo');
        $userInfo ->find($userid);
        $this->display();
    }
    public function login_out(){
        session('[destroy]');
        $this->success('安全退出！', U('Login/login'));
    }
    public function _empty(){
        echo "非法操作的方法";
    }


    public function left_side(){
        $userid = session('userInfo');
    }

    public function modifyPassword(){
        $password =md5(I('post.password'));
        $userInfo = D('User');
        $userid = session('userInfo');
        $userInfo->where('id'==$userid)->setField('password',$password);
        $this->ajaxReturn('msg',$password);

    }

}