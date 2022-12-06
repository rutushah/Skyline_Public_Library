<?php 
    session_start();
    include_once("../dbConfig.php");
?>
<script>
  async function getNews(){
    await fetch('https://api.nytimes.com/svc/mostpopular/v2/viewed/1.json?api-key=Pa0DaWiY8qEdgEviZnDFGROLKPTVs4zm')
    .then(d => d.json())
    .then(response => {
        console.log(response.results);
        for(var i =0; i<response.results.length; i++){
            console.log(response.results[i].title);
            const output = document.getElementById('output');
            try{
                output.innerHTML += `
                    <div class = "card"> 
                        <div class = "card-body">
                        <img src = "${response.results[i]['media'][0]
                        ['media-metadata'][2].url}" alt = "${response.results[i]['media'][0].caption}" 
                        title = "${response.results[i]['media'][0].caption}"
                        />
                            <h2> ${response.results[i].title}</h2>
                            <div class = "card-text">
                                <p> ${response.results[i].abstract} 
                                    <a href = " ${response.results[i].url}" > Read More</a>  
                                </p>
                            </div>
                        </div> 
                    </div>  
                    <br>
                `;
            }catch(err){
                console.log(err);
            }
        }

        document.getElementById('copyright').innerHTML = response.copyright;
    })
  }
  getNews();
    </script>

<!-- Pa0DaWiY8qEdgEviZnDFGROLKPTVs4zm -->
<!-- https://api.nytimes.com/svc/mostpopular/v2/viewed/1.json?api-key=Pa0DaWiY8qEdgEviZnDFGROLKPTVs4zm -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include "user_header.php";
    ?>
    <!-- <div>
        <p id = "output">News </p>
    </div>
            -->
            <div class="container">
                <h1>See our Latest News</h1>
                <div id="output">  </div>
                <p id="copyright"></p>
            </div>
</body>

</html>
