<?php /* Smarty version Smarty-3.1.12, created on 2016-11-10 13:08:20
         compiled from "../tpl/w/indexadmin.html" */ ?>
<?php /*%%SmartyHeaderCode:587418691582400c49547b7-48559387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c35e58de87db01afdfb01a49ff015f90c3f25135' => 
    array (
      0 => '../tpl/w/indexadmin.html',
      1 => 1383815954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '587418691582400c49547b7-48559387',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'typeindex' => 1,
    'type' => 1,
    'note' => 1,
    'content' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_582400c4989de9_12334852',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582400c4989de9_12334852')) {function content_582400c4989de9_12334852($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript">
$(document).ready(function() { 
//resizebg();
wait();

if( $.cookie("nickname") !== null) { 
$('.nickname').val($.cookie("nickname"));
$('#nknm').text($.cookie("nickname")+' ');
 } 
//$(window).resize(function() {  resizebg();wait(); } );


var ts='<img src="../img/more.gif" /><span>加载中……</span>';
var stop=true;
function more(t,f,c) { 

  if(stop==true) { 
  stop=false;
    $(".wait").html(ts);
  if(f==0) $(".wait").show();
  $("#mt").text("加载中……");
  $(".mimg").show();
  
$.ajax( { 
type: "GET",

data: { "type":t,"first":f } ,
cache: false,
timeout:25000,
  url: '../json_w.php',
dataType: "json",

success: function (result) { 

var a='a';

    var item='';
    for(var i=0;i<result.length-1;i++) { 
    var view='<div class="view left"> 点:'+result[i].view+' 评:'+result[i].comc+'</div>';
    if(result[i].type=='message'){ a='div';view=''; } 
      item += '<div class="item" style="background:'+result[i].color+';"><a href="articleadmin.php?id='+result[i].id+'"><img class="point" src="../img/point.png" /><div class="num none">'+result[i].ext+'</div><div class="view left">#'+result[i].lou+'</div>'+view+'<div class="time right"><span class="timed">'+result[i].timed+'</span>日<span class="timem">'+result[i].timem+'</span>月'+result[i].timey+' '+result[i].week+' '+result[i].time+'</div><h1 class="title">'+result[i].title+'</h1><div class="des feeling">'+result[i].des+'</div></a><a style="color: #fff;" href="del.php?id='+result[i].id+'">删除它</a></div>'; 
    }  
    if(f==0) $(".content").text("");
    $(".content").append(item);
    $(".mimg").hide();
    $("#mt").text("无更多内容");
    if(result.length == 1) { 
      if(f==0) $("#nt").text('没有内容');
    } 
    else $("#mt").text("查看更多");
    stop=true;
    $(".wait").hide();
   
 } ,

error: function (result) { 
$(".mimg").hide();
$(".wait").text('加载失败！');
 setTimeout(function(){
$(".wait").hide();
$(".wait").html(ts);
if(f==0) $(".content").text("");
},1000); 
$("#mt").text("加载失败，请重试");
stop=true;
 } 

 } );//ajax

  } 

}


$("li:eq(<?php echo $_smarty_tpl->tpl_vars['typeindex']->value;?>
)").css('border-bottom','2px green solid');

var type="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
";

var first=0;
var count=10;

$("li").click(function() { 
stop=true;
$(".msgboard").hide();
switch($(this).text()) { 
case '全部' :
type="all";
break;
case '栏目1' :
type="article";
$("option").removeAttr("selected");
$("option[value=1]").attr('selected','selected');
break;
case '栏目2' :
type="feeling";
$("option").removeAttr("selected");
$("option[value=1001]").attr('selected','selected');
break;
case '栏目3' :
type="message";
$("option").removeAttr("selected");
$("option[value=2001]").attr('selected','selected');
break;
 } 

first=0;
more(type,0,10);
$(".msgboard").show();
$("#nt").text("");
$("li").css('border-bottom','2px rgba(180,180,180,0.2) solid');
$(this).css('border-bottom','2px green solid');

 } );

$(".more").click(function() { 
first=$(".num:last").text();
more(type,first,10);
 } );

 $("#leave").click(function() { 
 $(".wait").html('<img src="../img/more.gif" /><span>提交发布……</span>');
 $(".wait").show();
 $.ajax( { 
type: "POST",

data: { 'content':$('.msgcontent').val(),'author':$('.nickname').val(),'color':$('input:radio[name="color"]:checked').val() , 'des':$('.msgcontent').val(), 'class':$('.classc').val()
} ,

cache: false,

timeout:25000,

  url: 'fb.php',

dataType: "html",

success: function (result) { 
  if(result=='-1') { 
  $(".wait").text('请输入发布内容！');
 setTimeout(function(){
$(".wait").hide();
$(".wait").html(ts);
},2500);
  } else if(result!='0') { 
  $(".wait").text('发布失败！');
 setTimeout(function(){
$(".wait").hide();
$(".wait").html(ts);
},2500);
  
  } else {
    $("#nt").text("");
    first=0;
    more('all',0,10);
    type="all";
    first=0;
$(".msgboard").show();
$("#nt").text("");
$("li").css('border-bottom','2px rgba(180,180,180,0.2) solid');
$("li:first").css('border-bottom','2px green solid');
    $.cookie('nickname',$('.nickname').val(), { 'path':'/','expires':'0' } );
    $('.msgcontent').val("");
    $('#nknm').text($.cookie("nickname")+' ');
    $(".wait").text('发布成功！');
 setTimeout(function() {
$(".wait").hide();
$(".wait").html(ts);
 } ,2500);
 } 
 } ,

error: function (result) { 
$(".wait").text('发布失败！');
setTimeout(function(){
$(".wait").hide();
$(".wait").html(ts);
},2500);
 } 

} );

 return false;
} );

$(".msgboard").show();


 } );
</script>

</head>
<body>
<div class="content_ext">
<div class="head">
  <h3 style="font-size:24px;">
    微信墙管理
  </h3>
  
  <div class="clear"></div>
</div>
<div class="bar">

  <ul>
<li>全部</li>
<li>栏目1</li>
<li>栏目2</li>
<li>栏目3</li>
  </ul>
  <div class="clear"></div>
</div>

<div class="note"><span id="nt"><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</span>
  <div class="clear"></div>
  <div class="msgboard">
    <fieldset>
<legend class="lablee">说点什么吧～</legend>
    <form action="leavemsg.php" method="post">
      <input name="msgcontent" style="background:rgba(255,255,255,0.7);" class="msgcontent" type="text" placeholder="在这里说呢～" />
      <div style="margin:10px;"><span style="color:#666;">颜色：</span>
<div class="right" style=" border:10px rgb(229,182,0) solid;margin-left:5px;"><input type="radio" name="color" value="rgba(229,182,0,0.85)" /></div>
<div class="right" style=" border:10px rgb(239,112,39) solid;margin-left:5px;"><input type="radio" name="color" value="rgba(239,112,39,0.85)" /></div>
<div class="right" style=" border:10px rgb(0,175,215) solid;margin-left:5px;"><input checked="checked" type="radio" name="color" value="rgba(0,175,215,0.85)" /></div>
  <div class="clear"></div></div>
      <span class="cls">分类：
<select class="classc" name="class">
<option value="1001" selected="selected">栏目1</option>
<option value="1">栏目2</option>
<option value="2001">栏目3</option>
</select></span>
      <input style="width:50px;background:rgba(255,255,255,0.7);" name="nickname" class="nickname" type="text" placeholder="昵称" />
    <button id="leave" class="button" style="padding:8px 10px;font-size:18px;">发布</button>
    </form>
    </fieldset>
  </div>
<div class="content">
<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</div>
  <hr /><div style="text-align:center;"><span class="more"><img style="display:none;" class="mimg" src="../img/more.gif" /><span id="mt">查看更多</span></span></div>
  <hr />
<cite style="text-align:center;display:block;color:#888">洋子开发</cite>
</div>
  <div class="wait"><img src="../img/more.gif" /><span>加载中……</span></div>
<img class="bg_img" style="width:100%;height:100%" src="../img/bg_w.jpg" />
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>