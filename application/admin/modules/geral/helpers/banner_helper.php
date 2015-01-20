<?php

function geraListaBannerRotativos(){

	$ci= get_instance();

	$ci->load->model("geral/banner_model","banner");
	

	$banners = $ci->banner->get_all()->result();

	foreach ($banners as $banner) {
		echo "
		<li>
		    <a href='http://".$banner->url."'>
		        <img src='".base_url("img/banners/{$banner->img}")."' alt='banner'>
		    </a>
		</li>
		";
	}

}

?>

