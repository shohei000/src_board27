<div class="talkWrapper">
	<section class="talkArea">
		<?php foreach($post['Comment'] as $comment) : ?>
		<?php 
			$date = new DateTime($comment['created']);
			$commentData = $date->format('m月d日 H:i');
		?>
		<article id="comment_<?php echo $comment['id']; ?>" class="talkBox">
			<div class="talkHead">
				<!-- <div class="userIcon"><img src="" alt=""></div> -->
				<div class="userName"><?php echo h($comment['commenter']); ?></div>
				<div class="comment-time"><?php echo $commentData; ?></div>
			</div>
			<p class="talkBoxText"><?php echo nl2br(h($comment['body'])); ?></p>
			<!-- <div class="delete" data-comment-id="<?php echo $comment['id']; ?>">削除</div> -->
		</article>
		<?php endforeach; ?>
		<div class="talkBox-token"></div>
	</section>
</div>


<!-- <div class="com-open com-switch">コメントする</div> -->
<div class="com-add">
<!-- <div class="com-close com-switch">✕</div> -->
<?php
echo $this->Form->create('Comment', array('action'=>'add'));
echo $this->Form->input('commenter',array(
	'label' => 'お名前',
	'placeholder' => '山田太郎',
	'value' => $this->Session->read('username')
));
echo $this->Form->input('body', array(
	'label' => ' ',
	'rows'=>3
));
echo $this->Form->input('Comment.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));
echo $this->Form->end('投稿');
?>
</div>


<script>
	$(function(){
		$('.delete').on('click', function(e){
			if(confirm('sure?')){
				$.post('/comments/delete/' + $(this).data('comment-id'), {}, function(res){
					$('#comment_' + res.id).fadeOut();
				}, "json");
			}
			return false;
		});

		$('.submit').on('click',function(){
			var nameValue = $('#CommentCommenter').val();
			var CommentBodyValue = $('#CommentBody').val();
			if(nameValue == ""){
				$('#CommentCommenter').val('匿名' + <?php echo $comment['id']; ?>);
			}
			if(CommentBodyValue == ""){
				return false;
			}
		});

	});
</script>