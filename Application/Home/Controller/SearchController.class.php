<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/25
 * Time: 14:16
 */

namespace Home\Controller;


use Think\Controller;
use Think\Page;
class SearchController extends  Controller
{
        public function index()
        {

            $this->display();
        }
        public function order_query()
        {
            header("Content-type:text/html;charset=utf-8");
            $search_type=I('post.search-type');
            $keywords=I('post.keywords');
            $data=D('SearchView');
            if($search_type=='cardid')
            {
                $condition['cardid']=array('like',$keywords);
            }
           if($search_type=='phone')
           {
               $condition['phone']=array('like',$keywords);
           }
           if($keywords=='')
            {
                //$this->error('请输入证件号或手机号',U('index'));
                //$this->display('order_query');
                //exit;
            }
            //$data_list=$data->where($condition)->select();
            //dump($search_type);
            //dump($keywords);
            //dump($data_list);
           //$this->assign('list',$data_list);

            $count = $data->where($condition)->count();
            //echo $count;
            $page = new Page($count, 10);

            $list = $data->where($condition )->limit($page->firstRow . ',' . $page->listRows)->select();
            $show = $page->show();
            if($count==0)
            {
                $this->assign('count', '无该查询订单记录');
            }
            else
            {

                $this->assign('count',"共有:".$count."条订单");
            }

            $this->assign('list', $list);
            $this->assign('page', $show);
            $this->display();

        }
}