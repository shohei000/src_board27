<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<title>
	27歳の掲示板 | 
		<?php
			$threadTitle = h($post['Post']['title']);
			$threadId = h($post['Post']['id']);
			if(isset($post)){
				echo $threadTitle;
			} else { 
				echo $title_for_layout;
			}
		?>
	</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="keywords" content="27歳の掲示板,board27">
	<meta name="description" content="<?php echo $threadTitle; ?>">
	<link rel="shortcut icon" type="image/png" href="http://board27.xyz/favicon.ico" />
	<?php
		echo $this->Html->css('style');
		echo $this->Html->script('jquery-3.1.1.min.js');
		echo $this->Html->script('clipboard.min.js');
		echo $this->Html->script('app.js');
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">



	<meta property="og:title" content="<?php echo $threadTitle; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://board27.xyz/" />
	<meta property="og:image" content="http://board27.xyz/ogimage.png" />
	<meta property="og:site_name"  content="27歳の掲示板" />
	<meta property="og:description" content="<?php echo $threadTitle; ?>" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo $threadTitle; ?>">
	<meta name="twitter:description" content="<?php echo $threadTitle; ?>">
	<meta name="twitter:image" content="http://board27.xyz/ogimage.png">

</head>
<body class="<?php if(isset($bg_gray)){echo $bg_gray;} ?>">
	<header class="header">
		<?php if(!isset($com_input)) : ?>
			<h1 class="logo"><a href="/">27歳の掲示板</a></h1>
		<?php endif; ?>
		<h2 class="title <?php if(isset($post)){ echo 'left-title'; } ?>">
			<a href="#top">
				<?php
					if(isset($post)){
						echo '<a href="/">' . h($post['Post']['title']) . '</a>';
					}else{
						echo $title_for_layout;
					}
				?>
			</a>
		</h2>
		<div class="btn btn-add"><a href="/posts/add/"><i class="fa fa-plus-square" aria-hidden="true"></i></a></div>
	</header>
	

	<div class="wrapper">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>




<!--MENU-->
	<a class="menuTrigger" href="javascript:void(0)">
		<span></span>
		<span></span>
		<span></span>
	</a>
	<section class="menuArea">
		<div class="menuList">
			<a href="/">
				<i class="fa fa-home" aria-hidden="true"></i>
				<span class="menuTitle">TOPへ戻る</span>
			</a>
			<a href="/posts/">
				<i class="fa fa-list-ul" aria-hidden="true"></i>
				<span class="menuTitle">一覧を見る</span>
			</a>
			<a href="/posts/add/">
				<i class="fa fa-plus-square" aria-hidden="true"></i>
				<span class="menuTitle">スレを追加する</span>
			</a>
			<a href="javascript:void(0)" class="urlCopy" data-clipboard-text="">
				<i class="fa fa-files-o" aria-hidden="true"></i>
				<span class="menuTitle">URLをコピー</span>
			</a>
			<a href="https://twitter.com/share?url=http://board27.xyz/posts/view/<?php echo $threadId; ?>&text=<?php echo $threadTitle; ?>" class="twitter-share-button">
				<i class="fa fa-files-o" aria-hidden="true"></i>
				<span class="menuTitle">シェアする(TW)</span>
			</a>
		</div>
		<div class="copyFlg"></div>
	</section>
<!--MENU-->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90724919-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-90724919-1');
</script>
</body>
</html>
