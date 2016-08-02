<?php
//Widget1_content
echo "<div class='ubercontainer'>";

echo "<div class='visible-md-block visible-lg-block'>";
for($i=1; $i<4; $i++) { //Bis zu drei Bilder anzeigen. ToDo: Anzahl variabel machen.
	if(! empty($instance["img_".$i]) ) {
		echo "
			<div class='social-icon-container'>
				<a href='".$instance["link_".$i]."'><img class='social-icon img-rounded' src='".$instance["img_".$i]."'>
				<p class='img-caption'>".$instance["caption_".$i]."</p>
				</a>
			</div>
		";
	}
}
echo "</div>";

echo "<div class='visible-xs-block visible-sm-block cotainner'>";
echo "<div class='row'>";
for($i=1; $i<4; $i++) { //Bis zu drei Bilder anzeigen. ToDo: Anzahl variabel machen.
	if(! empty($instance["img_".$i]) ) {
		echo "
			<div class='social-icon-container col-xs-4'>
				<a href='".$instance["link_".$i]."'><img class='social-icon img-rounded' src='".$instance["img_".$i]."'>
				<p class='img-caption'>".$instance["caption_".$i]."</p>
				</a>
			</div>
		";
	}
}
echo "</div>";
echo "</div>";

echo "</div>";

?>
