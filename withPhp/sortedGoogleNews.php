<!DOCTYPE html>
<html>
<head>
<title>G News</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/d/da/Google_News_icon.svg">
<style>
	@import url('https://fonts.googleapis.com/css2?family=Anek+Latin:wght@200&display=swap');
	*{box-sizing:border-box;}
	body{
		margin:0;
		font-family: 'Anek Latin', sans-serif;
		background-color:#393E46;
	}
	.thread{
		display:block;
		text-decoration:none;
		color:white;
		padding:1.5em;
		letter-spacing:1px;
		line-height:30px;
		font-size:20px;
		border-bottom:0.1px solid rgba(255,255,255,0.2);
	}
	.thread:visited{
		color:grey;
	}
	.thread:hover{
		color:rgba(255,255,255,0.6);
		transition:0.2s;
	}
	#check{
		width:40%;
		margin:auto;
		background-color:#222831;
	}
	.loadmore{
		margin-top:15px;
		margin-bottom:15px;
		padding:1em 1.5em;
		border-radius:5px;
		font-weight:bold;
		cursor:pointer;
	}
	.loadmore:hover{
		background-color:transparent;
		color:white;
		border:2px solid white;
	}
	@media screen and (min-width: 900px) and (max-width: 1100px){
		#check{
			width:50%;
		}
	}
	@media screen and (min-width: 700px) and (max-width: 900px){
		#check{
			width:65%;
		}
	}
	@media screen and (min-width: 500px) and (max-width: 700px){
		#check{
			width:80%;
		}
	}
	@media screen and (max-width: 500px) {
		#check{
			width:100%;
		}
	}
</style>    
</head>
<body>

	<div id="check"></div>
	<div style="text-align:center;">
		<button class="loadmore" onclick="loadmore()">Load More</button> 
	</div>

	<?php

			$india=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSENCQVNNQW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1ETnlhekFxQ1FvSEVnVkpibVJwWVNnQSouCAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAVAB?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
			$world=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSENCQVNNQW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EbHViVjhxQ1FvSEVnVlhiM0pzWkNnQSouCAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAVAB?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
			$business=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiTENCQVNNd29JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EbHpNV1lxREFvS0VnaENkWE5wYm1WemN5Z0EqLggAKioICiIkQ0JBU0ZRb0lMMjB2TURWcWFHY1NCV1Z1TFVkQ0dnSkpUaWdBUAFQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
			$technology=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiT0NCQVNOUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EZGpNWFlxRGdvTUVncFVaV05vYm05c2IyZDVLQUEqLggAKioICiIkQ0JBU0ZRb0lMMjB2TURWcWFHY1NCV1Z1TFVkQ0dnSkpUaWdBUAFQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
			$entertainment=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiU0NCQVNPQW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1ESnFhblFxRVFvUEVnMUZiblJsY25SaGFXNXRaVzUwS0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
			$sports=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSkNCQVNNUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EWnVkR29xQ2dvSUVnWlRjRzl5ZEhNb0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
			$science=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiS0NCQVNNZ29JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EWnRjVGNxQ3dvSkVnZFRZMmxsYm1ObEtBQSouCAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAVAB?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
			$health=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSkNCQVNNUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1HdDBOVEVxQ2dvSUVnWklaV0ZzZEdnb0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
		 
	?>

	<script>

	var obj={}
	obj["india"] = <?php echo json_encode($india); ?>;
	obj["world"] = <?php echo json_encode($world); ?>;
	obj["business"] = <?php echo json_encode($business); ?>;
	obj["technology"] = <?php echo json_encode($technology); ?>;
	obj["entertainment"] = <?php echo json_encode($entertainment); ?>;
	obj["sports"] = <?php echo json_encode($sports); ?>;
	obj["science"] = <?php echo json_encode($science); ?>;
	obj["health"] = <?php echo json_encode($health); ?>;

	let countries=["India","World","Business","Technology","Entertainment","Sports","Science","Health"];
	let thread=-1;
	let insertincheck=document.getElementById("check");

	loadmore();
	function loadmore(){
		thread++;
		let j=0;
		for(let category of Object.keys(obj)){
			insertincheck.innerHTML+=
			"<a class='thread' target='_blank' href='"+ obj[category].channel.item[thread].link +"'>"+
				obj[category].channel.item[thread].title+" - "+
				obj[category].channel.item[thread].pubDate+" - "+
				countries[j]+
			"</a>";
			j++;
		}
	}

	</script>

</body>
</html>
