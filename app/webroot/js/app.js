$(function(){
	
	var app = app || {};
	var menuFlg = -1;
	var comFlg = -1;
	window.onload = function() { setTimeout(scrollTo, 100, 0, 1); }

	app.init = function () {
		app.pageLink();
		app.menuBtn();
		app.comBtn();
		app.menuListCom();
		app.urlCopy();
	}
	
	app.pageLink = function () {
	  $('a[href^="#"]').on('click', function() {
	    var speed = 400;
	    var href= $(this).attr("href");
	    var target = $(href == "#" || href == "" ? 'html' : href);
	    var position = target.offset().top -82;
	    $('body,html').animate({scrollTop:position}, speed, 'swing');
	    return false;
	  });
	}

	app.menuToggle = function(){
		menuFlg *= -1;
		if(menuFlg === -1){
			$('.menuTrigger').removeClass('active');
			$('.menuArea').hide();
		}else{
			$('.menuTrigger').addClass('active');
			$('.menuArea').show();
		}
	}

	app.menuBtn = function() {
		$('.menuTrigger').on('click',function(){
			app.menuToggle();
		});
	}

	app.urlCopy = function(){
		var clipboard = new Clipboard('.urlCopy');
		$('.urlCopy').attr('data-clipboard-text',location.href);
    clipboard.on('success', function(e) {
			$('.copyFlg').text('コピーできました!').fadeIn().fadeOut(1500);
		});
		clipboard.on('error', function(e) {
			$('.copyFlg').text('コピーできました!').fadeIn().fadeOut(1500);
		});
	}

	app.comToggle = function() {
		comFlg *= -1;
		if(comFlg === -1){
			$('.com-add').hide();
			$('.com-open').show();
		}else{
			$('.com-add').show();
			$('.com-open').hide();
		}
	}

	app.comBtn = function() {
		$('.com-switch').on('click',function(){
			app.comToggle();
		});
	}

	app.menuListCom = function() {
		$('.menuListCom').on('click',function(){
			app.menuToggle();
		  $('.com-open').hide();
		  $('.com-add').show();
		});
	}



	app.init();



});