<?php
namespace wstmart\mobile\model;
use wstmart\common\model\Tags as T;
use think\Db;
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
 * 默认类
 */
class Index extends Base{
	/**
	 * 楼层
	 */
	public function pageQuery(){
		$limit = (int)input('post.currPage');
		if($limit>9)return;
		$cacheData = cache('MO_CATS_ADS'.$limit);
		if($cacheData)return $cacheData;
		$rs = Db::name('goods_cats')->where(['dataFlag'=>1,'isShow'=>1,'parentId'=>0,'isFloor'=>1])->field('catId,catName')->order('catSort asc,catId asc')->limit($limit,1)->select();
		if($rs){
			$rs= $rs[0];
			$t = new T();
			$rs['ads'] = $t->listAds('mo-ads-'.$limit,'1');
			$rs['goods'] = Db::name('goods')->alias('g')->join('__RECOMMENDS__ r','g.goodsId=r.dataId')->join('__GOODS_SCORES__ gs','gs.goodsId=g.goodsId')
			->where(['r.goodsCatId'=>$rs['catId'],'g.isSale'=>1,'g.dataFlag'=>1,'g.goodsStatus'=>1,'r.dataSrc'=>0,'r.dataType'=>1])
			->field('g.goodsId,g.goodsName,g.goodsImg,g.shopPrice,g.marketPrice,g.saleNum,gs.totalScore,gs.totalUsers')->order('r.dataSort asc')->select();
			$rs['currPage'] = $limit;
		}
		cache('MO_CATS_ADS'.$limit,$rs,86400);
		return $rs;
	}

	/**
	* 获取系统消息
	*/
	function getSysMsg($msg='',$order='',$follow='',$history=''){
		$data = [];
		$userId = (int)session('WST_USER.userId');
		if($msg!=''){
			$data['message']['num'] = Db::name('messages')->where(['receiveUserId'=>$userId,'msgStatus'=>0,'dataFlag'=>1])->count();
		}
		if($order!=''){
			$data['order']['waitPay'] = Db::name('orders')->where(['userId'=>$userId,'orderStatus'=>-2,'dataFlag'=>1])->count();
			$data['order']['waitSend'] = Db::name('orders')->where(['userId'=>$userId,'orderStatus'=>0,'dataFlag'=>1])->count();
			$data['order']['waitReceive'] = Db::name('orders')->where(['userId'=>$userId,'orderStatus'=>1,'dataFlag'=>1])->count();
			$data['order']['waitAppraise'] = Db::name('orders')->where(['userId'=>$userId,'orderStatus'=>2,'isAppraise'=>0,'dataFlag'=>1])->count();
		}

		return $data;
	}
}
