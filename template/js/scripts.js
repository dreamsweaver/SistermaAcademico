//Funcion para saber si existe una alerta y posicionarla al centro en "X" y en una posicion cercana en "Y"
$(document).ready(function() {
    if($("#menu-left")){
		$(function() {
			$('nav#menu-left').mmenu({
				position	: 'left',
				classes		: 'mm-light',
				labels		: {
					fixed		: !$.mmenu.support.touch
				}
			});
		});
	}
	
	if($('.alerta')){
		var ancho = $(document).width();
		var alto = $(document).height();
		var alertaw = $('.alerta').width();
		var pos = $('.alerta').position();
		$(this).css({'left':(ancho-alertaw)/2+'px','top':(alto-pos.y)+'px'});
	}
	
	if($('.cerrar-ventana')){
		$('.cerrar-ventana').click(function(){
			$(this).parent(this).removeClass("slideLeft").css({'visibility':'hidden'});
		});
	}
	
	if($('.cancelar')){
		$('.cancelar').click(function(){
			$(this).parent(this).removeClass("slideLeft").css({'visibility':'hidden'});
			return false;
		});
	}
	
	if($('.imprimir')){
		$('.imprimir').click(function(){
			$(this).parent(this).removeClass("slideLeft").css({'visibility':'hidden'});
			window.print();
			return false;
		});
	}
	
	if($('#show-password')){
		$('#show-password').on('change', function () {
			$('#password').hideShowPassword($(this).prop('checked'));
		});
	}
	
	if($('.btn-printer')){
		$('.btn-printer').click(function(){
			$('.alerta').addClass("slideLeft");
			return false;
		});
	}
	
	if($('.panel > img').width() >= $('.panel').width()) {
		$('.panel > img').css({'width':'98%','margin':'0 auto'});
	}
	
});

jQuery(function($) {
	$('form').superLabels({
		labelLeft:10,
		labelTop:5
	});
});