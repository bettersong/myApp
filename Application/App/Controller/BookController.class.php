<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/7
 * Time: 21:43
 */

namespace App\Controller;


use App\Model\UserModel;
use Think\Controller;
use App\Model\BookModel;
use Think\Model;

class BookController extends Controller
{
     public function index(){
         $Book = new BookModel();
         $model = new Model();
         $sql = "select * from book left join bookmark on book.mark=bookmark.id";
         $data = $model->query($sql);
         $this->assign('data',$data);
         //把查询结果送到视图中
         $this->display("index");
     }
     public function indexDetil(){
     $bid = $_GET['bid'];
     $bookModel = new Model();
     $sql = "select * from book left join bookmark on book.mark=bookmark.id where book.bid='$bid'";
     $data = $bookModel->query($sql);
     $this->assign('data',$data);
     $this->display("bookDetil");
     }
     public function selectAll(){
         $model = new Model();
         $sql = "select * from book left join bookmark on book.mark=bookmark.id";
         $data = json_encode($model->query($sql));
         echo '{"data":'.$data.'}';
     }
    public function selectOthers(){
         $type = $_POST['type'];
        $model = new Model();
        $sql = "select * from book left join bookmark on book.mark=bookmark.id where book.mark=$type";
        $data = json_encode($model->query($sql));
        echo $data;
    }
     public function userselect(){
         $bname = $_POST['bname'];
         $model = new Model();
         //$Book = new BookModel();
         if($bname != ''){
             $sql = "select * from book left join bookmark on book.mark=bookmark.id where bname like 
                       '%$bname%'";
             $data = json_encode($model->query($sql));
             if(count($data)==0){
                 echo '未找到';
             }else{
                 $this->assign("bookname",$bname);
                 echo $data;
             }
         }
         else{
             $sql = "select * from book left join bookmark on book.mark=bookmark.id";
             $data = json_encode($model->query($sql));
             echo $data;
         }
     }
     //收藏
    public function bookcollect(){
         $bid=$_POST['bid'];
         $uid = $_SESSION['userinfo']['uid'];
         //dump($_SESSION['userinfo']);
         $model = new Model();
         //echo $bid;
         $sql = "insert into collect_book(bookid,userid) values($bid,$uid)";
         $result = $model->execute($sql);
         echo $result;
    }
    //取消收藏
    public function bookcollectcancle(){
        $bid=$_POST['bid'];
        //$uid = $_SESSION['userinfo'][0]['uid'];
        //dump($_SESSION['userinfo']);
        $model = new Model('collect_book');
        //echo $bid;
        //$sql = "delete from collect_book where bookid=$bid";
        $result = $model->where("bookid=$bid")->delete();
        echo $result;
    }
    //加入购物车
    public function ShopCar(){
        $bid=$_POST['bid'];
        $uid = $_SESSION['userinfo']['uid'];
        $model = new Model();
        $res = $model->query("select * from shopcar where bid=$bid and uid=$uid");
        if(count($res)!=0){
            //echo json_encode($res);
            $data = $model->execute("update shopcar set count=count+1 where bid=$bid and uid=$uid");
            echo $data;
        }else{
            $sql = "insert into shopcar(bid,uid,count) values($bid,$uid,1)";
            $result = $model->execute($sql);
            echo $result;
        }

    }

}