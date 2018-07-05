<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/27
 * Time: 14:08
 */

namespace Admin\Model;


use Think\Model\ViewModel;

class CheckViewModel extends ViewModel
{
    public  $viewFields=array(
        'orders'=>array('orderid','roomid','cardid','entertime','leavetime','linkman','phone','ostatus','oremarks','typeid','datenum'),
        'customer'=>array('cardid','cardtype','cname','csex','_on'=>'orders.cardid=customer.cardid'),
    );
}