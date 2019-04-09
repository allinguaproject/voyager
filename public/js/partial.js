$(document).ready(function () {
	$('.navbar-primary').toggleClass('collapsed');
	$('.navbar-right').toggleClass('collapsed');


	$('.btn-expand-collapse').click(function(e) {
		$('.navbar-primary').toggleClass('collapsed');
		if ($('.navbar-right').is('.collapse:not(.show)'))  {
			$('.navbar-right').toggleClass('collapsed');

		}

});
$('.btn-expand-rightNav').click(function(e) {

		$('.navbar-right').toggleClass('collapsed');
	if ($('.navbar-primary').is('.collapse:not(.show)'))  {
		$('.navbar-primary').toggleClass('collapsed');

	}

});
		});
