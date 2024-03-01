<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prj_summary.css">
    <script src="prj_summary.js" type="text/javascript"> </script>
    <title>Train Travel Advisor</title>
    <?php require("prj_summaryFunctions.php");?>

</head>

<!--Variabili utili al javascript-->
<!-- <script  type="text/javascript" >
        /* let meta; */      
</script> -->

<body>
    <?php require("../Home/prj_header.php");?>
    <?php 
        
        //Connection String

        /* var_dump($_SESSION); */
        
        if (isset($_SESSION['id'])) {

            $connection_string ="host='localhost' dbname='Gruppo27' user='www' password='tw2024'";
            $db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());

            $id = $_SESSION['id'];
            //Recupero le informazioni dal database
            $infos = getInfo($id, $db);

            $locationsRaw = $infos["locations"];
            $imagesRaw = $infos["imageLocation"];
            $descriptionRaw = $infos["description"];
            $geoLocationRaw = $infos["geoLocation"];
            $flagLocationRaw = $infos["flagLocation"];

            //Filtro i dati acquisiti
            $locationsFiltered = explode("---", $locationsRaw);
            $locationsFiltered = array_filter($locationsFiltered);
            
            $imagesFiltered = explode("---", $imagesRaw);
            $imagesFiltered = array_filter($imagesFiltered);

            $descriptionFiltered = explode("---", $descriptionRaw);
            $descriptionFiltered = array_filter($descriptionFiltered);

            /* var_dump($descriptionFiltered); */

            $geoLocationFiltered = explode("---", $geoLocationRaw);
            $geoLocationFiltered = array_filter($geoLocationFiltered);

            $flagLocation = explode("---", $flagLocationRaw);
            $flagLocation = array_filter($flagLocation);
            
            /* ?>
                <script  type="text/javascript">
                    description = document.getElementById("descriptionText");
                    descritpion.textContent = "<?php echo $descriptionFiltered[0]; ?>".toString();
                    descritpion.style.display = "block";
                </script>
            <?php */

            for($i = 0; $i < count($locationsFiltered); $i++){  
                ?> 
                    <script  type="text/javascript">
                        document.addEventListener('DOMContentLoaded', function () {
                            /* document.getElementsByClassName("prev").addEventListener('click', function(){
                                plusSlides(-1);
                            });

                            document.getElementsByClassName("next").addEventListener('click', function(){
                                plusSlides(1);
                            });*/
                            meta = document.getElementById("meta" + "<?php echo $i + 1; ?>");
                            geo = document.getElementById("link" + "<?php echo $i + 1; ?>");
                            flag = document.getElementById("flag" + "<?php echo $i + 1; ?>");
                            img = document.getElementById ("img" + "<?php echo $i + 1; ?>");
                            
                            
                            geo.innerHTML = "<?php echo $locationsFiltered[$i]; ?>";
                            geo.href = "<?php echo $geoLocationFiltered[$i]; ?>";
                            meta.style.display = "block";
                            geo.style.display = "block";

                            flag.src = "<?php echo $flagLocation[$i]; ?>";
                            flag.style.display = "block";

                            img.src = "<?php echo $imagesFiltered[$i]; ?>";
                            img.style.display = "block";
                        });    
                    </script>
                <?php   
            }
            
        } else {
            echo "La variabile di sessione 'id' non è stata impostata.";
        }

        
            


   
    ?>


    <div class="navigationbarr">
        <ul>
            <li><a href="prj_home.html">HOME</a></li>
            <li><a href="prj_form.html">NUOVO VIAGGIO</a></li>
            <li style="float: right"><a href="prj_signup.php" >REGISTRATI</a></li>
            <li style="float: right"><a href="prj_login.php" >ACCEDI</a></li>
        </ul>
    </div>
    
    <div class="navigationbarr">
        <ul>
            <li><a href="prj_home.html">HOME</a></li>
            <li><a href="prj_form.html">NUOVO VIAGGIO</a></li>
            <li style="float: right"><a href="prj_signup.php" >REGISTRATI</a></li>
            <li style="float: right"><a href="prj_login.php" >ACCEDI</a></li>
        </ul>
    </div>




    <div class="mainContainer">
        
       <!--  <div class="welcome">In base alle tue scelte ti consigliamo questo viaggio attraverso l'Europa</div>    -->
        
        <div class="info">
            <div class = "outcome">
                <ul id="countriesList">
                    <li id="meta1"><a id = "link1" href = ""></a></li>
                    <li id="meta2"><a id = "link2" href = ""></a></li>
                    <li id="meta3"><a id = "link3" href = ""></a></li>
                    <li id="meta4"><a id = "link4" href = ""></a></li>
                    <li id="meta5"><a id = "link5" href = ""></a></li>
                </ul>
            </div>
            <div class="map"> 
                <iframe src="https://www.google.com/maps/d/embed?mid=1rz5t987I69YzmOAKnI-H0M7fHZ4&ehbc=2E312F" width="100%" height="100%"></iframe>
            </div>
        </div>
            
        <div class="journey">    
            <div class="flags">
                <img id="flag1" src=""  width="16.475%vh" height="10.98%vh">
                <img id="flag2" src=""  width="16.475%vh" height="10.98%vh">
                <img id="flag3" src=""  width="16.475%vh" height="10.98%vh">
                <img id="flag4" src=""  width="16.475%vh" height="10.98%vh">
                <img id="flag5" src=""  width="16.475%vh" height="10.98%vh">
            </div>
            <div class="description"> 
                <p id="descriptionText">
                    <?php echo $descriptionFiltered[0]; ?>
                </p>
            </div>
        </div>

        
        <!-- LINK MAPPE DA INCLUDERE https://www.eurail.com/content/dam/pdfs/Eurail_Maps_2024.pdf-->
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- INSERIRE CAPTION E NUMBER TEXT IN MANIERA DINAMICA -->
            <div class="mySlides fade">
            <div class="numbertext">1 / 5</div>
            <img id = "img1" src="" style="width:100%">
            <div class="text">Caption Text</div>
            </div>
        
            <div class="mySlides fade">
            <div class="numbertext">2 / 5</div>
            <img id = "img2" src="" style="width:100%">
            <div class="text">Caption Two</div>
            </div>
        
            <div class="mySlides fade">
            <div class="numbertext">3 / 5</div>
            <img id = "img3" src=""  style="width:100%">
            <div class="text">Caption Three</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">4 / 5</div>
            <img id = "img4" src=""  style="width:100%">
            <div class="text">Caption Four</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">5 / 5</div>
            <img id = "img5" src=""  style="width:100%">
            <div class="text">Caption Five</div>
            </div>
        
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        
        <!-- The dots/circles -->
        <div style="text-align:center">
            <span id= "dot1" class="dot" onclick="currentSlide(1)"></span>
            <span id= "dot2" class="dot" onclick="currentSlide(2)"></span>
            <span id= "dot3" class="dot" onclick="currentSlide(3)"></span>
            <span id= "dot4" class="dot" onclick="currentSlide(4)"></span>
            <span id= "dot5" class="dot" onclick="currentSlide(5)"></span>
        </div>

        
        <div id = "cityInfo" >
        </div>

    </div>
  

    
</body>
</html>

