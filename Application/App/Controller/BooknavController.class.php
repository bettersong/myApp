<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/26
 * Time: 18:36
 */

namespace App\Controller;


use Think\Controller;
use Think\Model;

class BooknavController extends Controller
{
    public function Classification(){
        $model = new Model();
        $hotMark = 2;
        $jingMark = 4;
        $mianMark = 3;
        $newMark = 1;
        $hotsql = "select * from book left join bookmark on book.mark=bookmark.id where bookmark.id='$hotMark'
            ";
        $hot = $model->query($hotsql);
        $jingsql = "select * from book left join bookmark on book.mark=bookmark.id where bookmark.id='$jingMark'
            ";
        $jing = $model->query($jingsql);
        $miansql = "select * from book left join bookmark on book.mark=bookmark.id where bookmark.id='$mianMark'
            ";
        $mian = $model->query($miansql);
        $newsql = "select * from book left join bookmark on book.mark=bookmark.id where bookmark.id='$newMark'
            ";
        $new = $model->query($newsql);
        //dump($hot);
        $this->assign('hot',$hot);
        $this->assign('jing',$jing);
        $this->assign('mian',$mian);
        $this->assign('new',$new);
        $this->display('classificationBook');
    }
    public function Ranking(){
        $this->display('ranking');
    }
    public function FreeBook(){
        $this->display('freeBook');
    }
    public function VipBook(){
        $this->display('vipBook');
    }
    public function AssignBook(){
        $this->display('assignBook');
    }

}