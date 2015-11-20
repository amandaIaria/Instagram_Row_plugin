<?php
	
	function debug_insta($ijson){
		global $ijson;

		echo "<pre>";
		var_dump($ijson);
		echo "</pre>";


	}
	add_shortcode("debug_insta", "debug_insta");

	function row($atts){
		$atts = shortcode_atts( array(
        	'single' => "false",
        	"background" => "true"
        	
    	), $atts );
		global $ijson;
		$output = "";
		
		if($atts["single"] == "true"){
			

			$link_src = $ijson->data[0]->link;
			$image_src = $ijson->data[0]->images->standard_resolution->url;
			$caption = $ijson->data[0]->caption->text;

			$output .= "<img src='".$image_src."''>";
			$output .= "<br>";
			$output .= "<a href='".$link_src."'' target='_blank'>".$caption."</a>";

			
		}
		else{
			if($atts["single"] == "true"){

			}
			else{
				/*<div class='arrow left'>
							<a href='#' class='left'><i class='fa fa-chevron-left'></i></a>
						</div>
						<div class='arrow right'>
							<a class='right' href='#'><i class='fa fa-chevron-right'></i></a>
						</div>	*/


				$output .="
					<div id='instagram_row' class='fullwidth'>
					<ul class='instacenter'>
							
				";
				foreach($ijson->data as $inst){
					$link_src = (isset($inst->link)) ? $inst->link : "";
					$image_src = (isset($inst->images->standard_resolution->url)) ? $inst->images->standard_resolution->url : "";
					$caption = (isset($inst->caption->text)) ? $inst->caption->text : "";

					$output .= "<li class='image'><a href='".$link_src."'' target='_blank'>";
					$output .= "<article class='iCaption'><span>".$caption."</span></article>";
					$output .= "<img src='".$image_src."''>";
				
					$caption .= "</a></li>";
				}			

				$output .="</ul>
					
				</div>";
			}

					
		}

		$output .= "
			<script type='text/javascript'>
				var $ = jQuery;

				
					$('.multiple-items').slick({
  						infinite: true,
  						slidesToShow: 3,
  						slidesToScroll: 3
					});


					$('.instacenter').slick({
  						centerMode: true,
  						centerPadding: '60px',
  						slidesToShow: 5,
  						initialSlide: 12,
  						
  						responsive: [{
      						breakpoint: 768,
      						settings: {
        						arrows: false,
        						centerMode: true,
        						centerPadding: '40px',
        						slidesToShow: 3
      						}	
    					},
    					{
      						breakpoint: 480,
      						settings: {
        						arrows: false,
        						centerMode: true,
        						centerPadding: '40px',
        						slidesToShow: 1
      						}
    					}]
					});
				
			</script>
		";

		return $output;	
	}

	add_shortcode("row", "row");



?>