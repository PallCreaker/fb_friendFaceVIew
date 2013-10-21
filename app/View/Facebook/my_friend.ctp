
<h1>自分の顔</h1>
<img src="https://graph.facebook.com/<?php echo $fb;?>/picture?width=150" />
<?php if(isset($me['gender'])):?>
	<?php if( $me['gender'] == "female"): ?>
		<h2>自分の異性の友だち！(๑╹ڡ╹๑)</h2>
	<?php else: ?>
		<h2>自分の異性の友だち！(๑╹ڡ╹๑)</h2>
	<?php endif; ?>
<?php else:?>
	<h2>異性の友だちだよ！</h2>
<?php endif;?>

<?php for($i=0; $i < count($friend_list['data']); $i++):?>
	<?php if (isset($friend_list['data'][$i]['gender'])) {?>
	    <?php if($me['gender'] != $friend_list['data'][$i]['gender']):?>
	        <a href="https://www.facebook.com/<?php echo $friend_list['data'][$i]['id'];?>">
	            <img src="https://graph.facebook.com/<?php echo $friend_list['data'][$i]['id'];?>/picture?width=100&height=100" alt="" />
	        </a>
	    <?php endif;?>
	<?php }else{?>
			<?php if($i == 0){?>
				<h4>異性関係ない友達の一覧だ！</h4>
			<?php }?>
		<a href="https://www.facebook.com/<?php echo $friend_list['data'][$i]['id'];?>">
	            <img src="https://graph.facebook.com/<?php echo $friend_list['data'][$i]['id'];?>/picture?width=100&height=100" alt="" />
	     </a>
	<?php } ?>
<?php endfor;?>