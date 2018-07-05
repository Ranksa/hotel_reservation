<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/26
 * Time: 14:14
 */

namespace Admin\Model;


use Think\Model;

class RoomModel extends Model
{
    public function add()
    {
        $data=array(
            'roomid'=>$_POST["roomid"],
            'typeid'=>$_POST["typeid"],
            'location'=>$_POST["location"],
            'status'=>$_POST["status"],
            'remarks'=>$_POST["remarks"],

        );
        $arr= D('room')->create($data)->add();
    }
}