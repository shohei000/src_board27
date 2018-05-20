<ul class="si-index">
	<?php foreach($posts as $post) : ?>
		<li id="post_<?php echo h($post['Post']['id']); ?>">
			<h3><?php echo $this->Html->link($post['Post']['title'],'/posts/view/'.$post['Post']['id']); ?></h3>
			<!-- <i class="fa fa-angle-right si-link" aria-hidden="true"></i> -->
		</li>
	<?php endforeach; ?>
</ul>


<script>
	$(function(){
		$('a.delete').on('click', function(e){
			if(confirm('sure?')){
				$.post('/posts/delete/' + $(this).data('post-id'), {}, function(res){
					$('#post_' + res.id).fadeOut();
				}, "json");
			}
			return false;
		});
	});
</script>