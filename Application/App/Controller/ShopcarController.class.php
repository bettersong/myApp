<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/17
 * Time: 16:01
 */

namespace App\Controller;


use App\Model\UserModel;
use Think\Controller;
use App\Model\BookModel;
use Think\Model;

class ShopcarController extends Controller
{
  public function index(){
      if(isset($_SESSION["username"])){
          $uid = $_SESSION['userinfo']['uid'];
          $model = new Model();
          $sql = "select * from shopcar left join book on shopcar.bid=book.bid where shopcar.uid=$uid";
          $result = $model->query($sql);
          $this->assign('data',$result);
          $this->display('index');
      }else{
          redirect('../User/login');
      }
  }
}