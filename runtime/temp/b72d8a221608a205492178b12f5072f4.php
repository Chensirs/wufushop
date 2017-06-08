<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"./application/admin/view/user\sendMessage.html";i:1495621976;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>收货地址-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
    <meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
    <link rel="stylesheet" href="__STATIC__/css/edit_address.css" type="text/css">
    <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
    <script src="__STATIC__/js/slider.js"></script>
	<script src="__PUBLIC__/js/layer/layer-min.js"></script><!--弹窗js 参考文档 http://layer.layui.com/-->
</head>
<style type="text/css">
.wi80-BFB{width:80%}
.wi40-BFB{width:40%}
.seauii{ padding:7px 10px; margin-right:10px}
.he110{ height:110px}
.di-bl{ display:inherit}
</style>
<body>
<div class="adderss-add">
    <div class="ner-reac ol_box_4" style="visibility: visible; position: fixed; z-index: 500; width: 100%; height:100%">
        <div class="box-ct">
            <div class="box-header">
                <!-- <a href="" class="box-close"></a> -->
            </div>
            <form action="<?php echo U('Admin/User/doSendMessage'); ?>" method="post" onSubmit="return checkForm()">
                <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <input name="call_back" type="hidden" value="call_back" />
                    <tr class="postmessage" style=" height:32px">
                        <td></td>
                        <td>
                            <?php if(count($users) > 0): ?><input id="allvip" type="radio"checked="checked" name="type" value="0"><label for="allvip"  class="allvip">发送给以下会员</label><?php endif; ?>
                            <input id="someonevip" type="radio" <?php if(count($users) == 0): ?>checked="checked"<?php endif; ?> name="type" value="1"><label for="someonevip">发送给全部会员</label>
                        </td>
                    </tr>
                    <?php if(count($users) > 0): ?>
                     <tr>
                    	<td align="right" valign="top">会员列表：</td>
                    	<td>
                            <div class="wi80-BFB re-no viplist" >
                                <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                                    <input type="hidden" name="user[]" value="<?php echo $user['user_id']; ?>" />
                                    <p><span><?php echo $user['user_id']; ?></span>&nbsp;<span><?php echo $user['nickname']; ?></span></p>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td><div>&nbsp;</div></td>
                        <td><div>&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td align="right" valign="top">发送内容：</td>
                        <td><textarea class="he110 wi80-BFB re-no" name="text" id="text" placeholder="发送内容" maxlength="100"></textarea></td>
                    </tr>
                   <tr style="height:60px">
                        <td class="pa-50-0">&nbsp;</td>
                        <td align="right">
                            <button type="submit" style="padding: 4px 16px;cursor: pointer;"><span>发送</span></button>
                        </td>    
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script src="__PUBLIC__/js/global.js"></script>
<script src="__PUBLIC__/js/pc_common.js"></script>

<script>
    function checkForm(){
        var text = $('#text').val();
        var error = '';
        if(text == ''){
            error += '站内信内容不能为空 <br/>';
        }
        if(error){
			layer.alert(error, {icon: 2});
            return false;
        }
        return true;
    }
</script>
</body>
</html>
