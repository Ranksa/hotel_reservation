<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/25
 * Time: 3:39
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Page;
class LobbyController extends Controller
{
        public function lobby()
        {
           R('Index/checkLogin');
                $this->display();
        }


        public function search()
        {
            R('Index/checkLogin');
            $search_type=I('post.search-type');
            $keywords=I('post.keywords');
            $contidion['typename']=array('like',"%$keywords%");
            $contidion1['status']='否';
            $data=D('LobbyView');

            $data_list=$data->where($contidion)->where($contidion1)->where('leftnum>0 and room.roomid not in (select roomid from orders where ostatus=\'是\')')->select();

            if(empty($data_list))
            {
                $this->assign('_empty','无满足条件的记录！');
            }

            //dump($data_list);
            $this->assign('list',$data_list);
            //$this->display();

            //$model = M('User');
            $count = $data->where($contidion)->where($contidion1)->where('leftnum>0 and room.roomid not in (select roomid from orders where ostatus=\'是\')')->count();
            //echo $count;
            $page = new Page($count, 10);
            $show = $page->show();
            $list = $data->where($contidion)->where($contidion1)->where('leftnum>0 and room.roomid not in (select roomid from orders where ostatus=\'是\')')->limit($page->firstRow . ',' . $page->listRows)->select();
            if($count==0)
            {
                $this->assign('count', '酒店已满');
            }
            else
            {

                $this->assign('count',"共有:".$count."条房间信息");
            }
            $this->assign('list', $list);
            $this->assign('page', $show);
            $this->display();
        }



}