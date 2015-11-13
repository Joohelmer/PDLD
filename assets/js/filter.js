$("#ville_restaurant").selectbox({

	onChange: function (val, inst) {
		$.ajax({
			type: "GET",
			data: {villenom: val},
			dataType:"json",
			url: base_url+'restaurants/form_filter_restaurants',
			success: function (data) {
				window.location.href = data.url;
			}
		});
	},
	effect: "slide"
});

$("#ville_evenements").selectbox({

	onChange: function (val, inst) {
		$.ajax({
			type: "GET",
			data: {villenom: val},
			dataType:"json",
			url: base_url+'evenements/form_filter_evenements',
			success: function (data) {
				window.location.href = data.url;
			}
		});
	},
	effect: "slide"
});


$("#ville_activite").selectbox({

	onChange: function (val, inst) {
		$.ajax({
			type: "GET",
			data: {villenom: val},
			dataType:"json",
			url: base_url+'activites/form_filter_activites',
			success: function (data) {
				window.location.href = data.url;
			}
		});
	},
	effect: "slide"
});