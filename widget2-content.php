<?php
function getCustomFields() {
	
  $custom_fields = get_post_custom();
  
  return $customFields;
/*	$toBeReturned = array();
	$i=0;

	if ( $keys = get_post_custom_keys() ) {
		foreach ( (array) $keys as $key ) {
			$keyt = trim($key);
			if ( is_protected_meta( $keyt, 'post' ) )
				continue;
			$values = array_map('trim', get_post_custom_values($key));
			$value = implode($values,', ');
			$toBeReturned[$i]=array($key, $value);
			$i++;
		}
	}


	return $toBeReturned; */

}

if (have_posts()) : while (have_posts()) : the_post();
		$meta = get_post_custom();
	endwhile;
endif;
$customFields = ["Kurzfassung", "Termine", "Ressourcen"];
$i=1;
$j=0;
echo "<div class='metacontainer'>";
foreach ($customFields as $field) {
	
	if(!empty($meta[$field])) {
		
		echo "<h4 class='metatitle'>";
		echo $instance["key".$i];
		echo "</h4> <div class='metainfo-container'>";
		foreach($meta[$field] as $k => $v) {
			echo "<p class='metainfo'>".$v."</p>";
			$j++;
		}
		echo "</div>";
		$i++;
	}
}
echo "</div>";
if($j==0) {echo "<p class='text-muted'>Keine weiteren Infos verfügbar</p>";}
?>
