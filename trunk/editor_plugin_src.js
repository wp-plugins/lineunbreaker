(function() {
	//tinymce.PluginManager.requireLangPack('lineunbreaker');

	tinymce.create('tinymce.plugins.Lineunbreaker', {
		init : function(ed, url) {
			ed.addCommand('mceLineunbreak', function() {
				var content = ed.selection.getContent();
				var contentClean = content.replace(/(\r\n|\n|\r|<br\s*[\/]?>)/gim, '');
				ed.selection.setContent(contentClean);
			});

			// Register button
			ed.addButton('lineunbreak', {
				title : 'Removes linebreaks from selected text',
				cmd : 'mceLineunbreak',
				image : url + '/img/lineunbreaker.gif'
			});

		},

		getInfo : function() {
			return {
				longname : 'Lineunbreaker',
				author : 'Andre Lohan',
				authorurl : 'http://wordpress.org/extend/plugins/lineunbreaker/',
				infourl : '',
				version : "1.1"
			};
		}
	});

	tinymce.PluginManager.add('lineunbreaker', tinymce.plugins.Lineunbreaker);
})();