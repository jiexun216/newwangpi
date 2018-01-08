<?php
// +----------------------------------------------------------------------
// | Tplay [ WE ONLY DO WHAT IS NECESSARY ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://tplay.pengyichen.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 听雨 < 389625819@qq.com >
// +----------------------------------------------------------------------


namespace app\admin\controller;

use app\admin\controller\User;
use \think\Db;
use app\admin\model\Article as articleModel;
class Goods extends User
{
    public function index()
    {
        $model = new articleModel();
        $articles = $model->select();
        //添加最后修改人的name
        foreach ($articles as $key => $value) {
            $articles[$key]['edit_admin'] = Db::name('admin')->where('id',$value['edit_admin_id'])->value('nickname');
        }
        $this->assign('articles',$articles);
        return $this->fetch();
    }

}
