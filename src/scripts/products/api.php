<?php
	require_once('../producthunt.php');
	require '../XXX.php';
	$client_id = 'XXX';
	$client_secret = 'XXX';
	$productHunt = new ProductHunt($client_id,$client_secret);
	$begin = new DateTime( "2018-01-01" );
    $end   = new DateTime( "2018-12-01" );

for($ay = $begin; $ay <= $end; $ay->modify('+1 day')){
    sleep(1);
    $help =  $ay->format("Y-m-d");
    $userData = $productHunt->getPostsByDay($help);
	$oof = $userData->posts;
	for($i = 0; $i < count($oof); $i++) {
    	$posts = $userData->posts[$i];
    	$thumbnail = $posts->{'thumbnail'}->image_url;
    	$url = $posts->discussion_url;
    	$name = $posts->name;
    	$tagline = $posts->tagline;
    	$votes = $posts->votes_count;
		$sql = "INSERT INTO products (name, tagline, upvotes, url, thumbnail)
	VALUES ('$name', '$tagline', '$votes', '$url', '$thumbnail')";
		if ($conn->query($sql) === TRUE) {
			echo "Oof is ".count($oof)." Day is ".$help." Thumbnail: ".$thumbnail." Votes".$votes." URL ".$url." name ".$name."<br>";
		}
	}
}
?>