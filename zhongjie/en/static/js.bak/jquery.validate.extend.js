$(function(){
// 验证身份证
// 需要引用 IDCard.js
jQuery.validator.addMethod(
    "cardid",
    function(value, element) {
        var checkFlag = new clsIDCard(value);
        if (!checkFlag.IsValid()) {
            return false;
        }else{
            return true;
        }
    },
    "输入的身份证号无效,请输入真实的身份证号！"
);

// 邮政编码验证
jQuery.validator.addMethod("isZipCode", function(value, element) {
    var tel = /^[0-9]{6}$/;
    return this.optional(element) || (tel.test(value));
}, "请正确填写您的邮政编码");


// 验证 selected
// 使用方法： selected:默认值
jQuery.validator.addMethod("selected", function(value, element,param) {
    if(value != param){
        return true;
    }else{
        return false;
    }
}, "请选择内容");


});
