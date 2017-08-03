require(['jquery', 'tools', 'adminer/js/ui'], function($, tools, ui) {

  var passwd_rule = {
    rules: {
      // pwdo: {
      // 	required:true,
      // 	minlength:6,
      // 	maxlength:30
      // },
      pwd: {
        required: true,
        minlength: 6,
        maxlength: 30
      },
      pwdre: {
        required: true,
        minlength: 6,
        maxlength: 30,
        equalTo: "#pwd"
      }
    },
    messages: {
      // pwdo: {
      // 	required : "你不能不输入 原密码！",
      // 	minlength: "输入字符数不的小于 {0}！",
      // 	maxlength: "输入字符数不的大于 {0}！",
      // },
      pwd: {
        required: "你不能不输入 密码！",
        minlength: "输入字符数不的小于 {0}！",
        maxlength: "输入字符数不的大于 {0}！",
      },
      pwdre: {
        required: "密码必须验证！",
        minlength: "输入字符数不的小于 {0}！",
        maxlength: "输入字符数不的大于 {0}！",
        equalTo: "必须输入一致的密码!"
      }
    },
    ajaxfun: function(form) {
      url = $(form).attr('action') + "/" + $(form).attr('mid');
      console.log(url);
      $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
          data: {
            pwdo: $('input#pwdo').val(),
            pwd: $('input#pwd').val(),
            pwdre: $('input#pwdre').val(),
            _cfs: $.cookie('_cfc'),
            mid: $(form).attr('mid')
          },
          success: function(data) {
            console.log('处理');
            var status;
            if (data.status === 0) {
              status = "error";
            } else if (data.status == 1) {
              status = "success";
            }
            $('#ajax-msg').html(ui.alert(data.msg, status));
            $.pnotify({
              title: "密码修改",
              text: data.msg,
              type: status,
              delay: 3000
            });
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function(XMLHttpRequest, textStatus, errorThrown) {
          var m = XMLHttpRequest.responseJSON;
          $.pnotify({
            title: "错误提示！",
            text: m.msg,
            type: "error",
            animation: 'fade'
          });
          $('#' + domf).after(ui.alert('访问数据列表错误 ：<br />' + m));
        })
        .always(function() {
          console.log("complete");
        });
    }
  };

  // jQuery.getScript(validate_url,function(){
  tools.make_validate_submit('frm-pwd', passwd_rule.rules, passwd_rule.messages, passwd_rule.ajaxfun);
  // });

  $('.ajax-passwd').on('click', function(event) {
    event.preventDefault();
    mid = $(this).attr('data-rel');
    $('#frm-pwd').attr('mid', mid);
  });
});
