jQuery.noConflict();
// 获取商品咨询
function getgoodsConsultList(){
  $('#Load').show();
    loading = true;
    var param = {};
    param.goodsId = $('#goodsId').val();
    param.pagesize = 10;
    param.page = Number( $('#currPage').val() ) + 1;
    $.post(WST.U('mobile/goodsconsult/listQuery'), param, function(data){
        var json = WST.toJson(data);
        json = json.data;
        var html = '';
        if(json && json.data && json.data.length>0){
           var gettpl = document.getElementById('gcList').innerHTML;
          laytpl(gettpl).render(json.data, function(html){
            $('#_gacList').append(html);
          });
          $('#currPage').val(data.data.current_page);
          $('#totalPage').val(data.data.last_page);
        }else{
          html += '<p style="text-align:center;margin-top:10px;">暂无商品咨询~</p>';
          $('#_gcList').html(html);
        }
        loading = false;
        $('#Load').hide();
        echo.init();//图片懒加载
    });
}
function consultListInit(){
  var currPage = totalPage = 0;
  var loading = false;
  $(document).ready(function(){
      getgoodsConsultList();
      $("#frame").css('top',0);
      $("#frame").css('right','-100%');
  });
};
$(function(){WST.initFooter()});
/* 发布咨询 */
function consult(){
  var goodsId = $('#goodsId').val();
  location.href=WST.U('mobile/goodsconsult/consult',{goodsId:goodsId});
}
// 提交商品咨询
function consultCommit(){
  var params={};
  params.goodsId = $('#goodsId').val();
  params.consultType = $('#consultType').val();
  if(params.consultType<=0){
    WST.msg('请选择咨询类别','info');
    return;
  }
  params.consultContent = $('#consultContent').val();
  if(params.consultContent == ''){
    WST.msg('请输入咨询内容','info');
    return;
  }
  if(params.consultContent.length<3 || params.consultContent.length>200){
    WST.msg('咨询内容应为3-200个字','info');
    return;
  }
  WST.load('正在提交，请稍后...');
  $.post(WST.U('mobile/goodsconsult/add'),params,function(responData){
    WST.noload();
    var json = WST.toJson(responData);
    if(json.status==1){
       // 发布成功
       WST.msg(json.msg,'success');
    }else{
      WST.msg(json.msg,'warn');
    }
  })
}