<?php
/**
 * Created by PhpStorm.
 * User: slf_8
 * Date: 2016/5/3
 * Time: 15:16
 */

namespace Admin\Controller;


use Think\Controller;

class ContentController extends Controller
{
            public function index(){
            $this->display('pushContent');
        }
            public function add_artical(){
            $artical= D('Artical');
            if(IS_POST){
                $form['title'] = I('post.title', '', 'trim') ? I('post.title', '', 'trim') : $this->error('标题不能为空');
                $form['keywords'] = I('post.keywords', '', 'trim') ? I('post.keywords', '', 'trim') : $this->error('关键字不能为空');
                $form['author'] = I('post.author', '', 'trim') ? I('post.author', '', 'trim') : $this->error('作者不能为空');
                $form['simplecontent'] = I('post.simple', '', 'trim') ? I('post.simple', '', 'trim') : $this->error('摘要不能为空');
                $form['content'] = I('post.myVent', '', 'trim') ? I('post.myVent', '', 'trim') : $this->error('内容不能为空');
                $artical->add($form);
                $this->success('添加成功');
            }

    }
}