<?php


namespace app\mip\controller;


use app\BaseController;
use think\facade\Env;
use think\facade\View;

class Base extends BaseController
{
    protected $prefix;
    protected $redis_prefix;
    protected $uid;
    protected $end_point;
    protected $tpl;

    protected function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->uid = session('xwx_user_id');
        $this->prefix = Env::get('database.prefix');
        $this->redis_prefix = Env::get('cache.prefix');
        $this->end_point = config('seo.book_end_point');
        $tpl_root = './template/mip/';
        $controller = strtolower($this->request->controller());
        $action = strtolower($this->request->action());
        $this->tpl = $tpl_root.$controller.'/'.$action.'.html';
        View::assign([
            'url' => config('site.domain'),
            'site_name' => config('site.site_name'),
            'mobile_url' => config('site.mobile_domain'),
            'mip_url' => config('site.mip_domain'),
            'book_ctrl' => BOOKCTRL,
            'chapter_ctrl' => CHAPTERCTRL,
            'booklist_act' => BOOKLISTACT,
            'search_ctrl' => SEARCHCTRL,
            'rank_ctrl' => RANKCTRL,
            'update_act' => UPDATEACT,
            'author_ctrl' => AUTHORCTRL,
            'end_point' => config('seo.book_end_point'),
        ]);
    }
}