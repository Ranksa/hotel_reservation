<?php
namespace Admin\Model;
use Think\Model\ViewModel;
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/25
 * Time: 19:30
 */
class LobbyViewModel extends ViewModel
{
    public $viewFields=array(
        'room'=>array('roomid','location','typeid','status','remarks'),
        'roomtype'=>array('area','typename','bednum','hasFood','hasNet','hasTV','hasWC','price','leftnum','_on'=>'room.typeid=roomtype.typeid'),




    //room.id,roomtype.id,roomtype.name,room.location,roomtype.area,roomtype.bednum,roomtype.hasFood,roomtype.hasNet,roomtype.hasTV,roomtype.hasWC,roomtype.price
    );
}