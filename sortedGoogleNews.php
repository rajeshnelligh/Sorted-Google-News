<!DOCTYPE html>
<html>
<head>
<title>Google News</title>
<style>
body{
    margin:0;
    background-color:black;
    
}
div.thread{
    margin-top:40px;
    margin-bottom:40px;
    line-height:50px;
    font-family:Roboto;
    padding:0em 1em;
}
div.thread a{
    border-radius:10px 10px 0px 0px;
    padding:2em 2em 0em 2em;
    display:block;
    text-decoration:none;
}
div.thread p{
    font-size:0.7em;
    padding:1.5em 3em 2em 3em;
    color:rgba(255,255,255,0.4);
}
div.thread a:link {
  color: #cccccc;
}
div.thread a:visited{
    color:#666666;
}
hr{border:1px solid rgba(255,255,255,0.3);}
button.loadmore{
    font-size:2.5em;
    padding:0.5em 1em;
    border-radius:10px;
    font-weight:bold;
    background-color:white;
    color:black;
}
button.loadmore:active{
    background-color:black;
    color:white;
}
div.button{
    margin:auto;
    text-align:center;
}
div#newssection{
    margin-top:50vh;
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
    $entertainment=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiU0NCQVNPQW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1ESnFhblFxRVFvUEVnMUZiblJsY25SaGFXNXRaVzUwS0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $sports=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSkNCQVNNUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EWnVkR29xQ2dvSUVnWlRjRzl5ZEhNb0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $science=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiS0NCQVNNZ29JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1EWnRjVGNxQ3dvSkVnZFRZMmxsYm1ObEtBQSouCAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAVAB?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    $health=simplexml_load_file("https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFZxYUdjU0JXVnVMVWRDR2dKSlRpZ0FQAQ/sections/CAQiSkNCQVNNUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlJT0NBUWFDZ29JTDIwdk1HdDBOVEVxQ2dvSUVnWklaV0ZzZEdnb0FBKi4IACoqCAoiJENCQVNGUW9JTDIwdk1EVnFhR2NTQldWdUxVZENHZ0pKVGlnQVABUAE?hl=en-IN&gl=IN&ceid=IN%3Aen") or die("Error: Cannot create object");
    
?>

<script>

var obj=[];
var sections=["INDIA","WORLD","BUSINESS","TECHNOLOGY","ENTERTAINMENT","SPORTS","SCIENCE","HEALTH",];
obj[0] = <?php echo json_encode($india); ?>;
obj[1] = <?php echo json_encode($world); ?>;
obj[2] = <?php echo json_encode($business); ?>;
obj[3] = <?php echo json_encode($technology); ?>;
obj[4] = <?php echo json_encode($entertainment); ?>;
obj[5] = <?php echo json_encode($sports); ?>;
obj[6] = <?php echo json_encode($science); ?>;
obj[7] = <?php echo json_encode($health); ?>;

var counter=-1;

loadMore();

function loadMore(){
    counter++;
    for (var i = 0; i < 8; i++) {
      var hr = document.createElement("hr");
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
      document.getElementById("newssection").appendChild(hr);
    }
}

</script>

<br><br><br>
<div class="button"><button  onclick="loadMore()" class="loadmore"> Load More </button></div>
<br><br><br>


</body>
</html>