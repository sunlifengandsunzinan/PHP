<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        echo "test";
    }
    public function  test(){
        header("content-type:text/html;charset=utf-8");
/*        $user = M('User');
        $map['id']='1';
        var_dump($user ->where($map) -> select());*/

        $ip = get_client_ip();
        print_r($ip);
        $Ip = new \Org\Net\IpLocation('UTFWry.dat');
        $area = $Ip->getlocation('www.thinkphp.cn'); // 获取某个IP地址所在的位置
        print_r($area);
       // $value = $this->_post("name"); // 获取session变量
        //echo $value;
    }
    public function  verify(){
        header("content-type:text/html;charset=utf-8");
        $name = '孙立峰';
        $this->assign('name',$name);
        $this->display();
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

        $verify->entry('verify');
    }
}