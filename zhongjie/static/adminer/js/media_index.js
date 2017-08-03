// 测试中心

require(['jquery', 'adminer/js/media', 'bootstrap-datepicker.zh'], function($,
  media) {
  // $(function(){

  media.init(function(tdata) {
    var html = template.render('tpl-img-list', tdata);
    $('#js-img-list-f').prepend(html);
  });

  // 默认当天
  // media.get_dayfile('',$('#dayfiles'));
  // media.get_day_list('', 'js-img-list-f', 'tpl-img-list');

  $('#datepicker').datepicker({
    language: "zh-CN"
  }).on('changeDate', function(ev) {
    // media.get_dayfile(this.value,$('#dayfiles'));
    media.get_day_list(this.value, 'js-img-list-f', 'tpl-img-list');
  });

  // // 鼠标移开关闭
  // $('.datepicker.dropdown-menu').mouseleave(function(){
  //     $("input#datepicker").datepicker('hide').blur();
  // });
  //
  // 当天
  // $('#today').on('click', function() {
  // 	$('#datepicker').val(today);
  // 	// media.get_dayfile(today,$('#dayfiles'));
  // 	media.get_day_list(today, 'js-img-list-f', 'tpl-img-list');
  // });
  //
  // $('#js-img-list-f').delegate('.js-goal a[data-del]','click',function(e){
  //     e.preventDefault();
  //     media.del($(this).attr('data-del'),function(id){
  //       $('#js-img-list-f').find('.js-goal a[data-del="'+id+'"]').parents('.js-goal').remove();
  //     });
  // });

});

// 扩展 for media.js
// function media_done(tdata){
//     var html = template.render('tpl-img-list', tdata);
//     $('#js-img-list-f').prepend(html);
// }

// 为 uploadlist 提供扩展函数
// function media_delete(id){
//     $('#js-img-list-f').find('.js-goal a[data-del="'+id+'"]').parents('.js-goal').remove();
// }
