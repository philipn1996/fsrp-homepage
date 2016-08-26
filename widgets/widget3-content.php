<?php
$post = get_post($instance['theID']);
$content = apply_filters('the_content', $post->post_content); 
echo $content;  
echo "<br/><p class='text-muted'> Zul. aktualisiert am ".date("d.m", strtotime($post->post_modified))." um ".date("G:i", strtotime($post->post_modified))."</p>";
echo "<hr>";
?>
