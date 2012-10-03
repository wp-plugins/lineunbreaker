//jQuery(document).ready(function($) {
//	var button = '<input id="lineunbreaker_qtag" class="ed_button" type="button" value="Lineunbreak" />';
//	alert($('#ed_toolbar').html());
//	$('#ed_toolbar').append('TEST');
//});
QTags.addButton( 'lineunbreaker', '!br', lineunbreaker_qtags );
function lineunbreaker_qtags() { 
	var ed = jQuery('#content');
	var len = ed.val().length;
	var start = ed[0].selectionStart;
	var end = ed[0].selectionEnd;
	var selectedContent = ed.val().substring(start, end);

	var contentClean = selectedContent.replace(/(\r\n|\n|\r|<br\s*[\/]?>)/gim, ' ');
	ed.val(ed.val().substring(0, start) + contentClean + ed.val().substring(end, len));
}



