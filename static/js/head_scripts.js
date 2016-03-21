/*
---------------------------------
	Main Menu
---------------------------------
*/

 $(document).ready(function(){ 
	$("ul.sf-menu").supersubs({ 
		minWidth:    15, //min width in em
		maxWidth:    20,
		extraWidth:  1 
	}).superfish({
		delay:	0,
		animation: {height:'show'}
	});
}); 

/*
---------------------------------
	Forms
---------------------------------
*/ 

/* Equal fields */
function equalHeight(group) {
	var tallest = 0;
	group.each(function() { 
		var thisHeight = jQuery(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}
jQuery(document).ready(function() {
	equalHeight(jQuery(".formee-equal"));
});
jQuery(window).resize(function() {
	equalHeight(jQuery(".formee-equal"));
});


/*
---------------------------------
	Form validation
---------------------------------
*/
jQuery(document).ready(function(){
	jQuery("#form_id1").validationEngine('attach', {promptPosition : "bottomRight", autoPositionUpdate : true});
	jQuery("#form_id2").validationEngine('attach', {promptPosition : "bottomRight", autoPositionUpdate : true});
});


/*
---------------------------------
	AutoGrow Textarea
---------------------------------
*/
jQuery(document).ready(function(){
    jQuery(".txt_autogrow").autoGrow();
});


/*
---------------------------------
	MultiSelect
---------------------------------
*/

jQuery(function(){
  jQuery(".multiselect1").multiselect({sortable: true, searchable: true});
});

/*
---------------------------------
	Color Picker
---------------------------------
*/

/* Flat Mode */
jQuery('#colorpickerHolder').ColorPicker({flat: true});

/* Input element */
jQuery('#colorpickerField1, #colorpickerField2, #colorpickerField3').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});

/* Div color */
jQuery('#colorSelector').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		jQuery(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		jQuery(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		jQuery('#colorSelector div').css('backgroundColor', '#' + hex);
	}
});



/*
---------------------------------
	Autotab
---------------------------------
*/

/*!
 --  all (default): Any character
 --  text: Any character except numbers 0 through 9
 --  alpha: A through Z
 --  numeric: 0 through 9
 --  number: Identical to numeric
 --  alphanumeric: A through Z and 0 through 9
 
 ----------------------------------------------
 
 --  format    - The filtering method of the text field. Available filtering options are listed above.
 --  uppercase - Converts any text to uppercase.
 --  lowercase - Converts any text to lowercase.
 --  nospace   - Removes any spaces.
 --  pattern   - A regular expression pattern to use for custom formats.
*/

jQuery(document).ready(function() {
	jQuery('#aField1, #aField2, #aField3, #aField4, #aField5').autotab_magic().autotab_filter('all');
	jQuery('#aField6, #aField7, #aField8, #aField9, #aField10').autotab_magic().autotab_filter('text');
	jQuery('#aField11, #aField12, #aField13, #aField14, #aField15').autotab_magic().autotab_filter({
		format: 'alpha',
		uppercase: true
	});
	jQuery('#aField16, #aField17, #aField18, #aField19, #aField20').autotab_magic().autotab_filter('numeric');
	jQuery('#aField21, #aField22, #aField23, #aField24, #aField25').autotab_magic().autotab_filter('number');
	jQuery('#aField26, #aField27, #aField28, #aField29, #aField30').autotab_magic().autotab_filter('alphanumeric');
	
	//Custom example(phone)
	jQuery('#aField31, #aField32, #aField33').autotab_magic().autotab_filter('numeric');
});



/*
---------------------------------
	Spinner elements
---------------------------------
*/

jQuery(document).ready(function(){
	jQuery.spin.imageBasePath = 'plugins/spin/img/spin1/';
	jQuery('#spin1').spin();
	jQuery('#spin2').spin({
		interval: 5
	});
	jQuery('#spin3').spin({
		max: 10,
		min: -5
	});
	jQuery('#spin4').spin({
		timeInterval: 250
	});
	jQuery('#spin5').spin({
		interval: 0.01
	});
	jQuery('#spin6').spin({
		lock: true
	});
	jQuery('#spin7').spin({
		beforeChange: function(n,o){
			//jQuery('<span>'+o+' to '+n+'</span>').appendTo(jQuery('#spin_console'));
			jQuery('#spin_console').text(o+' to '+n).show().fadeOut(400);
		}
	});
});



/*
---------------------------------
	Tags select
---------------------------------
*/

jQuery( document ).ready(function(){
	jQuery('.tags_select a').click(function() {
		var value = jQuery(this).text();
		var input = jQuery('#quick_tags');
		input.val(input.val() + value + ', ');
		jQuery(this).fadeTo("slow", 0.33);
		return false;
	});
});



/*
---------------------------------
	Plupload
---------------------------------
*/

// Convert divs to queue widgets when the DOM is ready
jQuery(function() {
	jQuery("#uploader, #uploader2").pluploadQueue({
		// General settings
		runtimes : 'gears,flash,silverlight,browserplus,html5',
		url : 'plugins/plupload/upload.php',
		max_file_size : '10mb',
		chunk_size : '1mb',
		unique_names : true,

		// Resize images on clientside if we can
		resize : {width : 320, height : 240, quality : 90},

		// Specify what files to browse for
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		],

		// Flash settings
		flash_swf_url : 'plugins/plupload/js/plupload.flash.swf',

		// Silverlight settings
		silverlight_xap_url : 'plugins/plupload/js/plupload.silverlight.xap'
	});
});




/*
---------------------------------
	ElFinder (File explorer)
---------------------------------
*/

jQuery().ready(function() {
	
	jQuery('#finder').elfinder({
		url : 'plugins/fileexplorer/connectors/php/connector.php',
		lang : 'en'
	})
	
});




/*
---------------------------------
	Prettify [sytanx highlighter]
---------------------------------
*/
jQuery( document ).ready(function(){
	$('pre, code').addClass('prettyprint');
	prettyPrint();
});



/*
---------------------------------
	Toast messages
---------------------------------
*/

/*Success*/
function showSuccessToast() {
	jQuery().toastmessage('showSuccessToast', "Success Dialog which is fading away");
}
function showStickySuccessToast() {
	jQuery().toastmessage('showToast', {
		text     : 'Success Dialog which is sticky',
		sticky   : true,
		position : 'top-right',
		type     : 'success',
		closeText: '',
		close    : function () {
			console.log("toast is closed ...");
		}
	});

}
/*Notice*/
function showNoticeToast() {
	jQuery().toastmessage('showNoticeToast', "Notice  Dialog which is fading away");
}
function showStickyNoticeToast() {
	jQuery().toastmessage('showToast', {
		 text     : 'Notice Dialog which is sticky',
		 sticky   : true,
		 position : 'top-right',
		 type     : 'notice',
		 closeText: '',
		 close    : function () {console.log("toast is closed ...");}
	});
}
/*Warning*/
function showWarningToast() {
	jQuery().toastmessage('showWarningToast', "Warning Dialog which is fading away");
}
function showStickyWarningToast() {
	jQuery().toastmessage('showToast', {
		text     : 'Warning Dialog which is sticky',
		sticky   : true,
		position : 'top-right',
		type     : 'warning',
		closeText: '',
		close    : function () {
			console.log("toast is closed ...");
		}
	});
}
/*Error*/
function showErrorToast() {
	jQuery().toastmessage('showErrorToast', "Error Dialog which is fading away");
}
function showStickyErrorToast() {
	jQuery().toastmessage('showToast', {
		text     : 'Error Dialog which is sticky',
		sticky   : true,
		position : 'top-right',
		type     : 'error',
		closeText: '',
		close    : function () {
			console.log("toast is closed ...");
		}
	});
};


/*
---------------------------------
	Full Calendar
---------------------------------
*/


$(document).ready(function() {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	var calendar = $('#full_calendar1').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			var title = prompt('Event Title:');
			if (title) {
				calendar.fullCalendar('renderEvent',
					{
						title: title,
						start: start,
						end: end,
						allDay: allDay
					},
					true // make the event "stick"
				);
			}
			calendar.fullCalendar('unselect');
		},
		editable: true,
		events: [
			{
				title: 'All Day Event',
				start: new Date(y, m, 1)
			},
			{
				title: 'Long Event',
				start: new Date(y, m, d-7),
				end: new Date(y, m, d-5)
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d-3, 16, 0),
				allDay: false
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d+4, 16, 0),
				allDay: false
			},
			{
				title: 'Meeting',
				start: new Date(y, m, d, 10, 30),
				allDay: false
			},
			{
				title: 'Lunch',
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d, 14, 0),
				allDay: false
			},
			{
				title: 'Birthday Party',
				start: new Date(y, m, d+1, 19, 0),
				end: new Date(y, m, d+1, 22, 30),
				allDay: false,
				className: 'fc-event-skin-green'
			},
			{
				title: 'Click for Google',
				start: new Date(y, m, 28),
				end: new Date(y, m, 29),
				url: 'http://google.com/'
			}
		]
	});
	
});



/*
---------------------------------
	Full Calendar on Homepage
---------------------------------
*/


$(document).ready(function() {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	var calendar = $('#full_calendar_home').fullCalendar({
		header: false,
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			var title = prompt('Event Title:');
			if (title) {
				calendar.fullCalendar('renderEvent',
					{
						title: title,
						start: start,
						end: end,
						allDay: allDay
					},
					true // make the event "stick"
				);
			}
			calendar.fullCalendar('unselect');
		},
		editable: true,
		events: [
			{
				title: 'All Day Event',
				start: new Date(y, m, 1),
				className: 'fc-event-skin-gray'
			},
			{
				title: 'Long Event',
				start: new Date(y, m, d-7),
				end: new Date(y, m, d-5),
				className: 'fc-event-skin-gray'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d-3, 16, 0),
				allDay: false,
				className: 'fc-event-skin-gray'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d+4, 16, 0),
				allDay: false,
				className: 'fc-event-skin-gray'
			},
			{
				title: 'Meeting',
				start: new Date(y, m, d-1, 10, 30),
				allDay: false,
				className: 'fc-event-skin-gray'
			},
			{
				title: 'Lunch',
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d, 14, 0),
				allDay: false,
				className: 'fc-event-skin-gray'
			},
			{
				title: 'Birthday Party',
				start: new Date(y, m, d+11, 19, 0),
				allDay: false,
				className: 'fc-event-skin-gray'
			},
			{
				title: 'Another event',
				start: new Date(y, m, d+7, 25),
				allDay: false,
				className: 'fc-event-skin-gray'
			},
			{
				title: 'Party start',
				start: new Date(y, m, d+2, 0),
				end: new Date(y, m, d+4, 0),
				allDay: false,
				className: 'fc-event-skin-gray'
			}
		]
	});
	
});


