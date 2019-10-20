<?php /*a:5:{s:71:"D:\root\wstmart_v3.1.0_190930\wstmart\home\view\default\settlement.html";i:1569318613;s:65:"D:\root\wstmart_v3.1.0_190930\wstmart\home\view\default\base.html";i:1569401707;s:64:"D:\root\wstmart_v3.1.0_190930\wstmart\home\view\default\top.html";i:1569318613;s:67:"D:\root\wstmart_v3.1.0_190930\wstmart\home\view\default\header.html";i:1569318613;s:67:"D:\root\wstmart_v3.1.0_190930\wstmart\home\view\default\footer.html";i:1566974145;}*/ ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>我的购物车 - <?php echo WSTConf('CONF.mallName'); ?></title>

<link href="__STYLE__/css/common.css?v=<?php echo $v; ?>" rel="stylesheet">
<link rel="stylesheet" href="/wstmart_v3.1.0_190930/static/plugins/font-awesome/css/font-awesome.min.css" type="text/css" />

<link href="__STYLE__/css/carts.css?v=<?php echo $v; ?>" rel="stylesheet">

<script type="text/javascript" src="/wstmart_v3.1.0_190930/static/js/jquery.min.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="/wstmart_v3.1.0_190930/static/plugins/layer/layer.js?v=<?php echo $v; ?>"></script>	
<script type='text/javascript' src='/wstmart_v3.1.0_190930/static/js/common.js?v=<?php echo $v; ?>'></script>

<script type='text/javascript' src='__STYLE__/js/common.js?v=<?php echo $v; ?>'></script>


<?php if(((int)session('WST_USER.userId')<=0)): ?>
<link href="/wstmart_v3.1.0_190930/static/plugins/validator/jquery.validator.css?v=<?php echo $v; ?>" rel="stylesheet">
<link href="__STYLE__/css/login.css?v=<?php echo $v; ?>" rel="stylesheet">
<script type="text/javascript" src="/wstmart_v3.1.0_190930/static/plugins/validator/jquery.validator.min.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="/wstmart_v3.1.0_190930/static/js/rsa.js"></script>
<script type='text/javascript' src='__STYLE__/js/login.js?v=<?php echo $v; ?>'></script>
<?php endif; ?>
<script>
window.conf = {"ROOT":"/wstmart_v3.1.0_190930","APP":"/wstmart_v3.1.0_190930/index.php","STATIC":"/wstmart_v3.1.0_190930/static","SUFFIX":"<?php echo config('url_html_suffix'); ?>","SMS_VERFY":"<?php echo WSTConf('CONF.smsVerfy'); ?>","SMS_OPEN":"<?php echo WSTConf('CONF.smsOpen'); ?>","GOODS_LOGO":"<?php echo WSTConf('CONF.goodsLogo'); ?>","SHOP_LOGO":"<?php echo WSTConf('CONF.shopLogo'); ?>","MALL_LOGO":"<?php echo WSTConf('CONF.mallLogo'); ?>","USER_LOGO":"<?php echo WSTConf('CONF.userLogo'); ?>","IS_LOGIN":"<?php if((int)session('WST_USER.userId')>0): ?>1<?php else: ?>0<?php endif; ?>","TIME_TASK":"1","ROUTES":'<?php echo WSTRoute(); ?>',"IS_CRYPT":"<?php echo WSTConf('CONF.isCryptPwd'); ?>","HTTP":"<?php echo WSTProtocol(); ?>","MAP_KEY":"<?php echo WSTConf('CONF.mapKey'); ?>",'RESOURCE_PATH':'<?php echo WSTConf('CONF.resourcePath'); ?>'}
$(function() {
	WST.initVisitor();
});
</script>
</head>

<body>

	
<?php $wstTagAds =  model("common/Tags")->listAds("index-top-ads",99,86400); foreach($wstTagAds as $key=>$tads){if(($tads['adFile']!='')): ?>
<div class="index-top-ads">
  <a href="<?php echo $tads['adURL']; ?>" <?php if(($tads['isOpen'])): ?>target='_blank'<?php endif; if(($tads['adURL']!='')): ?>onclick="WST.recordClick(<?php echo $tads['adId']; ?>)"<?php endif; ?> onfocus="this.blur();">
    <img src="__RESOURCE_PATH__/<?php echo $tads['adFile']; ?>"></a>
  <a href="javascript:;" class="close-ads" onclick="WST.closeAds(this)"></a>
</div>
<?php endif; } ?>

<div class="wst-header">
    <div class="wst-nav">
		<ul class="headlf">
		<?php if(session('WST_USER.userId') >0): ?>
		   <li class="drop-info">
			  <div class="drop-infos">
			  <a href="<?php echo Url('home/users/index'); ?>">欢迎您，<?php echo session('WST_USER.userName')?session('WST_USER.userName'):session('WST_USER.loginName'); ?></a>
			  </div>
			  <div class="wst-tag dorpdown-user">
			  	<div class="wst-tagt">
			  	   <div class="userImg" >
				  	<img class='usersImg' data-original="<?php echo WSTUserPhoto(session('WST_USER.userPhoto')); ?>"/>
				   </div>	
				  <div class="wst-tagt-n">
				    <div style="height: 30px;overflow: hidden;">
					  	<span class="wst-tagt-na"><?php echo session('WST_USER.userName')?session('WST_USER.userName'):session('WST_USER.loginName'); ?></span>
					  	<?php if((int)session('WST_USER.rankId') > 0): $rankName = session('WST_USER.rankName');?>
					  		<img src="__RESOURCE_PATH__/<?php echo session('WST_USER.userrankImg'); ?>" title="<?php echo WSTStripTags($rankName); ?>"/>
					  	<?php endif; ?>
				  	</div>
				  	<div class='wst-tags'>
			  	     <span class="w-lfloat"><a onclick='WST.position(15,0)' href='<?php echo Url("home/users/edit"); ?>'>用户资料</a></span>
			  	     <span class="w-lfloat" style="margin-left:10px;"><a onclick='WST.position(16,0)' href='<?php echo Url("home/users/security"); ?>'>安全设置</a></span>
			  	    </div>
				  </div>
			  	  <div class="wst-tagb" >
			  		<a onclick='WST.position(5,0)' href='<?php echo Url("home/orders/waitReceive"); ?>'>待收货订单</a>
			  		<a onclick='WST.position(60,0)' href='<?php echo Url("home/logmoneys/usermoneys"); ?>'>我的余额</a>
			  		<a onclick='WST.position(49,0)' href='<?php echo Url("home/messages/index"); ?>'>我的消息</a>
			  		<a onclick='WST.position(13,0)' href='<?php echo Url("home/userscores/index"); ?>'>我的积分</a>
			  		<a onclick='WST.position(41,0)' href='<?php echo Url("home/favorites/goods"); ?>'>我的关注</a>
			  		<a style='display:none'>咨询回复</a>
			  	  </div>
			  	<div class="wst-clear"></div>
			  	</div>
			  </div>
			</li>
			<li class="spacer">|</li>
			<li class="drop-info">
			<a href='<?php echo Url("home/messages/index"); ?>' target='_blank' onclick='WST.position(49,0)'>消息（<span id='wst-user-messages'>0</span>）</a>
			</li>
			<li class="spacer">|</li>
			<li class="drop-info">
			  <div><a href="javascript:WST.logout();">退出</a></div>
			</li>
			<?php else: ?>
			<li class="drop-info">
			  <div>欢迎来到<?php echo WSTMSubstr(WSTConf('CONF.mallName'),0,13); ?><a href="<?php echo Url('home/users/login'); ?>" onclick="WST.currentUrl();">&nbsp;&nbsp;请&nbsp;登录</a></div>
			</li>
			<li class="spacer">|</li>
			<li class="drop-info">
			  <div><a href="<?php echo Url('home/users/regist'); ?>" onclick="WST.currentUrl();">免费注册</a></div>
			</li>
			<?php endif; ?>
		</ul>
		<ul class="headrf" style='float:right;'>
		    <li class="j-dorpdown" style="width: 86px;">
				<div class="drop-down drop-down6 pdr5">
					<a href="<?php echo Url('home/users/index'); ?>" target="_blank">我的订单<i class="di-right"><s>◇</s></i></a>
				</div>
				<div class='j-dorpdown-layer order-list'>
				   <div><a href='<?php echo Url("home/orders/waitPay"); ?>' onclick='WST.position(3,0)'>待付款订单</a></div>
				   <div><a href='<?php echo Url("home/orders/waitReceive"); ?>' onclick='WST.position(5,0)'>待发货订单</a></div>
				   <div><a href='<?php echo Url("home/orders/waitAppraise"); ?>' onclick='WST.position(6,0)'>待评价订单</a></div>
				</div>
			</li>	
			<?php if((WSTDatas('ADS_TYPE',4))): ?>
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down1 pdr5"><i class="di-left"></i><a href="#" target="_blank">手机商城</a></div>
				<div class='j-dorpdown-layer sweep-list'>
				   <div class="qrcodea">
					   <div id='qrcodea' class="qrcodeal"></div>
					   <div class="qrcodear">
					   	<p>扫描二维码</p><span>下载手机客户端</span>
					   	<br/>
					   	<a href="<?php echo url('home/index/download'); ?>" target="_blank">Android</a>
					   	<br/>
					   	<a href="<?php echo url('home/index/download'); ?>" target="_blank">iPhone</a>
					   </div>
				   </div>
				</div>
			</li>
			<?php endif; if((WSTConf('CONF.wxenabled')==1)): ?>
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down3 pdr5"><a href="#" target="_blank">关注我们</a></div>
				<div class='j-dorpdown-layer des-list' style="width:120px;">
					<div style="height:114px;"><?php if((WSTConf('CONF.wxAppLogo'))): ?><img src="__RESOURCE_PATH__/<?php echo WSTConf('CONF.wxAppLogo'); ?>" style="height:114px;"><?php endif; ?></div>
					<div>关注我们</div>
				</div>
			</li>
			<?php endif; ?>
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down5 pdr5"><a href="#" target="_blank">我的收藏</a></div>
				<div class='j-dorpdown-layer foucs-list'>
				   <div><a href="<?php echo Url('home/favorites/goods'); ?>" onclick='WST.position(41,0)'>商品收藏</a></div>
				   <div><a href="<?php echo Url('home/favorites/shops'); ?>" onclick='WST.position(46,0)'>店铺收藏</a></div>
				</div>
			</li>
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down2 pdr5" ><a href="#" target="_blank"> 客户服务</a></div>
				<div class='j-dorpdown-layer des-list'>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=1"); ?>' target='_blank'>帮助中心</a></div>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=8"); ?>' target='_blank'>售后服务</a></div>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=3"); ?>' target='_blank'>常见问题</a></div>
				   <div><a href='<?php echo Url("home/feedbacks/index"); ?>' target='_blank'>功能反馈</a></div>
				</div>
			</li>
			<li class="spacer">|</li>
			<?php if(session('WST_USER.userId') > 0 && session('WST_USER.userType') == 1): ?>
			<li style='width:78px;text-align: center'><a target="_blank" href="<?php echo Url('shop/index/index'); ?>" rel="nofollow">商家中心</a></li>
            <?php else: ?>
			<li class="j-dorpdown">
				<div class="drop-down drop-down4 pdr5" ><a href="#" target="_blank">商家管理<i class="di-right"><s>◇</s></i></a></div>
				<div class='j-dorpdown-layer foucs-list'>
				   <div><a href="<?php echo url('shop/index/login'); ?>" target="_blank">商家登录</a></div>
				   <div><a href="<?php echo url('home/shops/join'); ?>" rel="nofollow" onclick="WST.currentUrl('<?php echo url("home/shops/join"); ?>');">商家入驻</a></div>
				</div>
				</li>
            <?php endif; ?>
		</ul>
		<div class="wst-clear"></div>
  </div>
</div>
<script>
$(function(){
	//二维码
	//参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
	var a = qrcode(8, 'H');
	var url = window.location.host+window.conf.APP;
	a.addData(url);
	a.make();
	$('#qrcodea').html(a.createImgTag());
});
function goShop(id){
  location.href=WST.U('home/shops/index','shopId='+id);
}
</script>
<script type='text/javascript' src='__STYLE__/js/qrcode.js'></script>


	<div class='wst-search-container'>
   <div class='wst-logo'>
    <?php $mallName = WSTConf('CONF.mallName'); ?>
   <a href='<?php echo app('request')->root(true); ?>' title="<?php echo WSTStripTags($mallName); ?>" >
      <img src="__RESOURCE_PATH__/<?php echo WSTConf('CONF.mallLogo'); ?>" height="120" width='240' title="<?php echo WSTStripTags($mallName); ?>" alt="<?php echo WSTStripTags($mallName); ?>">
   </a>
   </div>
   <div class="wst-search-box">
      <div class='wst-search'>
      	  <input type="hidden" id="search-type" value="<?php echo isset($keytype)?1:0; ?>"/>
          <ul class="j-search-box">
        	  <li class="j-search-type">
              搜<span><?php if(isset($keytype)): ?>店铺<?php else: ?>商品<?php endif; ?></span>&nbsp;<i class="arrow"> </i>
            </li>
        	  <li class="j-type-list">
        	  <?php if(isset($keytype)): ?>
              <div data="0">商品</div>
              <?php else: ?>
        	  <div data="1">店铺</div>
              <?php endif; ?>
        	  </li>
          </ul>
	      <input type="text" id='search-ipt' class='search-ipt' placeholder='<?php echo WSTConf("CONF.adsGoodsWordsSearch"); ?>' value='<?php echo isset($keyword)?$keyword:""; ?>'/>
	      <input type='hidden' id='adsGoodsWordsSearch' value='<?php echo WSTConf("CONF.adsGoodsWordsSearch"); ?>'>
	      <input type='hidden' id='adsShopWordsSearch' value='<?php echo WSTConf("CONF.adsShopWordsSearch"); ?>'>
	      <div id='search-btn' class="search-btn" onclick='javascript:WST.search(this.value)'>搜索</div>
      </div>
      <div class="wst-search-keys">
      <?php $searchKeys = WSTSearchKeys(); if(is_array($searchKeys) || $searchKeys instanceof \think\Collection || $searchKeys instanceof \think\Paginator): $i = 0; $__LIST__ = $searchKeys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <a href='<?php echo Url("home/goods/search","keyword=".$vo); ?>'><?php echo $vo; ?></a>
       <?php if($i< count($searchKeys)): ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif; ?>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
   </div>
   <div class="wst-cart-box">
   <a href="<?php echo url('home/carts/index'); ?>" target="_blank" onclick="WST.currentUrl('<?php echo url("home/carts/index"); ?>');"><span class="word j-word">我的购物车<span class="num" id="goodsTotalNum" style='display:none'>0</span></span></a>
   	<div class="wst-cart-boxs hide">
   		<div id="list-carts"></div>
   		<div id="list-carts2"></div>
   		<div id="list-carts3"></div>
	   	<div class="wst-clear"></div>
   	</div>
   </div>

<script id="list-cart" type="text/html">
{{# for(var i = 0; i < d.list.length; i++){ }}
	<div class="goods" id="j-goods{{ d.list[i].cartId }}">
	   	<div class="imgs"><a href="{{ WST.U('home/goods/detail','goodsId='+d.list[i].goodsId) }}"><img class="goodsImgc" data-original="__RESOURCE_PATH__/{{ d.list[i].goodsImg }}" title="{{ d.list[i].goodsName }}"></a></div>
	   	<div class="number"><p><a  href="{{ WST.U('home/goods/detail','goodsId='+d.list[i].goodsId) }}">{{WST.cutStr(d.list[i].goodsName,26)}}</a></p><p>数量：{{ d.list[i].cartNum }}</p></div>
	   	<div class="price"><p>￥{{ d.list[i].shopPrice }}</p><span><a href="javascript:WST.delCheckCart({{ d.list[i].cartId }})">删除</a></span></div>
	</div>
{{# } }}
</script>
</div>
<div class="wst-clear"></div>

<div class="wst-nav-menus">
   <div class="nav-w" style="position: relative;">
      <div class="w-spacer"></div>
      <div class="dorpdown <?php if(isset($hideCategory)): ?>j-index<?php endif; ?>" id="wst-categorys">
         <div class="dt j-cate-dt">
             <a href="javascript:void(0)">全部商品分类</a>
         </div>
         <div class="dd j-cate-dd" <?php if(!isset($hideCategory)): ?>style="display:none" <?php endif; ?>>
            <div class="dd-inner">
                 <?php $_result=WSTSideCategorys();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $k = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                 <div id="cat-icon-<?php echo $k; ?>" class="item fore1 <?php if(($key>=12)): ?>over-cat<?php endif; ?>">
                     <span class="arrow"></span>
                     <h3>
                      <div class="<?php if(($key>=12)): ?> over-cat-icon <?php else: ?> cat-icon-<?php echo $k; ?> <?php endif; ?>"></div>
                      <a href="<?php echo Url('home/goods/lists','cat='.$vo['catId']); ?>" target="_blank"><?php echo $vo['catName']; ?></a>
                     </h3> 
                 </div>
                 <?php endforeach; endif; else: echo "" ;endif; ?>
             </div>
             <div style="display: none;" class="dorpdown-layer" id="index_menus_sub">
                 <?php $_result=WSTSideCategorys();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $k = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                  <div class="item-sub" i="<?php echo $k; ?>">
                      <div class="item-brands">
                           <div class="brands-inner">
                            <?php $wstTagBrand =  model("common/Tags")->listBrand($vo['catId'],6,86400); foreach($wstTagBrand as $key=>$bvo){?>
                              <a target="_blank" class="img-link" href="<?php echo url('home/goods/lists',['cat'=>$bvo['catId'],'brand'=>$bvo['brandId']]); ?>">
                                  <img width="83" height="65" class='categeMenuImg' data-original="__RESOURCE_PATH__/<?php echo $bvo['brandImg']; ?>">
                              </a>
                            <?php } ?>
                            <div class="wst-clear"></div>
                            </div>
                            <div class='shop-inner'>
                            <?php $wstTagShop =  model("common/Tags")->listShop($vo['catId'],4,86400); foreach($wstTagShop as $key=>$bvo){?>
                              <a target="_blank" class="img-link" href="<?php echo url('home/shops/index',['shopId'=>$bvo['shopId']]); ?>">
                                  <img width="83" height="65" class='categeMenuImg' data-original="__RESOURCE_PATH__/<?php echo $bvo['shopImg']; ?>">
                              </a>
                            <?php } ?>
                            <div class="wst-clear"></div>
                            </div>
                       </div>

                       <div class="subitems">
                          <?php if(isset($vo['list'])){ if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                           <dl class="fore2">
                               <dd>
                                  <a 
                                    class="cat2_tit"
                                    target="_blank" 
                                    href="<?php echo Url('home/goods/lists','cat='.$vo2['catId']); ?>">
                                    <?php echo $vo2['catName']; ?>
                                    <i>&gt;</i>
                                  </a>
                                  <?php if(isset($vo2['list'])){ if(is_array($vo2['list']) || $vo2['list'] instanceof \think\Collection || $vo2['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo2['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
                                  <a target="_blank" href="<?php echo Url('home/goods/lists','cat='.$vo3['catId']); ?>"><?php echo $vo3['catName']; ?></a>
                                  <?php endforeach; endif; else: echo "" ;endif; } ?>
                                  <div class="wst-clear"></div>
                               </dd>
                            </dl>
                           <?php endforeach; endif; else: echo "" ;endif; } ?>
                        </div>
                  </div>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
             </div>
        </div>
      </div>
      
      <div id="wst-nav-items">
           <ul>
               <?php $_result=WSTNavigations(0);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
               <li class="fore1">
                    <a href="<?php echo $vo['navUrl']; ?>" <?php if($vo['isOpen']==1): ?>target="_blank"<?php endif; ?>><?php echo $vo['navTitle']; ?></a>
               </li>
               <?php endforeach; endif; else: echo "" ;endif; ?>
           </ul>
      </div>
      <script>
          $(document).keypress(function(e) { 
          if(layerMapIndex == 0 && e.which == 13) {  
            $('#search-btn').click();  
          }
        }); 
      </script>
</div>
<div class="wst-clear"></div>
</div>



<div class="wst-container">
	<div id="stepflex" class="stepflex">
       <dl class="first doing">
          <dt class="s-num">1</dt>
          <dd class="s-text">我的购物车</dd>
          <dd></dd>
       </dl>
       <dl class="normal doing">
          <dt class="s-num">2</dt>
          <dd class="s-text">填写核对订单信息</dd>
       </dl>
       <dl class="last">
          <dt class="s-num1">3</dt>
          <dd class="s-text1">成功提交订单</dd>
       </dl>
    </div>
    <div class='wst-clear'></div>
    <div class='main-head'>填写并核对订单</div>
    <input type='hidden' class='j-ipt' id='s_addressId' value='<?php if(isset($userAddress["addressId"])): ?><?php echo $userAddress["addressId"]; ?><?php endif; ?>'/>
    <input type='hidden' class='j-ipt' id='s_areaId' value='<?php if(isset($userAddress["addressId"])): ?><?php echo $userAddress["areaId2"]; ?><?php endif; ?>'/>
    <!-- 用户地址 -->
    <div class='address-box'>
       <div class='box-head'>收货人信息 <a class="add-addr" href="javascript:;" onclick="javascript:emptyAddress(this,1)">新增收货地址</a></div>
       <!-- 选中地址 -->
       <div class='j-show-box <?php if(empty($userAddress)): ?>hide<?php endif; ?>' >
          <div id="s_userName" class="wst-frame1 j-selected"><?php if(isset($userAddress["addressId"])): ?><?php echo $userAddress['userName']; ?><?php endif; ?><i></i></div>
          <div class="address" onmouseover="addrBoxOver(this)" onmouseout="addrBoxOut(this)">
	          <span id='s_address'>
	          <?php if(isset($userAddress["addressId"])): ?>
	          <?php echo $userAddress['userName']; ?>&nbsp;&nbsp;&nbsp;<?php echo $userAddress['areaName']; ?>&nbsp;&nbsp;<?php echo $userAddress['userAddress']; ?>&nbsp;&nbsp;<?php echo $userAddress['userPhone']; ?>
	          <?php endif; ?>
	          </span>
	          &nbsp;&nbsp;
	          <span id="isdefault" <?php if((isset($userAddress['isDefault'])&&($userAddress['isDefault']==1))): ?> class="j-default">默认地址<?php else: ?> ><?php endif; ?></span>
            <div class="operate-box">
              <a href="javascript:void(0)" onclick="javascript:toEditAddress(<?php if(isset($userAddress["addressId"])): ?><?php echo $userAddress["addressId"]; ?><?php endif; ?>,this,1,1,1)">编辑</a>&nbsp;&nbsp;
            </div>
          </div>
                    
          <div class='wst-clear'></div>

          <div class="address">
            <a class="wst-lfloat" href='javascript:void(0)' onclick='javascript:showEditAddressBox()' style=''>更多地址</a>
          </div>

       </div>
       <!-- 地址列表  -->
       <ul class='j-list-box hide' id='addressList'></ul>

       <!-- 新增编辑地址 -->
       <div class='j-edit-box <?php if(!empty($userAddress)): ?>hide<?php endif; ?>'>
          <form id='addressForm' autocomplete='off'>
            <input type='hidden' class='j-eipt' id='addressId' value=''/>
            <div class='rows'>
                <div class='label'>收货人<font color='red'>*</font>：</div>
                <div class='field'><input type='text' class='j-eipt' id='userName' maxLength='25'/></div>
                <div class='wst-clear'></div>
            </div>
            <div class='rows'>
                <div class='label'>收货地址<font color='red'>*</font>：</div>
                <div class='field'>
                <select id="area_0" class='j-areas' level="0" onchange="WST.ITAreas({id:'area_0',val:this.value,isRequire:true,className:'j-areas'});">
			      	<option value="">-请选择-</option>
			      	<?php if(is_array($areaList) || $areaList instanceof \think\Collection || $areaList instanceof \think\Paginator): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			        <option value="<?php echo $vo['areaId']; ?>"><?php echo $vo['areaName']; ?></option>
			        <?php endforeach; endif; else: echo "" ;endif; ?>
			    </select>
                <input type='text' class='j-eipt' id='userAddress' style='width:300px' maxLength='200'/>
                </div>
                <div class='wst-clear'></div>
            </div>
            <div class='rows'>
                <div class='label'>联系电话<font color='red'>*</font>：</div>
                <div class='field'><input type='text' id='userPhone' class='j-eipt' name="addrUserPhone" maxLength='50'/>  </div>
                <div class='wst-clear'></div>
            </div>
            <div class='rows'>
                <div class='label'>是否默认地址<font color='red'>*</font>：</div>
                <div class='radio-box'>
	                <label style='margin-right:36px;'>
	                   <input type='radio' name='isDefault' value='1' checked class='j-eipt wst-radio' id="isDefault1"/><label class="mt-1" for="isDefault1"></label>是
	                </label>
	                <label>
	                   <input type='radio' name='isDefault' value='0' class='j-eipt wst-radio' id="isDefault2"/><label class="mt-1" for="isDefault2"></label>否
	                </label>
                </div>
                <div class='wst-clear'></div>
            </div>
            <div class='rows'>
                <a href='javascript:void(0)' class='wst-cart-reda' id='saveAddressBtn' onclick='javascript:editAddress()' style='width:105px;line-height:33px;padding:6px 15px'>保存收货人地址</a>
            </div>
          </form>
       </div>
    </div>
    <!-- 支付方式 -->
    <div class='pay-box'>
       <div class='box-head'>支付方式</div>
       <div class="wst-list-box">
          <?php if(!empty($payments['0'])): ?> 
          <div class="wst-frame2 j-selected" onclick="javascript:changeSelected(0,'payType',this)">货到付款<i></i></div>
          <?php endif; if(!empty($payments['1'])): ?>  
          <div class="wst-frame2 <?php echo empty($payments['0'])?'j-selected':''; ?>" onclick="javascript:changeSelected(1,'payType',this)">在线支付<i></i></div>
          <?php endif; ?>
          <input type='hidden' value="<?php echo empty($payments['0'])?1:0; ?>" id='payType' class='j-ipt' />
          <div class='wst-clear'></div>
       </div>
    </div>
    <!-- 商品清单 -->
    <div class='cart-box2'>
       <div class='box-head2'>商品清单</div>
       <div class='cart-head2'>
          <div class='goods2'>商品</div>
          <div class='price2'>单价</div>
          <div class='num2'>数量</div>
          <div class='t-price2'>总价</div>
       </div>
       <?php $shopFreight = 0; if(is_array($carts["carts"]) || $carts["carts"] instanceof \think\Collection || $carts["carts"] instanceof \think\Paginator): $i = 0; $__LIST__ = $carts["carts"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;
       if($vo['isFreeShipping']){
          $freight = 0;
       }else{
          if(!empty($userAddress)){
             $freight = WSTOrderFreight($vo['shopId'],$userAddress['areaId2'],$vo);
          }else{
             $freight = 0;
          }
       }
       $shopFreight = $shopFreight + $freight;
        ?>
       <div class='cart-item j-shop' dataval='<?php echo $vo['shopId']; ?>'>
          <div class='shop2'>
          <?php echo $vo['shopName']; if($vo['shopQQ'] !=''): ?>
          <a href="tencent://message/?uin=<?php echo $vo['shopQQ']; ?>&Site=QQ交谈&Menu=yes">
			  <img border="0" src="<?php echo WSTProtocol(); ?>wpa.qq.com/pa?p=1:<?php echo $vo['shopQQ']; ?>:7" alt="QQ交谈" width="71" height="24"/>
		  </a>
          <?php endif; if($vo['shopWangWang'] !=''): ?>
          <a target="_blank" href="<?php echo WSTProtocol(); ?>www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $vo['shopWangWang']; ?>&siteid=cntaobao&status=1&charset=utf-8">
			  <img border="0" src="<?php echo WSTProtocol(); ?>amos.alicdn.com/realonline.aw?v=2&uid=<?php echo $vo['shopWangWang']; ?>&site=cntaobao&s=1&charset=utf-8" alt="和我联系" />
		  </a>
          <?php endif; ?>
          </div>
          <?php echo hook('homeDocumentSettlementShopPromotion',['shop'=>$vo]); ?>
          <div class='goods-list'>
             <?php if(is_array($vo["list"]) || $vo["list"] instanceof \think\Collection || $vo["list"] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
             <?php echo hook('homeDocumentSettlementGoodsPromotion',['goods'=>$vo2]); ?>
             <div class='item selected j-g<?php echo $vo2["cartId"]; ?>'>
		        <div class='goods2'>
		            <div class='img2'>
		                <a href='<?php echo Url("home/goods/detail","goodsId=".$vo2["goodsId"]); ?>' target='_blank'>
			            <img src='__RESOURCE_PATH__/<?php echo $vo2["goodsImg"]; ?>' width='80' height='80' title='<?php echo WSTStripTags($vo2["goodsName"]); ?>'/>
			            </a>
		            </div>
		            <div class='name2'><?php echo $vo2["goodsName"]; ?></div>
		            <div class='spec2'>
		            <?php if(is_array($vo2["specNames"]) || $vo2["specNames"] instanceof \think\Collection || $vo2["specNames"] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo2["specNames"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$specs): $mod = ($i % 2 );++$i;?>
		            <div><?php echo $specs['catName']; ?>：<?php echo $specs['itemName']; ?></div>
		            <?php endforeach; endif; else: echo "" ;endif; ?>
		            </div>
		        </div>
		        <div class='price2'>¥<?php echo $vo2['shopPrice']; ?></div>
		        <div class='num2'><?php echo $vo2['cartNum']; ?></div>
		        <div class='t-price2'>¥<?php echo $vo2['shopPrice']*$vo2['cartNum']; ?></div>
		        <div class='wst-clear'></div>
             </div>
             <?php endforeach; endif; else: echo "" ;endif; ?>
             <div class='shop-remark selected2'>
              <div class='shop-remark-box'>
                 订单备注：<input type='text' id="remark_<?php echo $vo['shopId']; ?>" class='j-ipt' style='width:420px' maxLength='100' placeholder='给卖家留言'/>
              </div>
              <div class='shop-summary'>
               <?php if(!empty($vo['coupons'])): ?>
                <?php echo hook('homeDocumentSettlementShopSummary',['coupons'=>$vo['coupons'],'shopId'=>$vo['shopId']]); else: ?>
                  <input type='hidden'  class='j-ipt' id='couponId_<?php echo $vo['shopId']; ?>'/>
                <?php endif; ?>
                <div class='row'>
                  <dt>运费：</dt><dd>￥<span id="shopF_<?php echo $vo['shopId']; ?>" style='font-weight: bold;color: #E55356;'><?php echo $freight; ?></span></dd>
                </div>
                <div class='row'>
                  <dt>店铺合计(含运费)：</dt><dd>￥<span id="shopC_<?php echo $vo['shopId']; ?>" v="<?php echo $vo['goodsMoney']; ?>" style='font-weight: bold;color: #E55356;'><?php echo WSTPositiveNum($freight+$vo['goodsMoney']-$vo['promotionMoney']); ?></span></dd>
                </div>
              </div>
           </div>
          </div>
       </div>
       <?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- 送货方式 -->
    <div class='pay-boxs'>
       <div class='box-head'>送货方式</div>
       <div class="wst-list-box">
	       <div class="wst-frame2 j-selected" onclick="javascript:changeDeliverType(0,'deliverType',this)">快递运输<i></i></div>
	       <div class="wst-frame2" onclick="javascript:changeDeliverType(1,'deliverType',this)">自提<i></i></div>
          <input type='hidden' value='0' id='deliverType' class='j-ipt' />
          <div class='wst-clear'></div>
       </div>
    </div>
       <div class='cart-footer'>
          <div class='cart-summary2'>
          	<div class="summarys2">
    <!-- 发票信息 -->
    <div class="pay-boxs">
       <div class='box-head'>发票信息</div>
         <div class="j-show-box">

         <div style="float:left;" id="invoice_info">不开发票</div>
         <div style="float:left;color:blue;margin-left:10px;cursor:pointer;" onclick='javascript:changeInvoice(1,"#invoiceClientDiv",this)'>修改</div>

         <div class="wst-clear"></div>
         <input type="hidden" id="invoice_obj" value="0" />
           <input type="hidden" id="invoiceId" value="0" class='j-ipt' />
           <input type='hidden' value='0' id='isInvoice' class='j-ipt' />
           <input type='hidden' value='个人' id='invoiceClient' class='j-ipt' />
  	   </div>
       <div class='wst-clear'></div>
     </div>
     
          	</div>
          	<div class="summarys3" style='text-align:right;padding-right:20px'>
             <div>运费总计：¥<span id='deliverMoney'><?php echo $shopFreight; ?></span></div>
             <?php if(WSTConf('CONF.isOpenScorePay')==1): ?>
             <div>
             （可用<span id='maxScoreSpan'><?php echo $userOrderScore; ?></span>个积分抵¥<span id='maxScoreMoneySpan'><?php echo $userOrderMoney; ?></span>）
             <input type='checkbox' id='isUseScore' autocomplete="off" onclick='javascript:checkScoreBox(this.checked)' dataval="<?php echo $userOrderScore; ?>"/>积分支付
             <span id='scoreMoney' style='display:none'>
             ，使用积分<input type="text" id="useScore" style="width:50px;margin-left:5px" class='j-ipt' onkeyup="javascript:WST.isChinese(this,1)" autocomplete="off" onkeypress="return WST.isNumberKey(event)" onblur="javascript:getCartMoney()" value="<?php echo $userOrderScore; ?>"/>
             </span>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¥-<span id='scoreMoney2'>0.0</span></div>
             <?php endif; ?>
             <div class='summary2'>应付总金额(含运费)：¥<span id='totalMoney' v='<?php echo $carts["goodsTotalMoney"]; ?>'>
             <?php if(empty($userAddress)): ?>
             <?php echo WSTPositiveNum($carts["goodsTotalMoney"]-$carts['promotionMoney']); else: ?>
             <?php echo WSTPositiveNum($carts["goodsTotalMoney"]+$shopFreight-$carts['promotionMoney']); ?>
             <?php endif; ?>
             </span></div>
             <div <?php if(WSTConf('CONF.isOrderScore')!=1): ?>style='display:none'<?php endif; ?>>可获得积分：<span id='orderScore'><?php echo WSTMoneyGiftScore($carts["goodsTotalMoney"]); ?></span>个</div>
             </div>
             <div class='wst-clear'></div>
          </div>         
       </div>
    </div>
     <div class='cart-btn'>
        <a href='<?php echo Url("home/carts/index"); ?>' class='wst-prev wst-cart-asha' style='width:105px;height:33px;line-height:33px;'>上一步</a>
        <a href='javascript:void(0)' onclick='javascript:submitOrder()' class='wst-order wst-cart-reda' style='width:118px;height:33px;line-height:33px;'>提交订单</a>
        <div class='wst-clear'></div>
     </div>
</div>


	<div class="footer-line"></div>
<ul class="wst-footer-info">
	<li><div class="wst-footer-info-img wst-fimg1"></div>
		<div class="wst-footer-info-text">
			<h1>支付宝支付</h1>
			<p>支付宝签约商家</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img wst-fimg2"></div>
		<div class="wst-footer-info-text">
			<h1>正品保证</h1>
			<p>100%原产地</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img wst-fimg3"></div>
		<div class="wst-footer-info-text">
			<h1>退货无忧</h1>
			<p>七天退货保障</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img wst-fimg4"></div>
		<div class="wst-footer-info-text">
			<h1>免费配送</h1>
			<p>满98元包邮</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img wst-fimg5"></div>
		<div class="wst-footer-info-text">
			<h1>货到付款</h1>
			<p>400城市送货上门</p>
		</div>
	</li>
</ul>
<div class="wst-footer-help">
	<div class="wst-footer">
		<div class="wst-footer-hp-ck1">
			<?php $_result=WSTHelps(5,6);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
			<div class="wst-footer-wz-ca">
				<div class="wst-footer-wz-pt">
					<span class="wst-footer-wz-pn"><?php echo $vo1["catName"]; ?></span>
					<ul style='margin-left:25px;'>
						<?php if(is_array($vo1['articlecats']) || $vo1['articlecats'] instanceof \think\Collection || $vo1['articlecats'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo1['articlecats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
						<li style='list-style:disc;color:#999;font-size:13px;'>
						<a href="<?php echo Url('Home/Helpcenter/view',array('id'=>$vo2['articleId'])); ?>"><?php echo WSTMSubstr($vo2['articleTitle'],0,8); ?></a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<?php endforeach; endif; else: echo "" ;endif; ?>

			<div class="wst-contact">
				<ul>
					<li style="height:30px;">
						<div class="icon-phone"></div><p class="call-wst">服务热线：</p>
					</li>
					<li style="height:38px;">
						<?php if((WSTConf('CONF.serviceTel')!='')): ?><p class="email-wst"><?php echo WSTConf('CONF.serviceTel'); ?></p><?php endif; ?>
					</li>
					<li style="height:85px;">
						<div class="qr-code" style="position:relative;">
						    <?php if((WSTConf('CONF.wxenabled')==1) && WSTConf('CONF.wxAppLogo')): ?>
							<img src="__RESOURCE_PATH__/<?php echo WSTConf('CONF.wxAppLogo'); ?>" style="height:110px;">
							<?php endif; ?>
							<div class="focus-wst">
							    <?php if((WSTConf('CONF.serviceQQ')!='')): ?>
								<p class="focus-wst-qr">在线客服：</p>
								<p class="focus-wst-qra">
						          <a href="tencent://message/?uin=<?php echo WSTConf('CONF.serviceQQ'); ?>&Site=QQ交谈&Menu=yes">
									  <img border="0" src="<?php echo WSTProtocol(); ?>wpa.qq.com/pa?p=1:<?php echo WSTConf('CONF.serviceQQ'); ?>:7" alt="QQ交谈" width="71" height="24" />
								  </a>
								</p>
          						<?php endif; if((WSTConf('CONF.serviceEmail')!='')): ?>
								<p class="focus-wst-qr">商城邮箱：</p>
								<p class="focus-wst-qre"><?php echo WSTConf('CONF.serviceEmail'); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</li>
				</ul>
			</div>


			<div class="wst-clear"></div>
		</div>
		<div class="wst-footer-flink">
			<div class="wst-footer" >
		
				<div class="wst-footer-cld-box">
					<div style="text-align:center;">
						<span class="wst-footer-fl" style="margin-right: 30px;">友情链接</span>
						<?php $wstTagFriendlink =  model("common/Tags")->listFriendlink(99,86400); foreach($wstTagFriendlink as $key=>$vo){?>
						<a class="flink-hover" href="<?php echo $vo['friendlinkUrl']; ?>"  target="_blank"><?php echo $vo["friendlinkName"]; ?></a>
						<?php } ?>
						<div class="wst-clear"></div>
					</div>
				</div>
		
			</div>
		</div>
	    <div class="wst-footer-hp-ck3">
	        <div class="links">
	           <?php $navs = WSTNavigations(1); if(is_array($navs) || $navs instanceof \think\Collection || $navs instanceof \think\Paginator): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
               <a href="<?php echo $vo['navUrl']; ?>" <?php if($vo['isOpen']==1): ?>target="_blank"<?php endif; ?>><?php echo $vo['navTitle']; ?></a>
               <?php if($i< count($navs)): ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif; ?>
               <?php endforeach; endif; else: echo "" ;endif; ?>
	        </div>
	        <div class="copyright">
	        <?php 
	        	if(WSTConf('CONF.mallFooter')!=''){
	         		echo htmlspecialchars_decode(WSTConf('CONF.mallFooter'));
	        	}
	         
				if(WSTConf('CONF.visitStatistics')!=''){
					echo htmlspecialchars_decode(WSTConf('CONF.visitStatistics'))."<br/>";
			    }
			 if(WSTConf('CONF.mallLicense') == ''): ?>
	        <div>
				Copyright©2016 Powered By <a target="_blank" href="http://www.wstmart.net">WSTMart</a>
			</div>
			<?php else: ?>
				<div id="wst-mallLicense" data='1' style="display:none;">Copyright©2016 Powered By <a target="_blank" href="http://www.wstmart.net">WSTMart</a></div>
	        <?php endif; ?>
	        </div>
	    </div>
	</div>
</div>
<?php echo hook('homeDocumentListener'); ?>
<?php echo hook('initCronHook'); ?>


<script type='text/javascript' src='__STYLE__/js/carts.js?v=<?php echo $v; ?>'></script>

</body>
</html>