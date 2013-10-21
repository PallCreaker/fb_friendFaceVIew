<?php /*
<h1>自分の顔</h1>
<img src="https://graph.facebook.com/<?php echo $fb;?>/picture?width=150" alt="" />
*/?>

<?php if($me['gender'] == 'female'):?>
	<h2>かっこいい人探そ！(・ε・)ﾌﾟｯﾌﾟｸﾌﾟｰ</h2>
<?php else:?>
	<h2> 可愛い子さがそ！(；´Д｀)ﾊｱﾊｱ </h2>
<?php endif;?>

<?php /*
<?php for($i=0; $i < count($friend_list['data']); $i++):?>
    <?php if($me['gender'] != $friend_list['data'][$i]['gender']):?>
        <a href="https://www.facebook.com/<?php echo $friend_list['data'][$i]['id'];?>">
            <img src="https://graph.facebook.com/<?php echo $friend_list['data'][$i]['id'];?>/picture?width=100&height=100" alt="" />
        </a>
    <?php endif;?>
<?php endfor;?>
 * 
 * 
 */?>

<?php for($i=0; $i < count($friend_photos['friends']['data']); $i++):?>
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

<?php $next_paging = $friend_photos['friends']['paging']['next']; ?>
<?php echo $next_paging;?>

<?php echo $this->Html->div('next_down');?>
<?php echo $this->Form->button('クリック！', array('id'=>'next_down')); ?> 

<?php $this->Js->get('#next_down')->event('click',
										$this->Js->request(
														array('action' => 'getAjax'),
														array('async' => true, 'method' => 'POST', 'type' => 'html', 'data' => array('url'=>urlencode($next_paging)), 'complete' => 'getAjaxData(XMLHttpRequest)')
														)
										); ?>
										
<?php echo $this->Js->writeBuffer();?>

<?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',array('inline'=>false));?>
<script type="text/javascript" charset="utf-8">
function getAjaxData() {
	//alert("alert");
	var data = JSON.parse(data);
	alert(data);
}
$.post('URL', {
	キー：値
}, function(data){
	data = JSON.parse(data);
	// 
})

</script>
