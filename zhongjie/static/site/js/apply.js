(function(mod) {
  if (typeof exports == "object" && typeof module == "object") // CommonJS 规范
    module.exports = mod;
  else if (typeof define == "function" && define.amd) // AMD 规范
    return define(['jquery','tools'], mod);
  else // Plain browser env 浏览器
    mod($,tools);
})(function($,tools) {
	var rules = {
		name: {
			required: true,
			minlength: 2,
			maxlength: 100
		},
		email: {
			required: true,
			minlength: 2,
			maxlength: 100,
			email: true
		},
		nation: {
			required: true,
			minlength: 2,
			maxlength: 20
		},
		age: {
			required: true,
			minlength: 2,
			maxlength: 20,
			digits: true
		},
		politic: {
			required: true,
			minlength: 2,
			maxlength: 100
		},
		birthplace: {
			required: true,
			minlength: 2,
			maxlength: 100
		},
		school: {
			required: true,
			minlength: 2,
			maxlength: 100
		},
		major: {
			required: true,
			minlength: 2,
			maxlength: 100
		},
		graduation: {
			required: true,
			minlength: 2,
			maxlength: 100
		},
		tel: {
			required: true,
			minlength: 1,
			maxlength: 20,
			digits: true
		},
		content: {
			required: true,
			minlength: 2,
			maxlength: 100
		},
		captchas: {
			required: true,
			minlength: 1,
			maxlength: 4
		}
	};
	var messages = {
		name: {
			required: "请输入您的姓名!",
			minlength: "",
			maxlength: ""
		},
		email: {
			required: "请输入您的邮箱!",
			minlength: "",
			maxlength: "",
			email: ""
		},
		nation: {
			required: "请输入您的民族!",
			minlength: "",
			maxlength: ""
		},
		age: {
			required: "请输入您的年龄!",
			minlength: "",
			maxlength: "",
			digits: ""
		},
		politic: {
			required: "请输入您的政治面貌!",
			minlength: "",
			maxlength: ""
		},
		birthplace: {
			required: "请输入您的籍贯!",
			minlength: "",
			maxlength: ""
		},
		school: {
			required: "请输入您的毕业学校!",
			minlength: "",
			maxlength: ""
		},
		major: {
			required: "请输入您的专业!",
			minlength: "",
			maxlength: ""
		},
		graduation: {
			required: "请输入您的毕业时间!",
			minlength: "",
			maxlength: ""
		},
		tel: {
			required: "请输入您的联系电话!",
			minlength: "",
			maxlength: "",
			digits: ""
		},
		content: {
			required: "请输入您的个人简历!",
			minlength: "",
			maxlength: ""
		},
		captchas: {
			required: "请输入验证码!",
			minlength: "",
			maxlength: ""
		}
	}
	tools.make_validate('frm-apply', rules, messages);
});
