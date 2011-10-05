var t = 0;
	var interval = 4000;

	$(function() {
			init();
			t = setTimeout(loadBm, interval);
	});

	function init()
	{
		$.ajax({
			type: "GET",
			url: 'home/startMessages',

			success: function(data) {
					$('#u10').attr('rel',data);
					console.log(data);
					for (i = 0; i < 15; i++)
				{
					$('#u10').prepend("<li>Waiting for incoming Messages...</li>");
					}
			},

			error: function(x, txt, err) {
				alert('fail');
			}
		});
	}

	function loadBm()
	{
		var lastid = $('#u10').attr('rel');
		$.ajax({
			type: "GET",
			url: 'home/updateMessages/'+lastid,
			cache: false,
			//data: { mode: 'random' },

			success: function(data) {
				console.log(data);
				if(data != 'nada'){
				var text = "<a href='#'>" + data + "</a>";
				$('#u10').attr('rel',lastid+1);
				smoothAdd('u10', text);
				}
				t = setTimeout(loadBm, interval);
			}
		});
	}
