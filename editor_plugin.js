(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('postquran');

	tinymce.create('tinymce.plugins.PostQuranPlugin', {
		/**
		 * Kata dokumentasinya sich :
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {

			// Register button
			ed.addButton('postquran', {
				title	: 'postquran.postQuran',
				cmd		: 'mceExample',
				image	: url + '/images/quran.png'
			});
			
			//Register command
			ed.addCommand('mceExample', function() {
				var post_id = tinymce.DOM.get('post_ID').value;
				ed.windowManager.open({					
					file	: url + '/dialog.php?post_id=' + post_id + '&act=insert',
					width	: 300,
					height	: 150,
					inline	: 1
				}, {
					plugin_url		: url, // Plugin absolute URL
					some_custom_arg : 'custom arg' // Custom argument
				});
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			/**
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('example', n.nodeName == 'IMG');
			});
			**/
		},

		/**
		 * Kata dokumentasinya sich :
		 *
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl : function(n, cm) {
			return null;
		},

		/**
		 * Kata dokumentasinya sich :
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname	: 'Post Quran plugin',
				author		: 'No Authors',
				authorurl	: 'http://pashamahardika.co.cc',
				infourl		: 'http://pashamahardika.co.cc',
				version		: "1.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('postquran', tinymce.plugins.PostQuranPlugin);
})();
