//Funcion para saber si existe una alerta y posicionarla al centro en "X" y en una posicion cercana en "Y"
$(document).ready(function() {
    if($('.panel > img').width() >= $('.panel').width()) {
		$('.panel > img').css({'width':'98%','margin':'0 auto'});
	}
	
	if($("#menu-left").length > 0){
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
	
	if($('.alerta').length > 0){
		var ancho = $(document).width();
		var alto = $(document).height();
		var alertaw = $('.alerta').width();
		var pos = $('.alerta').position();
		$(this).css({'left':(ancho - alertaw)/2+'px','top':(alto - pos.left)+'px'});
	}
	
	if($('.cerrar-ventana').length > 0){
		$('.cerrar-ventana').click(function(){
			$(this).parent(this).removeClass("slideLeft").css({'visibility':'hidden'});
		});
	}
	
	if($('.cancelar').length > 0){
		$('.cancelar').click(function(){
			$(this).parent(this).removeClass("slideLeft").css({'visibility':'hidden'});
			return false;
		});
	}
	
	if($('.imprimir').length > 0){
		$('.imprimir').click(function(){
			$(this).parent(this).removeClass("slideLeft").css({'visibility':'hidden'});
			window.print();
			return false;
		});
	}
	
	if($('#show-password').length > 0){
		$('#show-password').on('change', function () {
			$('#password').hideShowPassword($(this).prop('checked'));
		});
	}
	
	if($('.btn-printer').length > 0){
		$('.btn-printer').click(function(){
			$('.alerta').addClass("slideLeft");
			return false;
		});
	}
	
	$.ionSound({
    	sounds: [
        	"beer_can_opening",
			"button_tiny",
			"pop_cork",
			"tap",
			"water_droplet",
			"water_droplet_3"
        ],
        path: "sounds/",
        multiPlay: true,
        volume: "0.5"
    });
	
    $("#menu-left li").on("mouseenter", function(){
    	$.ionSound.play("beer_can_opening");
    });
	$(".btn-opciones").on("mousedown", function(){
    	$.ionSound.play("button_tiny");
    });
	$(".boton, .cerrar-ventana").on("mousedown", function(){
		$.ionSound.play("pop_cork");
    });
	$(".botones-accion").on("mouseover", function(){
        $.ionSound.play("water_droplet");
    });
	$(".botones-accion").on("mousedown", function(){
    	$.ionSound.play("water_droplet_3");
    });
	
});

jQuery(function($) {
	if($('form').length > 0){
		$('form').superLabels({
			labelLeft:10,
			labelTop:5
		});
	}
});