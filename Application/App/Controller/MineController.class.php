<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/21
 * Time: 15:33
 */

namespace App\Controller;


use App\Model\MineModel;
use Think\Controller;
use Think\Model;

class MineController extends Controller
{
     public function selectnews(){
         $model = new Model();
         $sql = "select * from notice";
         $data = json_encode($model->query($sql));
         echo '{"data":'.$data.'}';
     }
     public function informdetail(){
         $nid = $_GET['nid'];
         $model = new Model();
         $sql = "select * from notice where nid=$nid";
         $result = $model->query($sql);
        // dump($result) ;
         $this->assign('news',$result);
         $this->display("myInformDetail");
     }
     public function mycollect(){
         if(isset($_SESSION["username"])){
             $uid = $_SESSION['userinfo']['uid'];
             $model = new Model();
             $sql = "select * from collect_book left join book on collect_book.bookid=book.bid where collect_book.userid=$uid";
             $result = $model->query($sql);
             $this->assign('data',$result);
             $this->display('myCollect');
         }else{
             redirect('../User/login');
         }

     }
     public function showCard(){
         $this->display('myCard');
     }
}