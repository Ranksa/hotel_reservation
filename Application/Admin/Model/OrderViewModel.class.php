<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/25
 * Time: 21:41
 */

namespace Admin\Model;


use Think\Model\ViewModel;

class OrderViewModel extends   ViewModel
{
    public  $viewFields=array(
        'orders'=>array('roomid','cardid','entertime','leavetime','linkman','phone','ostatus','oremarks'),
        'roomtype'=>array('typename','price','_on'=>'orders.typeid=roomtype.typeid'),
        'customer'=>array('cardid','cardtype','cname','csex','_on'=>'orders.cardid=customer.cardid'),
    );
}