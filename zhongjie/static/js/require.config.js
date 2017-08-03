requirejs.config({
	baseUrl: STATIC_URL,
	urlArgs: STATIC_VER,
	paths: {
		// jquery
		'jquery': ['js/jquery-1.10.2.min'],
		// underscore
		'underscore': [
			// '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min',
			// 'js/underscore-min'
			'js/lodash'
		],
		'lodash': 'js/lodash.min',
		'backbone': ['js/backbone-min'],
		'react': ['js/react/react.min'],
		'react-with-addons': ['js/react/react-with-addons.min'],
		'JSXTransformer': ['js/react/JSXTransformer'],
		'less': ['js/less.min'],

		// bootstrap
		'bootstrap': ['js/bootstrap.min'],
		'bootstrap-bootbox': ['js/bootstrap-bootbox.min'],
		'bootstrap-select': ['js/bootstrap-select.min'],
		'bootstrap-datepicker': ['js/bootstrap-datepicker.min'],
		'bootstrap-datepicker.zh': 'js/locales/bootstrap-datepicker.zh-CN',
		'bootstrap-datetimepicker': ['js/bootstrap-datetimepicker.min'],
		'bootstrap-datetimepicker.zh': 'js/locales/bootstrap-datetimepicker.zh-CN',
		// jquery plugin
		'jquery.validate': ['js/jquery.validate.min'],
		'jquery.validate.cn': 'js/jquery.validate.lang.cn',
		'jquery.validate.extend': 'js/jquery.validate.extend',
		'jquery.pnotify': ['js/jquery.pnotify.min'],
		'jquery.fileDownload': ['js/jquery.fileDownload.min'],
		'jquery.cookie': ['js/jquery.cookie.min'],
		'jquery.fancybox': ['js/jquery.fancybox.min'],
		'jquery.ui': ['js/jquery-ui-1.10.3.custom.min'],
		'jquery.Jcrop': ['js/jquery.Jcrop'],

		// upload
		'jquery.ui.widget': 'js/vendor/jquery.ui.widget.min',
		'jquery.iframe-transport': ['js/jquery.iframe-transport.min'],
		'jquery.fileupload-process': ['js/jquery.fileupload-process.min'],
		'jquery.fileupload': ['js/jquery.fileupload.min'],
		'jquery.fileupload-ui':[
			// 'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.7/jquery.fileupload-ui.min'
		],
		'jquery.fileupload-validate':[
			'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.7/jquery.fileupload-validate.min'
		],
		'jquery.xdr-transport': [
			// 'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.7/cors/jquery.xdr-transport.min',
			'js/jquery.xdr-transport'],

		'jquery.number': 'js/jquery.number.min',
		'numeral':['js/numeral.min'],

		'template': 'js/template.min',
		// ueditor
		'ueditor': 'editor/ueditor.all.min',
		'ueditorConfig': 'editor/ueditor.config',
		'ZeroClipboard': 'editor/third-party/zeroclipboard/ZeroClipboard.min',

		'libs': 'js/libs',
		'tools': 'js/tools',

		// plugin
		style: 'js/requirejs.css'
	},
	shim: {
		'jquery': {
			exports: ['$', 'jQuery']
		},
		'libs': ['jquery'],
		'react': {
			exports: 'React'
		},
		'react-with-addons': ['react'],
		'JSXTransformer': ['react'],
		'underscore': {exports: '_'},
		'lodash': {exports: '_'},
		'backbone': {
			deps: ['underscore', 'jquery'],
			exports: 'Backbone'
		},

		'bootstrap': ['jquery',
			// 'style!css/bootstrap.css',
			// 'style!css/bootstrap-responsive.css',
			// 'style!css/font-awesome'
		],
		'bootstrap-bootbox': ['jquery', 'bootstrap'],
		'bootstrap-select': ['jquery', 'style!css/bootstrap-select.css'],

		'bootstrap-datepicker': ['jquery', 'bootstrap',
			'style!css/bootstrap-datepicker.css'
		],
		'bootstrap-datepicker.zh': ['jquery', 'bootstrap-datepicker'],
		'bootstrap-datetimepicker': ['jquery', 'bootstrap',
			'style!css/bootstrap-datetimepicker.css'
		],
		'bootstrap-datetimepicker.zh': ['jquery', 'bootstrap-datetimepicker'],

		'jquery.ui.widget': ['jquery'],
		'jquery.validate': ['jquery'],
		'jquery.validate.cn': ['jquery', 'jquery.validate'],
		'jquery.validate.extend': ['jquery', 'jquery.validate'],
		'jquery.pnotify': ['jquery', 'style!css/jquery.pnotify.css'],
		'jquery.fileDownload': ['jquery'],
		'jquery.cookie': ['jquery'],
		'jquery.fancybox': ['jquery', 'style!css/jquery.fancybox.min.css'],
		'jquery.ui': ['jquery'],
		'jquery.Jcrop': ['jquery', 'style!css/jquery.Jcrop.min'],

		'jquery.number': ['jquery'],

		'ueditor': {
			deps: ['ueditorConfig', 'ZeroClipboard']
		},
		'tools':{
			exports:['tools']
		}
	},
	deps: ['libs']
});
