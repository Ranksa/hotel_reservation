<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/26
 * Time: 0:11
 */

namespace Home\Model;


use Think\Model\ViewModel;

class OnlinebookViewModel extends ViewModel
{
    public $viewFields=array(
        'room'=>array('roomid','location','typeid','status'),
        'roomtype'=>array('area','typename','bednum','hasFood','hasNet','hasTV','hasWC','price','leftnum','_on'=>'room.typeid=roomtype.typeid'),
    );
}