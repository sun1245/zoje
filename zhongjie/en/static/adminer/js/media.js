// media 资源上传
define(['jquery', 'adminer/js/ui', 'template', 'tools',
    'jquery.ui.widget', 'jquery.iframe-transport', 'jquery.fileupload-process', 'jquery.fileupload',
    'jquery.number', 'jquery.xdr-transport'
  ],
  function($, ui, template, tools) {

    // TODO:: add callback for done

    var media = {};

    // 异步删除数据
    media.del = function(id) {
      //通过FID处理删除
      // 清理不合法。
      if (!id) {
        return;
      }

      $.ajax({
          type: "POST",
          url: UPLOADDO_URL + 'delete',
          data: {
            ids: id,
            _cfs: $.cookie('_cfc'),
            _method: "DELETE"
          },
          dataType: 'json'
        })
        .done(function(data) {
          var status = "error";
          if (data.status + 0 === 0) {
            console.log('delete error!');
          } else {
            status = 'notie';
            // $('#upload-modal').find('.js-goal a[data-del="' + id + '"]').parents('.js-goal').remove();
            // var input_name = $('.js-goal[data-id=' + id + ']').parents('.js-img-list-f').prev()
              // .find('input[type=hidden].form-upload').attr('name');
            _t = $('.js-goal[data-id="' + id + '"]');
            var input_name = _t.parents('.js-img-list-f').attr('id').replace('js-','').replace('-show','');
            _t.remove();
            // 整理界面
            media.ui_del(id, input_name);
            // 额外删除的效果的处理
            if (typeof media.del_done !== 'undefined' && media.del_done instanceof Function) {
              media.del_done(id, input_name);
            }
          }
          $.pnotify({
            title: '删除文件',
            text: data.msg,
            type: status,
            animation: 'fade'
          });
        })
        .fail(function(XMLHttpRequest, textStatus, errorThrown) {
          var m = XMLHttpRequest.responseJSON;
          $.pnotify({
            title: "错误提示！",
            text: m.msg,
            type: "error",
            animation: 'fade'
          });
        });
    };

    // 为 upload model提供删除显示区域内对应的图片
    // id 接受upload id , input_name 为回传表单的name值，下同
    media.ui_del = function(id, input_name) {
      // 对单个存储的单独处理
      if ($('input[name=' + input_name + ']').attr('data-more') - 0 ===
        0) {
        if (id == $('input[name=' + input_name + ']').val()) {
          $('input[name=' + input_name + ']').val('');
          $('input[name=' + input_name + ']').next('input[name=thumb]').val('');
        }
        // $('#js-' + input_name + '-show').find('.js-goal a[data-del="' + id + '"]').parents('.js-goal').remove();
      } else {
        // $('#js-' + input_name + '-show').find('.js-goal a[data-del="' + id + '"]').parents('.js-goal').remove();
        // 重新裝弹
        var fids = '';
        $('#js-' + input_name + '-show div[data-id]').each(function(index, el) {
          if (index === 0) {
            $('input[name=' + input_name + ']').next('input[name=thumb]').val($(el).attr('data-thumb'));
            fids = $(el).attr('data-id');
          } else {
            if ($(el).attr('data-id')) {
              fids += ',' + $(el).attr('data-id');
            }
          }
        });
        $('input[name=' + input_name + ']').val(fids);
      }
    };

    // 上传结束后整理表单
    media.done = function(tdata, input_name) {
      // 单个
      if ($('input[name=' + input_name + ']').attr('data-more') - 0 === 0) {
        tdata.it = tdata.list[0];
        var html = template.render('tpl-photo-show', tdata);
        $('#js-' + input_name + '-show').html(html);
        // console.log(tdata);

        var old_id = $('input[name=' + input_name + ']').val();
        if (old_id) {
          media.del(old_id);
        }

        // 为表单填充数据
        $('input[name=' + input_name + ']').val(tdata.list[0].id);
        $('input[name=' + input_name + ']').next().val(tdata.list[0].thumb);
      } else {
        // 多个
        var str_html = template.render('tpl-photos-show', tdata);
        $('#js-' + input_name + '-show').append(str_html);

        //  填充表单
        var fids = '';
        $('#js-' + input_name + '-show div[data-id]').each(function(index, el) {
          if (index === 0) {
            $('input[name=' + input_name + ']').next('input[name=thumb]').val($(el).attr('data-thumb'));
            fids = $(el).attr('data-id');
          } else {
            if ($(el).attr('data-id')) {
              fids += ',' + $(el).attr('data-id');
            }
          }
        });
        $('input[name=' + input_name + ']').val(fids);
      }
    };

    // 加载默认的图片
    media.show = function(tdata, input_name) {
      if (tdata && typeof tdata != 'undefined' && !tools.isEmpty(tdata)) {
        var data; // 数据
        var html; // 模板容器

        if (tdata instanceof Array) {
          data = {
            upload_url: UPLOAD_URL,
            static_url: STATIC_URL,
            list: tdata
          };
          html = template.render('tpl-photos-show', data);
        } else {
          data = {
            upload_url: UPLOAD_URL,
            static_url: STATIC_URL,
            it: tdata
          };
          html = template.render('tpl-photo-show', data);
        }

        $('#js-' + input_name + '-show').html(html);
      }
    };

    // 日期，父ID容器,模板artemplate ID, ID 不要带有 `#`
    media.get_day_list = function(day, domf) {
      $.ajax({
          type: "GET",
          url: UPLOADDO_URL + 'get_day_ajax',
          data: {
            dt: day,
            nocache: Math.random()
          },
          dataType: 'json'
        })
        .done(function(data, textStatus) {
          var html;
          if (data.status + 0 === 0) {
            // html = "没有数据..."
            $.pnotify({
              title: '没有数据',
              text: data.msg,
              type: status,
              animation: 'fade'
            });
          } else {
            data.upload_url = UPLOAD_URL;
            data.static_url = STATIC_URL;
            data.uploado_url = UPLOADDO_URL;
            tdata = data.list;
              console.log(tdata);

            if (tdata instanceof Array) {
              data = {
                upload_url: UPLOAD_URL,
                static_url: STATIC_URL,
                list: tdata
              };
              html = template.render('tpl-photos-show', data);
            } else {
              data = {
                upload_url: UPLOAD_URL,
                static_url: STATIC_URL,
                it: tdata
              };
              html = template.render('tpl-photo-show', data);
            }
          }
          $('#' + domf).html(html);
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
        });
    };

    media.sort = function(input_name) {
      // 多个排序
      $('#js-' + input_name + '-show').sortable({
        update: function(event, ui) {
          //  填充表单
          var fids = '';
          $('#js-' + input_name + '-show div[data-id]').each(function(index, el) {
            if (index === 0) {
              $('input[name=' + input_name + ']').next('input[name=thumb]').val($(el).attr('data-thumb'));
              fids = $(el).attr('data-id');
            } else {
              if ($(el).attr('data-id')) {
                fids += ',' + $(el).attr('data-id');
              }
            }
          });
          $('input[name=' + input_name + ']').val(fids);
        }
      }).disableSelection();
    };

    media.set_seo = function(id, alt, title) {
      // 更新seo
      // TODO: 添加ajax
      // UPLOADDO_URL+'seo'
    };


    // •   post_max_size
    // •   upload_max_filesize
    // •   max_execution_time
    // •   memory_limit

    // 初始化
    // upload_done 上传结束后处理
    // del_done  删除后触发
    media.init = function(upload_done, del_done) {
      $('input[type="file"].fileupload').each(function(i, e) {
				var uploaddo_url = UPLOADDO_URL;
				if ($(e).attr('data-size') !== undefined) {
					uploaddo_url += '?size=' + $(e).attr('data-size');
				}

        // 上传
        $(e).fileupload({
          url: uploaddo_url,
          dataType: 'json',
          formData: {
            _cfs: $.cookie('_cfc')
          },
          fail: function(XMLHttpRequest, textStatus, errorThrown) {
            var m = XMLHttpRequest.responseJSON;
            $.pnotify({
              title: "错误",
              text: m + "上传错误，请联系管理员！",
              type: "error",
              animation: 'fade'
            });
          },
          done: function(e, data) {
            var list = data.result.files;
            var str_fids = "FID:";

            //转换文件大小为KB
            $.each(data.result.files, function(index, file) {
              list[index].size = $.number(file.size / 1024, 2);
              str_fids += '->' + file.id;
            }); // end each

            if (list[0].error === undefined) {
              $.pnotify({
                title: '上传文件',
                text: '已经上传文件。' + str_fids,
                type: 'success',
                animation: 'fade'
              });

              $('#upload-modal').delay(1000).hide(500); //.find('.progress .progress-bar').delay(3500).css('width','0%');
              // $('#upload-modal .progress .progress-bar').css('width','0%');

              // 为上传列表提供模板支持
              var tdata = {
                upload_url: UPLOAD_URL,
                static_url: STATIC_URL,
                list: list
              };
              var html = template.render('tpl-upload-list', tdata);
              $('#js-upload-list-f').prepend(html);

              // 对应的表单name
              var input_name = "";
              if ($(this).attr('data-for') === undefined) {
                input_name = $(this).parent().next('input[type=hidden]').attr('name');
              }else{
                input_name = $(this).attr('data-for');
              }
              media.del_done = del_done;
              // UI 整理
              media.done(tdata, input_name);
              // 上传后额外UI输出执行函数
              if (typeof upload_done != 'undefined' && upload_done instanceof Function) {
                upload_done(tdata, input_name);
              }

            } else {
              $.pnotify({
                title: '上传失败',
                text: '您的文件不被允许上传，请询问管理员！<br/>'+list[0].error,
                type: 'error',
                animation: 'fade'
              });
            }
          },
          progressall: function(e, data) {
            $('#upload-modal').show(300);
            // $('#upload-modal .progress .progress-bar').show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#upload-modal .progress .progress-bar').css('width',
              progress +
              '%');
            // console.log(progress)
          }
        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
      });

    // 关闭
    $('#upload-modal > .upload-header > a.upload-close').on('click', function(e) {
      e.preventDefault();
      $('#upload-modal').hide();
      $('#js-upload-list-f').html('');
    });

    // 对 daylist 删除
    $('#upload-modal').delegate('li a[data-del]', 'click', function(e) {
      e.preventDefault();
      media.del($(this).attr('data-del'));
    });

    // 显示区域删除图片
    $('.js-img-list-f').delegate('.js-goal a[data-del]', 'click',
      function(e) {
        e.preventDefault();
        if ($(this).attr('data-del')) {
          media.del($(this).attr('data-del'));
        } else {
          $(this).parents('.js-goal').remove();
        }
      });

    // 图片seo
    $('.js-img-list-f').delegate('.js-goal a[data-seo]', 'click', function(e) {
      e.preventDefault();

      var fid = $(this).attr('data-seo');

      $.ajax({
          url: UPLOADDO_URL + 'get_ajax/' + fid,
          type: 'GET',
          dataType: 'JSON'
        })
        .done(function(data) {
          console.log("success");
          console.log(data);
          $('#js-upload-seo-title').val(data.title);
          $('#js-upload-seo-alt').val(data.alt);
          $('#js-upload-seo-text').val(data.text);
          $('#js-upload-seo-name').text(data.name);
          $('#js-upload-seo-save').attr('data-fid', data.id);
          $('#js-upload-seo-modal').modal();
        })
        .fail(function(XMLHttpRequest, textStatus, errorThrown) {
          var m = XMLHttpRequest.responseJSON;
          $.pnotify({
            title: "错误提示！",
            text: m.msg,
            type: "error",
            animation: 'fade'
          });
          $('#' + domf).after(ui.alert('访问数据错误 ：<br />' + m));
        })
        .always(function() {
          console.log("complete");
        });
    });

    // 保存
    $('#js-upload-seo-save').on('click', function(event) {
      event.preventDefault();
      var fid = $(this).attr('data-fid');
      var f = {
        fid: fid,
        alt: $('#js-upload-seo-alt').val(),
        title: $('#js-upload-seo-title').val(),
        text: $('#js-upload-seo-text').val(),
        _cfs: $.cookie('_cfc')
      };

      $.ajax({
          url: UPLOADDO_URL + 'seo_ajax',
          type: 'POST',
          dataType: 'JSON',
          data: f
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
            msg.title = "成功!";
            msg.type = 'success';

          } else {
            msg.title = "错误！";
            msg.type = 'error';
          }
          $.pnotify(msg);

        })
        .fail(function(XMLHttpRequest, textStatus, errorThrown) {
          var m = XMLHttpRequest.responseJSON;
          $.pnotify({
            title: "错误提示！",
            text: m.msg,
            type: "error",
            animation: 'fade'
          });
          $('#' + domf).after(ui.alert('访问数据错误 ：<br />' + m));
        })
        .always(function() {
          console.log("complete");
        });

    });

    ui.fancybox_img();
    require(['adminer/js/crop'],function(crop){
      crop();
    });

  };

    return media;
}); //end define
