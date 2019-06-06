<?php
namespace App\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function index(){
        if(isset($_SESSION['username'])){
            $this->display('index');
        }else{
            //$this->error('请先登录','./User/showlogin',2);
            redirect('../User/login');
        }

    }
    public function pageone(){
        $model = new Model();
        $hotMark = 2;
        $jingMark = 4;
        $mianMark = 3;
        $newMark = 1;
        $hotsql = "select * from book left join bookmark on book.mark=bookmark.id where bookmark.id='$hotMark'
            limit 3";
        $hot = $model->query($hotsql);
        $jingsql = "select * from book left join bookmark on book.mark=bookmark.id where bookmark.id='$jingMark'
            limit 3";
        $jing = $model->query($jingsql);
        $miansql = "select * from book left join bookmark on book.mark=bookmark.id where bookmark.id='$mianMark'
            limit 3";
        $mian = $model->query($miansql);
        $newsql = "select * from book left join bookmark on book.mark=bookmark.id where bookmark.id='$newMark'
            limit 3";
        $new = $model->query($newsql);
        //dump($hot);
        $this->assign('hot',$hot);
        $this->assign('jing',$jing);
        $this->assign('mian',$mian);
        $this->assign('new',$new);
        $this->display('pageone');
    }

}