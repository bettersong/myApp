<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/7
 * Time: 17:18
 */
namespace Home\Model;


class UserModel extends \Think\Model
{
    public function qurerylogin($username,$password){
        $User = M("user");
        //实例化user对象
        $result = $User->where("username='$username' AND password = '$password'")->find();
        return $result;
    }
    public function registeyanzheng($username,$password){
        $User = M("user");
        $result = $User->where("username='$username' AND password = '$password'")->find();
        return $result;
    }
    public function regist($username,$password){
        $User = M("user");
        $data = array("username"=>"$username","password"=>"$password");
        $result = $User->data($data)->add();
        return $result;
    }
}