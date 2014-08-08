//tab effects
var o=$.noConflict();
var TabbedContent = {
	init: function() {	
		o(".tab_item").mouseover(function() {
		
			var background = o(this).parent().find(".moving_bg");
			
			o(background).stop().animate({
				left: o(this).position()['left']
			}, {
				duration: 300
			});
			
			TabbedContent.slideContent(o(this));
			
		});
	},
	
	slideContent: function(obj) {
		
		var margin = o(obj).parent().parent().find(".slide_content").width();
		margin = margin * (o(obj).prevAll().size() - 1);
		margin = margin * -1;
		
		o(obj).parent().parent().find(".tabslider").stop().animate({
			marginLeft: margin + "px"
		}, {
			duration: 300
		});
	}
}

o(document).ready(function() {
	TabbedContent.init();
});