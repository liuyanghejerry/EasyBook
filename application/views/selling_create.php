<div id="frame"><div class="white-box" id="create-box"><h2>新建出售</h2><div style="margin:auto"><?=validation_errors()?><?php$attributes = array('id' => 'customForm');echo form_open('selling/validate',$attributes);?><div><?phpecho form_label('书名','name');$attributes = array(              'name'        => 'name',              'id'          => 'name',			  'value' => set_value('name')            );echo form_input($attributes);?></div> <div><?phpecho form_label('作者','author');$attributes = array(              'name'        => 'author',              'id'          => 'author',			  'value' => set_value('author')            );echo form_input($attributes);?></div> <div><?phpecho form_label('ISBN','isbn');$attributes = array(              'name'        => 'isbn',              'id'          => 'isbn',			  'value' => set_value('isbn')            );echo form_input($attributes);?></div> <div><?phpecho form_label('出版社','publisher');$attributes = array(              'name'        => 'publisher',              'id'          => 'publisher',			  'value' => set_value('publisher')            );echo form_input($attributes);?></div> <div><?phpecho form_label('原价','oprice');$attributes = array(              'name'        => 'oprice',              'id'          => 'oprice',			  'value' => set_value('oprice')            );echo form_input($attributes);?></div> <div><?phpecho form_label('现价','nprice');$attributes = array(              'name'        => 'nprice',              'id'          => 'nprice',			  'value' => set_value('nprice')            );echo form_input($attributes);?></div> <div><?=form_label('截止时间','endtime');?><div id="datepicker"></div><?php// echo form_label($datestart,'endtime');$attributes = array(              'name'        => 'endtime',              'id'          => 'endtime',			  'value' => set_value('endtime')            );echo form_hidden('endtime',set_value('endtime'));?></div> <script>// Date.firstDayOfWeek = 0;// Date.format = 'yyyy-mm-dd';// $(function()// {	// $('#datepicker')		// .datePicker({inline:true,startDate:'2011-11-01',endDate:'2011-11-20',showYearNavigation:false})		// .bind(			// 'dateSelected',			// function(e, selectedDate, $td)			// {				// $('input:hidden[name="endtime"]').val(selectedDate);//console.log('You selected ' + selectedDate);			// }		// );// });$('#datepicker').DatePicker({	flat: true,	date: '2012-11-13',	current: '2012-11-13',	calendars: 1,	starts: 1,	locale: {		"days": "日",		"daysShort": "日",		"daysMin": "日",		"months": "月",		"monthsShort": "月",		"week": "周",	}});</script><div>  <?php$attributes = array(              'name'        => 'send',              'id'          => 'send',			  'value'		=> '新建'            );echo form_submit($attributes);?></div> </div></div></div>