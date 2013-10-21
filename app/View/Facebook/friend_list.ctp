
<h1>自分の顔</h1>
<img src="https://graph.facebook.com/<?php echo $fb;?>/picture?width=150" alt="" />
<?php if(isset($me['gender'])):?>
	<?php if($me['gender'] == "female"): ?>
		<h2>かっこいい人探そ！(・ε・)ﾌﾟｯﾌﾟｸﾌﾟｰ</h2>
	<?php else: ?>
		<h2>可愛い子さがそ！(；´Д｀)ﾊｱﾊｱ</h2>
	<?php endif; ?>
<?php else:?>
	<h2>異性の友だちだよ！</h2>
<?php endif;?>

<?php echo $this->Session->flash('authError');?>

<?php if(isset( $friend_photos['friends'])):?>
	<?php $count = count($friend_photos['friends']['data']);?>
	<?php for($i=0; $i < $count; $i++):?>

		<?php if($me['gender'] != $friend_photos['friends']['data'][$i]['gender']):?>
			<?php if(isset($friend_photos['friends']['data'][$i]['photos']) ):?>

				<?php for($j=0; $j < count($friend_photos['friends']['data'][$i]['photos']['data']); $j++):?>
					<?php if(isset($friend_photos['friends']['data'][$i]['photos']['data'][$j]['tags']) ) :?>
						 <a href="https://www.facebook.com/<?php echo $friend_photos['friends']['data'][$i]['photos']['data'][$j]['id'];?>">
							<img src="<?php echo $friend_photos['friends']['data'][$i]['photos']['data'][$j]['source']; ?>" alt="" width="200" height="200"/>
						</a>
					<?php endif;?>
				<?php endfor;?>

	        <?php endif;?>
	        <?php  //echo "i:".$i; ?>
		<?php endif;?>
	<?php endfor;?>
<?php  //echo "i:".$i."j:".$j;?>
<?php endif;?>
