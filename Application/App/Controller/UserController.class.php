<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/7
 * Time: 16:28
 */

namespace App\Controller;


use Think\Controller;
use App\Model\UserModel;
use Think\Model;

class UserController extends Controller
{
    public function index(){
        $username = $_SESSION['username'];
        $Model = new UserModel();
        $result = $Model->selectAll($username);
        $this->assign('userInfo',$result);
        $this->display('index');
    }
    public function showlogin(){
        $this->display('login');
    }
    public function setlogin(){
        //用户提交了请求，包含请求参数
       //$username = '宋瑶';
       //$password = '123456';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $User = new UserModel();
        $result = $User->qurerylogin($username,$password);
        $model = new Model();
        $sql = "select * from user where username = '$username'";
        $userinfo = $model->query($sql);
        $_SESSION['username']=$username;
        $_SESSION['userinfo']=$userinfo[0];
        if($result != 'null'){
            echo "true";
        }else{
            echo "error";
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
        $result = $User->registeyanzheng($username);
        if($result['username'] != ''){
            echo "用户已存在";
            //echo 'error';
            //$this->ajaxReturn("error");
        }else{
            //注册
            $result = $User->regist($username,$password);
            if($result>0){
                echo "注册成功！";
            }
        }
    }
    //验证用户
    public function userCheck(){
        $username = $_POST['username'];
        $oldPassword = $_POST['oldPassword'];
        $User = new UserModel();
        $res = $User->check($username,$oldPassword);
        if($res!=''){
            echo 1;
        }else{
            echo 0;
        }
       // echo json_encode($res);

    }
    //修改密码
    public function updatepwd(){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $username = $_SESSION['username'];
        $userModel = new Model();
        //修改密码
        $updatesql = "update user set password='$newPassword' where username='$username'";
        $result = $userModel->execute($updatesql);
        echo $result;
    }
    //修改用户头像
    public function userphoto(){
        $imgUrl = $_POST['imgUrl'];
        $username = $_SESSION['username'];
        $User = new Model();
        $sql = "update user set photo='$imgUrl' where username='$username'";
        $result = $User->execute($sql);
        echo $result;
    }
    //退出
    public function logout(){
        session_destroy();
        redirect('../User/login', 1, '退出中..');
        //$this->success('退出中');
    }

}