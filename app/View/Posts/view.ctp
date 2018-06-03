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
			<?php echo $this->Session->read('username'); ?>
			<!-- <div class="delete" data-comment-id="<?php echo $comment['id']; ?>">削除</div> -->
			<ul class="action-list">
				<li class="iine" data-comment-id="<?php echo $comment['id']; ?>" data-action-num="<?php echo $comment['action']; ?>"><i class="fa fa-heart-o" aria-hidden="true"></i><span><?php echo $comment['action']; ?></span></li>
			</ul>
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
	'placeholder' => '入力欄',
	'value' => $this->Session->read('username')
));
echo $this->Form->input('body', array(
	'label' => ' ',
	'rows'=>1
));
echo $this->Form->input('Comment.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));
echo $this->Form->end('投稿');
?>
</div>


<script>
	$(function(){

		$('body,html').animate({scrollTop:$(document).height()}, 500, 'swing');

		$('.delete').on('click', function(e){
			if(confirm('sure?')){
				$.post('/comments/delete/' + $(this).data('comment-id'), {}, function(res){
					$('#comment_' + res.id).fadeOut();
				}, "json");
			}
			return false;
		});

		$("#CommentBody").height(18);//init
		$("#CommentBody").css("lineHeight","20px");//init
		$("#CommentBody").on("input",function(evt){
	    if(evt.target.scrollHeight > evt.target.offsetHeight){   
	      $(evt.target).height(evt.target.scrollHeight);
	    }else{          
	      var lineHeight = Number($(evt.target).css("lineHeight").split("px")[0]);
        while (true){
          $(evt.target).height($(evt.target).height() - lineHeight); 
          if(evt.target.scrollHeight > evt.target.offsetHeight){
            $(evt.target).height(evt.target.scrollHeight);
            break;
          }
        }
	    }
		});

	
		//いいね機能
		$('.action-list li').on('click',function(){
			var self = $(this);
			var commentId = $(this).data('comment-id');
			var actionNum = $(this).data('action-num');
			
			$.post(
	     	'/comments/actionIncrement/' + commentId,
	     	{actionNum:actionNum},
	     	function(data){
	     		self.find('span').text(data);
	     	}
			);

		});

		$('.userName').on('click',function(){
		  var userName = $(this).text();
		  $('#CommentBody').val('＞' + userName + ' ');
		});

		$('.com-add .submit').on('click',function(){
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


