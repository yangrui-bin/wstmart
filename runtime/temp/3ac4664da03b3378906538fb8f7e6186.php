<?php /*a:1:{s:74:"D:\root\wstmart_v3.1.0_190930\addons\thirdlogin\view\home\index\login.html";i:1566974179;}*/ ?>
<?php if(isset($thirdLogins['thirdTypes'])){ ?>
<div >
	 <div class="wst-stript">
	 	<span class="stript-left"></span>
	 	<span style="font-family: 微软雅黑;font-size: 14px;text-align: center;color: #888;padding: 0px 10px;">第三方登录</span>
	 	<span class="stript-right"></span>
	 </div>
	 <div style="text-align:center;margin-top: 10px;">
		<?php if(in_array("qq",$thirdLogins['thirdTypes']) ){ ?>
			<a href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=<?php echo $thirdLogins['appId_qq']; ?>&redirect_uri=<?php echo $thirdLogins['backUrl_qq']; ?>" class="qq">
				<img src="/wstmart_v3.1.0_190930<?php echo $thirdLogins['img_qq']; ?>" alt="QQ登录" border="0" style="width:40px;">&nbsp;&nbsp;
			</a>
		<?php } if(in_array("weixin",$thirdLogins['thirdTypes'])){ ?>
			<a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?php echo $thirdLogins['appId_weixin']; ?>&redirect_uri=<?php echo $thirdLogins['backUrl_weixin']; ?>&response_type=code&scope=snsapi_login&state=<?php echo time();?>#wechat_redirect" class="qq">
				<img src="/wstmart_v3.1.0_190930<?php echo $thirdLogins['img_weixin']; ?>" alt="微信登录" border="0" style="width:40px;">&nbsp;&nbsp;
			</a>
		<?php } if(in_array("weibo",$thirdLogins['thirdTypes'])){ ?>
			<a href="https://api.weibo.com/oauth2/authorize?client_id=<?php echo $thirdLogins['appId_weibo']; ?>&response_type=code&redirect_uri=<?php echo $thirdLogins['backUrl_weibo']; ?>" class="qq">
				<img src="/wstmart_v3.1.0_190930<?php echo $thirdLogins['img_weibo']; ?>" alt="微博登录" border="0" style="width:40px;">&nbsp;&nbsp;
			</a>
		<?php } ?>
	</div>
</div>
<?php } ?>
		 