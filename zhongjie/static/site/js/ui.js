(function(mod) {
  if (typeof exports == "object" && typeof module == "object") // CommonJS 规范
    module.exports = mod;
  else if (typeof define == "function" && define.amd) // AMD 规范
    return define(['jquery'], mod);
  else // Plain browser env 浏览器
    this.tools = mod;
})(function() {

  var ui = {};

  // 省市切换
  ui.province = {
    // template
    /* -------------------------------------------------------------
	<select id="pv..." class='bselect province'></select>
	<select class='bselect province_city'></select>
	<script>
	province.init($('#pv'));
	// or 带有位置初始化
	var loc = {
		'province': 1
		,'city': 1
	}
	province.init($('#pv'),loc);
	</script>
	-------------------------------------------------------------*/
    url_province: SITE_URL + 'province/province_ajax',
    url_province_city: SITE_URL + 'province/city_ajax',
    init: function(pv) {
      l = arguments[1] ? arguments[1] : 0;
      $.ajax({
          url: this.url_province,
          type: 'GET',
          dataType: 'json'
        })
        .done(function(data) {
          op = '';
          $.each(data, function(index, el) {
            if (l && l.province == el.id) {
              op += '<option selected="selected" value="' + el.id + '">';
            } else {
              op += '<option value="' + el.id + '">';
            }
            op += el.title;
            op += '</option>';
          });
          console.log(op);
          pv.append(op);
        });

      _city = pv.next('.province_city');

      if (l) {
        ui.province.get_city(l.province, _city, l.city);
      } else {
        ui.province.get_city(1, _city);
      }

      // 省选择进行处理
      $(pv).on('change', function(event) {
        pid = $(this).val();
        _province = $(this);
        _city = $(this).next('.province_city');
        ui.province.get_city(pid, _city);
      });
    },
    // pid 省ID city为city select的对象
    get_city: function(pid, city) {
      var lc = arguments[2] ? arguments[2] : 0;
      $.ajax({
          url: this.url_province_city,
          type: 'GET',
          dataType: 'json',
          data: {
            pid: pid
          }
        })
        .done(function(data) {
          op = '';
          $.each(data, function(index, el) {
            if (lc && lc == el.id) {
              op += '<option selected="selected" value="' + el.id + '">';
            } else {
              op += '<option value="' + el.id + '">';
            }
            op += el.title;
            op += '</option>';
          });
          city.html('');
          city.append(op);
        });
    }
  };

	return ui;

});
