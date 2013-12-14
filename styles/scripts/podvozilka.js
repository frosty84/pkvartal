$(document).ready( function() {
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
});
