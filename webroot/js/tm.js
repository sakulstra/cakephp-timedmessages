(function($){
	jQuery.fn.tM = function(options){
		var settings = $.extend({
			
		},options);
		
		$('body').append('<div id="tm-cb-container"></div>');
		var tmContainer = $('div#timedMessages');
		var cbContainer = $('div#tm-cb-container');
		
		tmContainer.find('div.timedMessage').each(function(i,message){
			$(message).bind('oanimationend animationend webkitAnimationEnd', function(e) { 
				$(message).css({'animation':'','display':'none'}).removeClass('tm-active').append("<div class=\"tm-close\" onClick=\"$(this).parent('div').fadeOut();\"></div>").children('div.tm-progress').remove();
				cbContainer.append('<a class="tm-cb '+$(message).data('colorclass')+'" data-target="'+$(message).children('div:first').attr('id')+'" href="#"><div class="'+$(message).data('icon')+'"></div></a>');
				comeback(cbContainer.find('a.tm-cb:last'));
			});
		});
		/* extends the input with [x]*/
		function comeback(targetItem){
			targetItem.click(function(){
				tmContainer.find('div#'+targetItem.data('target')).parent('div').fadeIn().click(function(){
					targetItem.fadeIn();
				});
				targetItem.fadeOut();
			});
		}
	}
})(jQuery);