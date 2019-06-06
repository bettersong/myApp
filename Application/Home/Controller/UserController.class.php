<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/7
 * Time: 16:28
 */

namespace Home\Controller;


use Think\Controller;
use Home\Model\UserModel;
class UserController extends Controller
{
    public function showlogin(){
        $this->display('login');
    }
    public  function setlogin(){
        //用户提交了请求，包含请求参数
        $username = $_POST['username'];
        $password = $_POST['password'];
        //echo $username;
        //创建模型对象
        $User = new UserModel();
        //调用方法
        $result = $User->qurerylogin($username,$password);
        if($result!=false&&$result!=null){
             //登录成功显示
             //$this->display('/Book/index');
            $_SESSION["username"] = $username;
            //var_dump($_SESSION["username"]);
          $this->success('登陆成功','../Book/index');
        }else{
            $this->assign('msg','账号或密码错误！');
            //传数据需要在显示视图之前
            $this->display('login');
        }
    }
    public function showregist(){
        $this->display('regist');
    }
    public function registAction(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $User = new UserModel();
        //调用方法验证用户是否存在
        $result = $User->registeyanzheng($username,$password);
        if($result != NULL){
           // echo "用户已存在";
            redirect('../User/regist', 1, '用户已存在...');
        }else{
            //注册
            $result = $User->regist($username,$password);
            if($result>0){
                echo "注册成功！请前往"."<a href='showlogin'>登陆</a>";
            }

        }

    }
    //退出
    public function logout(){
        session_destroy();
        redirect('../Book/index', 1, '退出中...');
    }

}