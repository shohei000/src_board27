
<div class="inner is-add">
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array(
	'label' => ' ',
	'placeholder' => 'スレット名を入力してください'
));
// echo $this->Form->input('body', array(
// 	'rows' => 1,
// 	'label' => ' ',
// 	'placeholder' => '初めの投稿(任意)'
// ));
echo $this->Form->end('追加する');
?>
</div>