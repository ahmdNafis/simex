<?php

function jsonToArray($filePath = "") {
	return json_decode(utf8_encode(file_get_contents($filePath)), true);
}

function head_foot($head=true) {
	$header = [
		"widthMeasurement" => "<meta name='viewport' content='width=device-width, initial-scale=1' />",
		"bootstrapCDN" => "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>",
		//"boostrapCSS" => "<link href='css/bootstrap.min.css' rel='stylesheet'>",
		"siteCSS" => "<link href='css/main.css' rel='stylesheet'>",
	];
	$footer = [
		"bootstrapJS" => "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>",
		"jQeury" => "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>",
	];
	if ($head == true) {
		foreach ($header as $key => $value) {
			echo "$value";
		}
	} else {
		foreach ($footer as $key2 => $value2) {
			echo "$value2";
		}
	}
}

function iterateGalleryImages($filePath = null, $showRows = null, $description = false) {
	if ($filePath == null) $filePath = "json/galleryImages.json";
	$imageDetails = jsonToArray($filePath);
	$detailsFirstKeys = [];
	$a = 0;
	foreach ($imageDetails as $key => $value	) {
		$detailsFirstKeys[$a] = $key;
		$a++;
	} 
	$detailsSecondKeys = []; 
	$i = 0;
	foreach ($imageDetails as $key => $value) {
		$j = 0;
		foreach ($value as $key2 => $value2) {
			$detailsSecondKeys[$i][$j] = $key2;
			$j++;
		}
		$i++;
	}
	$detailsThirdKeys = [];
	$b = 0;
	foreach ($imageDetails as $key => $value) {
		$c = 0;
		foreach ($value as $key2 => $value2) {
			$d = 0;
			foreach ($value2 as $key3 => $value3) {
				$detailsThirdKeys[$b][$c][$d] = $key3;
				$d++;
			}
			$c++;
		}
		$b++;
	}
	$imagesOutput = "";
	if (is_null($showRows) && $description == false) {
		for ($i = 1; $i <= count($detailsFirstKeys); $i++) {
			$imagesOutput .= "<div class='row'>";
				for ($j=0; $j < count($detailsSecondKeys[$i-1]); $j++) {
					$imagesOutput .= "<div class='col-md-4'>";
					for ($k=0; $k < 1; $k++) { 
						$imagesOutput .= "<div id='images' class='thumbnail'>".
							"<a href='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k]]."'>".
							"<img src='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+1]]."' /></a>".
							"</div>";
					}
					$imagesOutput .= "</div>";
				}
			$imagesOutput .= "</div>";
		}
	} elseif (is_numeric($showRows) && $showRows <= count($detailsFirstKeys) && $description == true) {
		for ($i = 1; $i <= $showRows; $i++) {
			$imagesOutput .= "<div class=row'>";
			for ($j=0; $j < count($detailsSecondKeys[$i-1]); $j++) {
				$imagesOutput .= "<div class='col-md-4'>";
				for ($k=0; $k < 1; $k++) { 
					$imagesOutput .= "<div class='thumbnail'>".
						"<img src='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+1]]."' /></a>".
						"<div class='caption'>".
						"<p>".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+2]]."</p>".
						"<p><a href='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k]]."' class='btn btn-info' role='info'>See More</a></p>".
						"</div>".
						"</div>";
				}
				$imagesOutput .= "</div>";
			}
			$imagesOutput .= "</div>";
		}
	} elseif (is_null($showRows) && $description == true) {
		for ($i = 1; $i <= count($detailsFirstKeys); $i++) {
			$imagesOutput .= "<div class='row'>";
			for ($j=0; $j < count($detailsSecondKeys[$i-1]); $j++) {
				$imagesOutput .= "<div class='col-md-4'>";
				for ($k=0; $k < 1; $k++) { 
					$imagesOutput .= "<div class='thumbnail'>".
						"<img src='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+1]]."' /></a>".
						"<div class='caption'>".
						"<p>".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+2]]."</p>".
						"<p><a href='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k]]."' class='btn btn-info' role='info'>See More</a></p>".
						"</div>".
						"</div>";
				}
				$imagesOutput .= "</div>";
			}
			$imagesOutput .= "</div>";
		}
	}
	echo $imagesOutput;
}

function traverseNavigation($filePath = null) {
	if($filePath == null) $filePath = "json/menuItems.json";
	$menuLinks = jsonToArray($filePath);
	foreach ($menuLinks as $key => $value) {
		/*if (!empty($value)) {/*
			if(is_array($value)) {
				for ($i=0; $i < count($value); $i++) { 
					echo "<li><a href='$value'>$key</a></li>";
					echo "<li>";
				}
			}
			echo "<li><a href='$value'>$key</a></li>";	
		}*/	
	} 	
}

function homeTiles($filePath = null, $showRows = null, $description = false) {
	if ($filePath == null) $filePath = "json/homeTilesImages.json";
	$imageDetails = jsonToArray($filePath);
	$detailsFirstKeys = [];
	$a = 0;
	foreach ($imageDetails as $key => $value	) {
		$detailsFirstKeys[$a] = $key;
		$a++;
	} 
	$detailsSecondKeys = []; 
	$i = 0;
	foreach ($imageDetails as $key => $value) {
		$j = 0;
		foreach ($value as $key2 => $value2) {
			$detailsSecondKeys[$i][$j] = $key2;
			$j++;
		}
		$i++;
	}
	$detailsThirdKeys = [];
	$b = 0;
	foreach ($imageDetails as $key => $value) {
		$c = 0;
		foreach ($value as $key2 => $value2) {
			$d = 0;
			foreach ($value2 as $key3 => $value3) {
				$detailsThirdKeys[$b][$c][$d] = $key3;
				$d++;
			}
			$c++;
		}
		$b++;
	}
	$imagesOutput = "";
	if (is_null($showRows) && $description == false) {
		for ($i = 1; $i <= count($detailsFirstKeys); $i++) {
			$imagesOutput .= "<div class='row'>";
				for ($j=0; $j < count($detailsSecondKeys[$i-1]); $j++) {
					$imagesOutput .= "<div class='col-md-4'>";
					for ($k=0; $k < 1; $k++) { 
						$imagesOutput .= "<div id='images' class='thumbnail'>".
							"<a href='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k]]."'>".
							"<img src='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+1]]."' /></a>".
							"</div>";
					}
					$imagesOutput .= "</div>";
				}
			$imagesOutput .= "</div>";
		}
	} elseif (is_numeric($showRows) && $showRows <= count($detailsFirstKeys) && $description == true) {
		for ($i = 1; $i <= $showRows; $i++) {
			$imagesOutput .= "<div class=row'>";
			for ($j=0; $j < count($detailsSecondKeys[$i-1]); $j++) {
				$imagesOutput .= "<div class='col-md-4'>";
				for ($k=0; $k < 1; $k++) { 
					$imagesOutput .= "<div class='thumbnail'>".
						"<img src='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+1]]."' /></a>".
						"<div class='caption'>".
						"<p>".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+2]]."</p>".
						"<p><a href='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k]]."' class='btn btn-info' role='info'>See More</a></p>".
						"</div>".
						"</div>";
				}
				$imagesOutput .= "</div>";
			}
			$imagesOutput .= "</div>";
		}
	} elseif (is_null($showRows) && $description == true) {
		for ($i = 1; $i <= count($detailsFirstKeys); $i++) {
			$imagesOutput .= "<div class='row'>";
			for ($j=0; $j < count($detailsSecondKeys[$i-1]); $j++) {
				$imagesOutput .= "<div class='col-md-4'>";
				for ($k=0; $k < 1; $k++) { 
					$imagesOutput .= "<div class='thumbnail'>".
						"<img src='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+1]]."' /></a>".
						"<div class='caption'>".
						"<p>".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k+2]]."</p>".
						"<p><a href='".$imageDetails[$detailsFirstKeys[$i-1]][$detailsSecondKeys[$i-1][$j]][$detailsThirdKeys[$i-1][$j][$k]]."' class='btn btn-info' role='info'>See More</a></p>".
						"</div>".
						"</div>";
				}
				$imagesOutput .= "</div>";
			}
			$imagesOutput .= "</div>";
		}
	}
	echo $imagesOutput;
}

function headerMessage() {
	
}
?>