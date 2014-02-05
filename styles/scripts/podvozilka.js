﻿$(document).ready( function() {
	$(".bringme_prompt").click( function() {
		var ids = $(this).attr('id').split("_");
		var event_id = ids[1];
		var user_id = ids[2];
		var options = {
			buttons: {
				confirm: {
					text: 'Okie',
					className: 'blue',
					action: function(e) {
					
						$.ajax({
						  type: "POST",
						  url: "podvozilka.php",
						  data: "action=bringmeup&event_id="+event_id+"&user_id="+user_id+"&message="+e.input,
						  success: function(msg){
							alert( "Прибыли данные: " + msg );
							Apprise('close');
						  },
						  error: function(msg){
							alert( "Что-то пошло не так" );
							Apprise('close');
						  }
						});
						//alert(e.input);
						//$('#custom-response').html('You clicked the "Okie" button! You said: "' + e.input + '"');
						//console.log(e);
					}
				},
			},
			input: true,
		};

		Apprise('hi', options);
	});			

	jQuery("#list2").jqGrid({
		url:'server.php?q=2',
		datatype: "json",
		colNames:['Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'],
		colModel:[
			{name:'id',index:'id', width:55},
			{name:'invdate',index:'invdate', width:90},
			{name:'name',index:'name asc, invdate', width:100},
			{name:'amount',index:'amount', width:80, align:"right"},
			{name:'tax',index:'tax', width:80, align:"right"},		
			{name:'total',index:'total', width:80,align:"right"},		
			{name:'note',index:'note', width:150, sortable:false}		
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: '#pager2',
		sortname: 'id',
		viewrecords: true,
		sortorder: "desc",
		caption:"JSON Example"
	});
	jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});	
});
