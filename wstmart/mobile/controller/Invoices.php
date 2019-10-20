<?php
namespace wstmart\mobile\controller;
use wstmart\common\model\Invoices as M;
/**
 * ============================================================================
 * WSTMart多用户商城
 * 版权所有 2016-2066 广州商淘信息科技有限公司，并保留所有权利。
 * 官网地址:http://www.wstmart.net
 * 交流社区:http://bbs.shangtao.net
 * 联系QQ:153289970
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！未经本公司授权您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 发票信息控制器
 */
class Invoices extends Base{
    /**
     * 列表
     */
    public function pageQuery(){
    	$m = new M();
    	$rs = $m->pageQuery(5);// 移动版只显示5条发票信息
    	return $rs;
    }
    /**
     * 新增
     */
    public function add(){
    	$m = new M();
    	return $m->add();
    }
    /**
     * 修改
     */
    public function edit(){
    	$m = new M();
    	return $m->edit();
    }
}
