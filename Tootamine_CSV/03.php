
<?php


 include("header.php")

?>

<?php

if (isset($_GET['page'])) {
    $page = $_GET["page"];
    if ($page=="services") {
        include("services.php");
    }else if($page="contact"){
        include("contact.php");
    }
}else{

?>

<H1>Avalehe asjad</H1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta magnam voluptatibus corporis ab aspernatur. Sunt, at cupiditate. Earum, incidunt minus aliquam autem quae sapiente delectus non culpa nihil blanditiis consequatur?</p>

<?php

}

?>

<?php

include("footer.php")

?>