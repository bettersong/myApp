<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/7
 * Time: 21:43
 */

namespace Home\Controller;


use Home\Model\UserModel;
use Think\Controller;
use Home\Model\BookModel;
use Think\Model;

class BookController extends Controller
{
     public function index(){
         $Book = new BookModel();
         //查询返回一个二维数组，可以输出查看结果。
         //二维数组中，包含索引和关联
         //$data[0]['bid']
         $count = $Book->count();//数据总数
         $Page= new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数(4)
         $show = $Page->show();
         $data = $Book->limit($Page->firstRow.','.$Page->listRows)->select();
         $this->assign("data",$data);
         $this->assign("page",$show);
         //把查询结果送到视图中
         $this->display("index");
     }
     public function userselect(){
         $bname = $_POST['bname'];

         $Book = new BookModel();
        // $bname = $_POST['bname'];
         if($bname != ''){
             $map['bname'] = array('like','%'.$bname.'%');
             $sql = "bname like '%$bname%'";
             $data = $Book->query($sql);
             if(count($data)==0){
                 //$msg = '未找到';
                 echo '未找到';
             }else{
                 $this->assign("data",$data);
                 $this->assign("bookname",$bname);
                 //把查询结果送到视图中
                 $this->display("index");
             }
         }
         else{
             redirect('index');//页面重定向到index
         }
     }
     public function showupdate(){
         if(isset($_SESSION['username'])){
             $Book = new BookModel();
             $Book->bid = $_GET['bid'];
             $Book->bname = $_GET['bname'];
             $Book->collect_count = $_GET['collect_count'];
             $Book->price = $_GET['price'];
             $Book->author = $_GET['author'];
             $this->assign('book',$Book);
             $this->display("update");
         }
         else{
             $this->error("请先登录");
         }

     }
     public function updatebook(){
         //echo 111;
         $bid = $_POST['bid'];
         //dump($bid);
         $bname = $_POST['bname'];
         $collect_count = $_POST['collect_count'];
         $price = $_POST['price'];
         $author = $_POST['author'];
         $Bookmodel = new BookModel();
         $data = $Bookmodel->update($bid,$bname,$collect_count,$price,$author);
         $this->index();
     }
     public function delete(){
         if(isset($_SESSION["username"])){
             $bid = $_GET[bid];
             //echo $bid;
             $BookModel = new BookModel();
             $data = $BookModel->delete($bid);
             //dump($data);
             $this->index();
         }
         else{
             $this->error("请先登录");
         }
     }
     public function showadd(){
         if(isset($_SESSION['username'])){
             $this->display("add");
         }
         else{
             $this->error("请先登录！");
         }
     }
     public function addbook(){
         $bname = $_POST['bname'];
         $collect_count = $_POST['collect_count'];
         $price = $_POST['price'];
         $author = $_POST['author'];
         //echo $bname,$collect_count,$price,$author;
         $BookModel = new BookModel();
         $data = $BookModel->add($bname,$collect_count,$price,$author);
         //$this->index();
         redirect('../Book/index', 1, '页面跳转中...');
     }
     public function test(){
         $bid = $_POST['bid'];
//         $Book = new BookModel();
//         $sql = "bid = $bid";
//         $res = $Book->query($sql);
         $bookModel = new Model();
         $sql = "select * from book where bid=$bid";
         $res = $bookModel->query($sql);
         //$this->ajaxReturn("$res");
         echo json_encode($res);

     }

}