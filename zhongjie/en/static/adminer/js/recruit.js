require(['adminer/js/ui', 'jquery', 'tools', 'bootstrap-datepicker.zh'], function(ui, $, tools) {
	// 详细说明
	ui.editor_create('content');
	// 能力要求
	ui.editor_create('requirement');

	$('input.input-datepicker').datepicker({
		language: 'zh-CN',
		format: 'yyyy-mm-dd',
		todayBtn: "linked"
	});

	var recruit = {
		rules: {
			title: {
				required: true,
				minlength: 1,
				maxlength: 100
			},
			amount: {
				required: false,
				minlength: 1,
				maxlength: 100,
				number: true
			},
			timeline: {
				required: true,
				minlength: 1,
				maxlength: 30
			},
			expiretime: {
				required: true,
				minlength: 1,
				maxlength: 30
			},
			department: {
				required: false,
				minlength: 1,
				maxlength: 100
			},
			require: {
				required: false,
				minlength: 1,
				maxlength: 100
			},
			major: {
				required: false,
				minlength: 1,
				maxlength: 100
			},
			gender: {
				required: false,
				minlength: 1,
				maxlength: 100
			},
			age: {
				required: false,
				minlength: 1,
				maxlength: 30,
				number: true
			},
			age_max: {
				required: false,
				minlength: 1,
				maxlength: 30,
				number: true
			},
			edu: {
				required: false,
				minlength: 1,
				maxlength: 100
			},
			experience: {
				required: false,
				minlength: 1,
				maxlength: 100
			},
			place: {
				required: false,
				minlength: 1,
				maxlength: 100
			},
			content: {
				required: false,
				minlength: 1
			},
			requirement: {
				required: false,
				minlength: 1
			}
		},
		messages: {
			title: {
				required: "请输入招聘岗位",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			amount: {
				required: "请输入招聘人数",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！"),
				number: "必须是数字"
			},
			timeline: {
				required: "请选择发布日期",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			expiretime: {
				required: "请选择截止日期",
				minlength: jQuery.format("输入字符数不的小于 {0}！"),
				maxlength: jQuery.format("输入字符数不的大于 {0}！")
			},
			department: {
				required: "请输入招聘部门",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			require: {
				required: "请输入职称要求",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			major: {
				required: "请输入专业要求",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			gender: {
				required: "请输入性别要求",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			age: {
				required: "请输入年龄要求",
				minlength: jQuery.format("输入字符数不的小于 {0}！"),
				maxlength: jQuery.format("输入字符数不的大于 {0}！"),
				number: "请输入数字"
			},
			age_max: {
				required: "请输入年龄要求",
				minlength: jQuery.format("输入字符数不的小于 {0}！"),
				maxlength: jQuery.format("输入字符数不的大于 {0}！"),
				number: "请输入数字"
			},
			edu: {
				required: "请输入学历要求",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			experience: {
				required: "请输入工作经验",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			place: {
				required: "请输入工作地区",
				minlength: jQuery.format("输入字符数不的小于 {0} ！"),
				maxlength: jQuery.format("输入字符数不的大于 {0} ！")
			},
			content: {
				required: "请输入详细说明",
				minlength: jQuery.format("输入字符数不的小于 {0}！")
			},
			requirement: {
				required: "请输入能力要求",
				minlength: jQuery.format("输入字符数不的小于 {0}！")
			}
		}
	};
	tools.make_validate('frm-recruit', recruit.rules, recruit.messages);
});
