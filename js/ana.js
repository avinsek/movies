(function ($, global) {
	var $el = $('table > tbody > tr > td > img').eq(0);
	
	$el.on('click', function() { $el.css('width', Math.random() * 100); });
}(this.jQuery, this));
