<!DOCTYPE html>
<html>
<head>
<title>Google News</title>
<link rel="icon" type="image/x-icon" href="googlenews.webp">
<style>
@import url('https://fonts.googleapis.com/css2?family=Anek+Latin:wght@200&display=swap');*{box-sizing:border-box;}
body{
background-color:#333333;
color:white;
margin:0;
font-family: 'Anek Latin', sans-serif;
}
div.thread{
    padding:0.8em 1.2em;
	float:left;
	width:45%;
	border:0.1px solid rgba(255,255,255,0.1);
	margin-left:25px;
	margin-top:30px;
	border-radius:5px;
	line-height:1.5em;
	font-size:1.3em;
	text-align:justify;
}
div.thread a{
    display:block;
    text-decoration:none;
	color: rgba(255,255,255,0.8);
	font-weight:bold;
}
div.thread a:hover{
    color:white;
}
div.thread p{
    font-size:0.7em;
    color:rgba(255,255,255,0.6);
}


button.loadmore{
    font-size:2.5em;
    padding:0.1em 0.35em 0.2em 0.35em;
    border-radius:50%;
    font-weight:bold;
    background-color:grey;
    color:white;
	position:fixed;
	bottom:0;
	right:0;
	margin-right:1em;
	margin-bottom:1em;
}
button.loadmore:hover{
	cursor:pointer;
    background-color:white;
    color:black;
}
#newssection{
display:flex;
flex-wrap: wrap;
width:60%;
margin:auto;
}

</style>    
</head>
<body>

<div id="newssection"></div>

<?php

    $india=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSENCQVNNQW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1ETnlhekFxQ1FvSEVnVkpibVJwWVNnQSouCAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAVAB?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $world=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSENCQVNNQW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EbHViVjhxQ1FvSEVnVlhiM0pzWkNnQSouCAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAVAB?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $business=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiTENCQVNNd29JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EbHpNV1lxREFvS0VnaENkWE5wYm1WemN5Z0EqLggAKioICiIkQ0JBU0ZRb0lMMjB2TURWcWFHY1NCV1Z1TFVkQ0dnSkpUaWdBUAFQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $technology=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiT0NCQVNOUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EZGpNWFlxRGdvTUVncFVaV05vYm05c2IyZDVLQUEqLggAKioICiIkQ0JBU0ZRb0lMMjB2TURWcWFHY1NCV1Z1TFVkQ0dnSkpUaWdBUAFQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    /*$entertainment=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiU0NCQVNPQW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1ESnFhblFxRVFvUEVnMUZiblJsY25SaGFXNXRaVzUwS0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $sports=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSkNCQVNNUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EWnVkR29xQ2dvSUVnWlRjRzl5ZEhNb0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $science=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiS0NCQVNNZ29JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EWnRjVGNxQ3dvSkVnZFRZMmxsYm1ObEtBQSouCAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAVAB?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $health=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSkNCQVNNUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1HdDBOVEVxQ2dvSUVnWklaV0ZzZEdnb0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
   */ 
?>

<script>

var obj=[];
var sections=["INDIA","WORLD","BUSINESS","TECHNOLOGY","ENTERTAINMENT","SPORTS","SCIENCE","HEALTH",];
obj[0] = <?php echo json_encode($india); ?>;
obj[1] = <?php echo json_encode($world); ?>;
obj[2] = <?php echo json_encode($business); ?>;
obj[3] = <?php echo json_encode($technology); ?>;
/*obj[4] = <?php echo json_encode($entertainment); ?>;
obj[5] = <?php echo json_encode($sports); ?>;
obj[6] = <?php echo json_encode($science); ?>;
obj[7] = <?php echo json_encode($health); ?>;
*/
var counter=-1;

loadMore();

function loadMore(){
    counter++;
    for (var i = 0; i < 4; i++) {

      var thread = document.createElement("div");
      thread.className="thread";
      var link = document.createElement("a");
      var datepara = document.createElement("p");
      var linktext = document.createTextNode(obj[i].channel.item[counter].title);
      var datetext = document.createTextNode(obj[i].channel.item[counter].pubDate+" - "+sections[i]);

      link.appendChild(linktext);
      link.href=obj[i].channel.item[counter].link;
      link.target="_blank";
      datepara.appendChild(datetext);
      thread.appendChild(link);
      thread.appendChild(datepara);
      document.getElementById("newssection").appendChild(thread);
    }
}

</script>

<br><br><br>
<div class="button"><button  onclick="loadMore()" class="loadmore"> + </button></div>
<br><br><br>


</body>
</html>
