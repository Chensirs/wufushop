<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"./template/pc/rainbow/user\ajax_message_notice.html";i:1495621988;}*/ ?>
<?php if(empty($messages)): ?>
    <p class="norecode" style="font-size: 16px;color: #999999;padding:100px 0;text-align: center;">抱歉，您暂时没有要处理的消息！</p>
    <?php else: if(is_array($messages) || $messages instanceof \think\Collection || $messages instanceof \think\Paginator): $i = 0; $__LIST__ = $messages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$message): $mod = ($i % 2 );++$i;?>
        <div class="tp_message">
            <h3><?php if($message['category'] == 1): ?>活动通知<?php else: ?>系统通知<?php endif; ?></h3>
            <p class="tpcontent"><?php echo $message['message']; ?></p>
            <p class="checknoti"><em><?php echo date('Y-m-d H:i:s',$message['send_time']); ?></em></p>
            <!--<p class="checknoti"><a href="">查看详情></a></p>-->
        </div>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?>