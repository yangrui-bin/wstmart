<?php
namespace wstmart\mobile\controller;
use think\Db;
use wstmart\common\model\GoodsCats;
use wstmart\common\model\Attributes as AT;
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
 * 商品控制器
 */
class Goods extends Base{
	/**
	 * 商品主页
	 */
	public function detail(){
        $root = WSTDomain();
		$m = model('goods');
        $goods = $m->getBySale(input('goodsId/d'));
        // 找不到商品记录
        if(empty($goods))return $this->fetch('error_lost');
        hook('mobileControllerGoodsIndex',['getParams'=>input()]);
        // 分类信息
        $catInfo = Db::name("goods_cats")->field("mobileDetailTheme")->where(['catId'=>$goods['goodsCatId'],'dataFlag'=>1])->find();
        $goods['consult'] = model('GoodsConsult')->firstQuery($goods['goodsId']);
        $goods['appraises'] = model('GoodsAppraises')->getGoodsEachApprNum($goods['goodsId']);
		$this->assign("info", $goods);
		return $this->fetch($catInfo['mobileDetailTheme']);
	}
    /**
     * 搜索商品列表
     */
    public function search(){
        $this->assign("keyword", input('keyword'));
        $this->assign("minPrice", input('minPrice/d'));
        $this->assign("maxPrice", input('maxPrice/d'));
        $this->assign("brandId", input('brandId/d'));
        return $this->fetch('goods_search');
    }
	/**
     * 商品列表
     */
    public function lists(){
        $catId = input('cat/d');
    	$this->assign("keyword", input('keyword'));
    	$this->assign("catId", $catId);
        $this->assign("minPrice", input('minPrice/d'));
        $this->assign("maxPrice", input('maxPrice/d'));
    	$this->assign("brandId", input('brandId/d'));
        // 分类信息
        $catInfo = Db::name("goods_cats")->field("catName,seoTitle,seoKeywords,seoDes,mobileCatListTheme")->where(['catId'=>$catId,'dataFlag'=>1])->find();
        $this->assign("catInfo",$catInfo);
        return $this->fetch($catInfo['mobileCatListTheme']?$catInfo['mobileCatListTheme']:'goods_list');
    }
    /**
     * 获取列表
     */
    public function pageQuery(){
    	$m = model('goods');
    	$gc = new GoodsCats();
    	$catId = (int)input('catId');
        $data = []; 
    	if($catId>0){
    		$goodsCatIds = $gc->getParentIs($catId);
    	}else{
    		$goodsCatIds = [];
    	}

        //处理已选属性
        $vs = input('vs');
        $vs = ($vs!='')?explode(',',$vs):[];
        $data['arvs'] = $vs;
        $data['vs'][] = implode(',',$vs);

        $at = new AT();
        $goodsFilter = $at->listQueryByFilter((int)input('catId/d'));
        $ngoodsFilter = [];
        if(!empty($vs)){
            // 存在筛选条件,取出符合该条件的商品id,根据商品id获取可选属性进行拼凑
            $goodsId = model('goods')->filterByAttributes();

            $attrs = model('Attributes')->getAttribute($goodsId);
            // 去除已选择属性
            foreach ($attrs as $key =>$v){
                if(!in_array($v['attrId'],$vs)){$ngoodsFilter[] = $v;}
            }
        }else{
            // 当前无筛选条件,取出分类下所有属性
            foreach ($goodsFilter as $key =>$v){
                if(!in_array($v['attrId'],$vs))$ngoodsFilter[] = $v;
            }
        }
        $data['goodsPage'] = $m->pageQuery($goodsCatIds);
        foreach ($ngoodsFilter as $k => $val) {
           $result = array_values(array_unique($ngoodsFilter[$k]['attrVal']));

           $ngoodsFilter[$k]['attrVal'] = $result;
        }
        $data['goodsFilter'] = $ngoodsFilter;

    	foreach ($data['goodsPage']['data'] as $key =>$v){
    		$data['goodsPage']['data'][$key]['goodsImg'] = WSTImg($v['goodsImg'],3,'goodsLogo');
    		$data['goodsPage']['data'][$key]['praiseRate'] = ($v['totalScore']>0)?(sprintf("%.2f",$v['totalScore']/($v['totalUsers']*15))*100).'%':'100%';
    	}
    	return $data;
    }

    /**
    * 浏览历史页面
    */
    public function history(){
        return $this->fetch('users/history/list');
    }
    /**
    * 获取浏览历史
    */
    public function historyQuery(){
        $rs = model('goods')->historyQuery();
        if(!empty($rs)){
	        foreach($rs['data'] as $k=>$v){
	            $rs['data'][$k]['goodsImg'] = WSTImg($v['goodsImg'],3,'goodsLogo');
	        }
        }
        return $rs;
    }
}
