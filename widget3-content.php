<?php
$post = get_post($instance['theID']);
echo $post->post_content;
echo "<hr>";
echo "<p class='text-muted'>".$post->post_modified."</p>";
?>
