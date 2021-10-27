$('document').ready(function () {


	function recent_post_load(page) {
		$.ajax({
			url: 'php/get_post_data.php',
			type: 'POST',
			data: { page_no: page },
			success: function (data) {
                
				$('#show_recent_post_data').html(data);

			}

		});

	}

	recent_post_load();


	//pegination

	$(document).on("click", ".pagination a", function (e) {

		e.preventDefault();
		var page_no = $(this).attr('id');
		console.log(page_no);

		recent_post_load(page_no);


	});


	// get state data
	function state_data_load() {
		$.ajax({
			url: 'php/get_state_data.php',
			type: 'POST',
			success: function (data) {

				$('#show_state_data').html(data);
				$('.sclick-slider').slick({

					infinite: false,
					speed: 100,
					slidesToShow: 3,
					// centerMode: true,
					slidersToScroll: 1,
					variableWidth: true,
					arrows: false,
					
					});
			
				
			}

		});
	}
	state_data_load();

//get popular post data
	function get_popular_data_load(category) {
		$.ajax({
			url: 'php/get_sidebar_data.php',
			type: 'POST',
			data:{type : category},
			success: function (data) {

				if(category=='p_post'){
					$('#show_popular_post').html(data);
				}
				if(category=='allpost'){

					$('#show_popular_blog').html(data);

				}
				if(category=='top_place'){
					$('#show_top_place').html(data);
				}

			}

		});
	}
	get_popular_data_load('p_post');
	get_popular_data_load('allpost');
	get_popular_data_load('top_place');









});
