<?php
namespace     Home\Model;


use Think\Model\ViewModel;
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/25
 * Time: 23:31
 */
class SearchViewModel extends ViewModel
{
    public  $viewFields=array(
        'orders'=>array('roomid','cardid','entertime','leavetime','linkman','phone','ostatus','oremarks'),
        'roomtype'=>array('typename','_on'=>'orders.typeid=roomtype.typeid'),
    );


}