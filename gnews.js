let tojson = require('xml-js');
const http = require('http');

let XMLHttpRequest = require('xmlhttprequest').XMLHttpRequest;
let xhttp = new XMLHttpRequest();

const port = 3000;

let links={
  india:"https://news.google.com/rss/topics/CAAqJQgKIh9DQkFTRVFvSUwyMHZNRE55YXpBU0JXVnVMVWRDS0FBUAE?hl=en-IN&gl=IN&ceid=IN%3Aen",
  world:"https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRGx1YlY4U0JXVnVMVWRDR2dKSlRpZ0FQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen",
  business:"https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRGx6TVdZU0JXVnVMVWRDR2dKSlRpZ0FQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen",
  technology:"https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRGRqTVhZU0JXVnVMVWRDR2dKSlRpZ0FQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen",
  entertainment:"https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNREpxYW5RU0JXVnVMVWRDR2dKSlRpZ0FQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen",
  sports:"https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFp1ZEdvU0JXVnVMVWRDR2dKSlRpZ0FQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen",
  science:"https://news.google.com/rss/topics/CAAqKggKIiRDQkFTRlFvSUwyMHZNRFp0Y1RjU0JXVnVMVWRDR2dKSlRpZ0FQAQ?hl=en-IN&gl=IN&ceid=IN%3Aen",
  health:"https://news.google.com/rss/topics/CAAqJQgKIh9DQkFTRVFvSUwyMHZNR3QwTlRFU0JXVnVMVWRDS0FBUAE?hl=en-IN&gl=IN&ceid=IN%3Aen",
}

let data={};

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/html');

  let linkskeys=Object.keys(links);
  let count=0;
  
  if(!data.health){getdata();}

  function getdata(){
    xhttp.onload = function () {
      data[linkskeys[count]]=tojson.xml2js(this.responseText, { compact: true, spaces: 2 });
      console.log(linkskeys[count]);
      count++;
      if(!data.health){getdata();}
      else{laynews();}
    };
    xhttp.open('GET',links[linkskeys[count]],false);
    xhttp.send();
  }

  function laynews(){
    res.end(`
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
      <script>
        let countries=["India","World","Business","Technology","Entertainment","Sports","Science","Health"];
        let thread=-1;
        let insertincheck=document.getElementById("check");
        let obj=${JSON.stringify(data)};
        loadmore();
        function loadmore(){
          thread++;
          let j=0;
          for(let category of Object.keys(obj)){
            insertincheck.innerHTML+=
            "<a class='thread' target='_blank' href='"+ obj[category]["rss"]["channel"]["item"][thread]["link"]["_text"] +"'>"+
              obj[category]["rss"]["channel"]["item"][thread]["title"]["_text"]+" - "+
              obj[category]["rss"]["channel"]["item"][thread]["pubDate"]["_text"]+" - "+
              countries[j]+
            "</a>";
            j++;
          }
        }
      </script>
    </body>
    </html>
    `);
  }
  
});

server.listen(port, () => {
  console.log(`Server running...`);
});