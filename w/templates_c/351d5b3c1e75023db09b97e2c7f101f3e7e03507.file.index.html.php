<?php /* Smarty version Smarty-3.1.12, created on 2016-11-10 13:07:13
         compiled from "../tpl/w/index.html" */ ?>
<?php /*%%SmartyHeaderCode:377146398582400810ab846-89676090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '351d5b3c1e75023db09b97e2c7f101f3e7e03507' => 
    array (
      0 => '../tpl/w/index.html',
      1 => 1401202548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '377146398582400810ab846-89676090',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'typeindex' => 1,
    'type' => 1,
    'class_1' => 0,
    'class_2' => 0,
    'class_3' => 0,
    'site_name' => 0,
    'li_c' => 0,
    'note' => 1,
    'op_c' => 0,
    'content' => 1,
    'copy_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58240081104c39_98935698',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58240081104c39_98935698')) {function content_58240081104c39_98935698($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
      item += '<a class="item" style="background:'+result[i].color+';" href="article.php?id='+result[i].id+'"><img class="point" src="../img/point.png" /><div class="num none">'+result[i].ext+'</div><div class="view left">#'+result[i].lou+'</div>'+view+'<div class="time right"><span class="timed">'+result[i].timed+'</span>日<span class="timem">'+result[i].timem+'</span>月'+result[i].timey+' '+result[i].week+' '+result[i].time+'</div><h1 class="title">'+result[i].title+'</h1><div class="des feeling">'+result[i].des+'</div></a>'; 
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
case '<?php echo $_smarty_tpl->tpl_vars['class_1']->value;?>
' :
type="article";
$("option").removeAttr("selected");
$("option[value=1]").attr('selected','selected');
break;
case '<?php echo $_smarty_tpl->tpl_vars['class_2']->value;?>
' :
type="feeling";
$("option").removeAttr("selected");
$("option[value=1001]").attr('selected','selected');
break;
case '<?php echo $_smarty_tpl->tpl_vars['class_3']->value;?>
' :
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
/* switch($('.classc').val()) { 
 case '1001' :
 colorr = 'rgba(229,182,0,0.85)';
   break;
   case '1' :
   colorr = 'rgba(0,175,215,0.85)';
   break;
   case '2001' :
   colorr = 'rgba(239,112,39,0.85)';
   break;
} */ 
 $.ajax( { 
type: "POST",

data: { 'content':$('.msgcontent').val(),'author':$('.nickname').val(),'color':$('input:radio[name="color"]:checked').val(), 'des':$('.msgcontent').val(), 'class':$('.classc').val() } ,

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
   } else if(result == 'cs'){
    $(".wait").text('您访问超速了！请稍候再重试！');
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
<!-- <audio src="http://sc.111ttt.com/up/mp3/326956/C62A58E0ECF99467BEAEBD03B5B182EE.mp3" autoplay="autoplay">您的浏览器不支持音频</audio> -->
<div class="content_ext">
<div class="head">
  <h3 style="font-size:24px;">
<?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>

  </h3>
  
  <div class="clear"></div>
</div>
<div class="bar">

  <ul>
<?php echo $_smarty_tpl->tpl_vars['li_c']->value;?>

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
    <textarea name="msgcontent" style="height:1.5em; line-height:1.5em; padding:3px;border:1px #eee solid; background:rgba(255,255,255,0.7);" class="msgcontent" placeholder="在这里说呢～" onkeydown ="//if(event.keyCode==13) return false; " oninput="this.style.height='0px';this.style.height=(this.scrollHeight+'px');" onpropertychange="this.style.height=(this.scrollHeight+'px')" /></textarea>
      <!-- input name="msgcontent" style="background:rgba(255,255,255,0.7);" class="msgcontent" type="text" placeholder="在这里说呢～" /-->
      <div style="margin:10px;"><span style="color:#666;">颜色：</span>
<div class="right" style=" border:10px rgb(229,182,0) solid;margin-left:5px;"><input type="radio" name="color" value="rgba(229,182,0,0.85)" /></div>
<div class="right" style=" border:10px rgb(239,112,39) solid;margin-left:5px;"><input type="radio" name="color" value="rgba(239,112,39,0.85)" /></div>
<div class="right" style=" border:10px rgb(0,175,215) solid;margin-left:5px;"><input checked="checked" type="radio" name="color" value="rgba(0,175,215,0.85)" /></div>
  <div class="clear"></div></div>
      <span class="cls">分类：
<select class="classc" name="class">
<?php echo $_smarty_tpl->tpl_vars['op_c']->value;?>

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
<cite style="text-align:center;display:block;"><?php echo $_smarty_tpl->tpl_vars['copy_info']->value;?>
</cite>
<!-- 洋子开发，QQ：429740278，不可转卖 -->
</div>
  <div class="wait"><img src="../img/more.gif" /><span>加载中……</span></div>
<img class="bg_img" style="width:100%;height:100%" src="../img/bg_w.jpg" />
 <div id="leafContainer"></div>   
<style>
 #leafContainer 
{
    position: fixed;
    z-index:-1;
width:100%;
    height: 690px;
top:0;
overflow:hidden;
}
 #leafContainer > div 
{
    position: absolute;
   z-index:100;
    max-width: 100px;
    max-height: 100px;
    -webkit-animation-iteration-count: infinite, infinite;
    -webkit-animation-direction: normal, normal;
    -webkit-animation-timing-function: linear, ease-in;
}

#leafContainer > div > img {
     position: absolute;
   z-index:100;
     width: 100%;
     -webkit-animation-iteration-count: infinite;
     -webkit-animation-direction: alternate;
     -webkit-animation-timing-function: ease-in-out;
     -webkit-transform-origin: 50% -100%;
}

 @-webkit-keyframes fade
{
   
    0%   { opacity: 1; }
    95%  { opacity: 1; }
    100% { opacity: 0; }
}

 @-webkit-keyframes drop
{
       0%   { -webkit-transform: translate(0px, -50px); }
    100% { -webkit-transform: translate(0px, 650px); }
}
 @-webkit-keyframes clockwiseSpin
{
    0%   { -webkit-transform: rotate(-50deg); }
    100% { -webkit-transform: rotate(50deg); }
}
 @-webkit-keyframes counterclockwiseSpinAndFlip 
{
    
    0%   { -webkit-transform: scale(-1, 1) rotate(50deg); }
   
    100% { -webkit-transform: scale(-1, 1) rotate(-50deg); }
}
 </style>
<script src="../js/back.js" type="text/javascript"></script>
<!-- <div id="bubbles" style="visibility:hidden">
<img src="http://biaobai.cnxqw.com/img/1.png">
<img src="http://biaobai.cnxqw.com/img/2.png">
<img src="http://biaobai.cnxqw.com/img/1.png">
</div> -->
<!-- <script src="http://hdjwcx.duapp.com/w/js/tao.js" language="javascript" type="text/javascript"></script> -->
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>