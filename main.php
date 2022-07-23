<?php

$url = "https://40saniye.com/gta-san-andreas-tum-hileler-pc"; // web Site URL
$data =  file_get_contents($url); // verimiz geldi

$contentPattern = '@<div class="post-text text-style" (.*?)>(.*?)</div>@si';

preg_match_all($pattern,$veri,$contents);

$posts = array();
for($i=0;$i<count($contents[0]);$i++) {
	// başlığı ve url alıyoruz.
	$titlePattern = '@<a itemprop="url" href="(.*?)" (.*?)>(.*?)</a>@si';
	preg_match($titlePattern,$contents[0][$i],$title);
	
	// resimi alıyoruz. 
	$thumbnailPattern = '@<img alt="(.*?)" width="250" height="160" src="(.*?)">@si';
	preg_match($thumbnailPattern,$contents[0][$i],$thumbnail);
	
	
	
	// posts diye bir diziye verileri atalım daha sonra kendimiz ayarlayalım. 
	
	$posts[$i]["title"] = $baslik[3];
	$posts[$i]["content"] = $content[1];
	$posts[$i]["thumbnail"] = $resim[2];
}


/// alınan verileri ekranda gösteriyoruz. 
echo '<ul style="list-style:none;">';
foreach( $posts as $post) {
	echo ' <li> <img src="'.str_replace('./',$url,$post["thumbnail"]).'" alt="" /> <p>.$post["content"].</p> <a href="#">'.$post["title"]."</a></li>";
}
echo '</ul>';
?>
