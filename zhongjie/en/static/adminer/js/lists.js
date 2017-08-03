define(['jquery', 'bootstrap'], function($) {

  // TODO:: sync data

  return function(form_list) {

    $('#btn-create').on('click', function(event) {
      event.preventDefault();
      form_list.action = "create";
      $('#frm-list #title').val('');
      $('#frm-list #content').val('');
      $('#lists-modal').modal();

    });

    $('#crop-modal').on('hide', function(e) {
      location.reload();
    });

    $('.select-list').delegate('.btn-edit', 'click', function(event) {
      event.preventDefault();
      form_list.action = "edit";
      var get_id = $(this).attr('data-id');
      $.ajax({
          url: form_list.url_edit,
          type: 'GET',
          dataType: 'json',
          data: {
            id: get_id
          }
        })
        .done(function(data) {
          console.log(data);
          form_list.id = data.it.id;
          $('#frm-list #title').val(data.it.title);
          $('#frm-list #content').val(data.it.content);
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      $('#lists-modal').modal();
    });

    $('form#frm-list').on('submit', function(event) {
      event.preventDefault();

      var url = '';
      var post_data = {};
      if (form_list.action == 'create') {
        url = form_list.url_create;
        post_data = {
          cid: form_list.cid,
          title: $('#frm-list #title').val(),
          content: $('#frm-list #content').val(),
          _cfs: $.cookie('_cfc')
        };
      } else {
        url = form_list.url_edit;
        post_data = {
          id: form_list.id,
          cid: form_list.cid,
          title: $('#frm-list #title').val(),
          content: $('#frm-list #content').val(),
          _cfs: $.cookie('_cfc')
        };
      }

      $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
          data: post_data
        })
        .done(function(data) {
          console.log("success");
          var msg = {
            title: '',
            text: data.msg,
            type: '',
            delay: 3000
          };
          if (data.status == 1) {
            msg.title = "OK!";
            msg.type = 'success';
            $('#frm-list #title').val('');
            $('#frm-list #content').val('');
          } else {
            msg.title = "错误！";
            msg.type = 'error';
          }
          $.pnotify(msg);
          // TODO: update 更新 li view
          // 模板更新list
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

    });

  }

});
