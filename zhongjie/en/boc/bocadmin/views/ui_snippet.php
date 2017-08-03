nsippet:


topbtn

div.btn-group>a.ban[href="<?php echo siteurl('controller/index')?>"]{返回列表}+i.icon.icon-hand-left

<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>'); ?>


for edit:

div.boxed>h3{title}+form:post.form-horizontal#frm-create[action="<?php echo current_url()?>"  accept-charset="utf-8"]>div.boxed-inner.seamless{...}+div.boxed-footer>input:h[name="id" value="<?php echo \$it['id']?>"]+input:submit.btn.btn-primay[value="<?php echo lang('submit') ?>"]+input:reset.btn.btn-danger[value="<?php echo lang('reset') ?>"]

text:

div.control-group>label.control-label[for="thename"]{thename}+div.controls>input:text[name="thename" id="thename" value="<?php echo set_value('thename',\$it['thename']); ?>"]+span.help-inline

for create:

div.boxed>h3{title}+form:post.form-horizontal#frm-create[action="<?php echo current_url()?>"]>div.boxed-inner.seamless{...}+div.boxed-footer>+input:submit.btn.btn-primay[value="<?php echo lang('submit') ?>"]+input:reset.btn.btn-danger[value="<?php echo lang('reset') ?>"]


for input:text

div.control-group>label.control-label[for="thename"]{thename:}+div.controls>input:text[name="thename" id="thename"]+span.help-inline


control

div.control-group>label.control-label[for="thename"]{thename:}+div.controls>span.help-inline



div-box:


div.boxed>h3{.}+div.boxed-inner{}+div.boxed-footer{.}


div.boxed>h3{.}+div.boxed-inner{}>ul.boxed-list>li*3


div.boxed>h3{.}+div.boxed-inner.seamless{}>table.table.table-striped.table-hover.select-table>thead>tr>th*3^tbody>tr>td*3


div.model

div.model.hide.fade>div.modal-header>button[type="button" data-dismiss="modal" aria-hidden="true"].close{&times;}+h3{title}^div.modal-body.seamless+div.modal-footer>a.btn.btn-danger[data-dismiss="modal" aria-hidden="true"]{close}

