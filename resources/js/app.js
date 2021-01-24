// require('./bootstrap');


$(document).ready(function () {

    // Validation field only number
	$('.number').on('keyup', function(ev) {
		var hasCaracterIncorrect = null;
		$('#btn-save').attr('disabled', false);
		$(this).closest('.form-group').removeClass('has-error');

		if (/[^0-9.,]/g.test(this.value)) {
			$(this).closest('.form-group').addClass('has-error');
			$('#btn-save').attr('disabled', true);
		}
    });

    var unitValue = 0;
	$('#unit_id').on('change', function(ev){
		$('#total_discounts').val(0);
		$.get({
			url: "/units/"+this.value+"/value",
		  }).done(function(data) {
			  unitValue = data;
			$( "#sold_by" ).val( parseFloat(unitValue) );
		  });
	});

	$('#total_discounts').on('keyup', function(ev){
		var value = !this.value ? 0 : this.value;
		$( "#sold_by" ).val( parseFloat(unitValue) + parseFloat(value) );
	});
});

