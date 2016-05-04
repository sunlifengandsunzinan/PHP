<?php
/**
 * Created by PhpStorm.
 * User: slf_8
 * Date: 2016/5/3
 * Time: 15:16
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Upload;

class ContentController extends Controller
{
            public function index(){
            $this->display('pushContent');
        }
            public function add_artical(){
            $artical= D('Artical');
            if(IS_POST){

                //导入图片上传类
                //import("ORG.Net.UploadFile");
                //实例化上传类
                $upload = new \Think\Upload();;
                //$upload->maxSize = 3145728;
                //设置文件上传类型
                $upload->allowExts = array('jpg','gif','png','jpeg');
                //设置文件上传位置
                $upload->rootPath = "Uploads/";//这里说明一下，由于ThinkPHP是有入口文件的，所以这里的./Public是指网站根目录下的Public文件夹
                //设置文件上传名(按照时间)
                $upload->saveRule = "time";
                $info = $upload->upload();
                if (!$info){
                    $this->error($upload->getErrorMsg());
                }else{
                    foreach($info as $file){
                        $form['imageurl'] = '/Uploads/'.$file['savepath'].$file['savename'];
                        $image = new \Think\Image();
                        $image->open('./Uploads/'.$file['savepath'].$file['savename']);
                        $image->thumb(175, 117,\Think\Image::IMAGE_THUMB_CENTER)->save('./Uploads/'.$file['savepath'].'m_'.$file['savename']);
                        $form['imageurl'] = '/Uploads/'.$file['savepath'].'m_'.$file['savename'];
                        $result = unlink('./Uploads/'.$file['savepath'].$file['savename']);
                        if(!$result){
                            $this->error('删除失败');
                        }
                    }
                }

                $form['title'] = I('post.title', '', 'trim') ? I('post.title', '', 'trim') : $this->error('标题不能为空');
                $form['keywords'] = I('post.keywords', '', 'trim') ? I('post.keywords', '', 'trim') : $this->error('关键字不能为空');
                $form['author'] = I('post.author', '', 'trim') ? I('post.author', '', 'trim') : $this->error('作者不能为空');
                $form['simplecontent'] = I('post.simple', '', 'trim') ? I('post.simple', '', 'trim') : $this->error('摘要不能为空');
                $form['content'] = I('post.myVent', '', 'trim') ? I('post.myVent', '', 'trim') : $this->error('内容不能为空');
                $form['createtime'] = date("Y-m-d H:i:s");
                $artical->create();
                $artical->add($form);
                $this->success('添加成功');
            }else{
                $this->error('非法操作');
            }

    }
}