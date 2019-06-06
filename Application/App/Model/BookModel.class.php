<?php
/**
 * Created by PhpStorm.
 * User: songy
 * Date: 2019/3/7
 * Time: 21:46
 */

namespace App\Model;


use Think\Model;

class BookModel extends Model
{
    /**
     * 查询所有书籍
     */
    public $bid;
    public $author;
    public $bname;
    public $price;
    public $collect_count;

    public function queryall(){
        $bookmodel=M("book");
        $data=$bookmodel->select();
        return $data;
    }

    public function query($sql){
        $bookmodel=M("book");
        $data=$bookmodel->where($sql)->select();
        return $data;
    }

    public function update($bid,$bname,$collect_count,$price,$author){
        $bookmodel = M('book');
        $data = array('bname'=>"$bname",'collect_count'=>"$collect_count",'price'=>"$price","author"=>"$author");
        $data = $bookmodel->where("bid=$bid")->save($data);
        return $data;
    }
    public function delete($bid){
        $bookmodel = M('book');
        $data = $bookmodel->where("bid=$bid")->delete();

    }
    public function add($bname,$collect_count,$price,$author){
        $bookmodel = M('book');
        $book = array('bname'=>"$bname",'collect_count'=>"$collect_count",'price'=>"$price","author"=>"$author");
        $data = $bookmodel->data($book)->add();
    }
}