<h1>Teenused</h1>
<?php
if (isset($_GET['ok'])) {
    echo '<div class="alert alert-success" role="alert">
    Toote lisamine õnnestus
    </div>
    ';
}
?>
<form action="" method="post" enctype="multipart/form-data">

    <label for="nimetus">Toote nimetus</label>
    <input type="text" name="nimetus" Required><br>

    <label for="kirjeldus">Toote kirjeldus</label>
    <input type="text" name="kirjeldus" Required><br>

    <label for="hind">Toote hind</label>
    <input type="number" min="0.00" max="100.00" step="0.01" name="hind" Required><br>

    <label for="lisapilt"></label>
    <input type="file" name="lisapilt"><br>

    <input type="hidden" name="page" value="services">

    <input class="btn btn-success" type="submit" value="Lisa uus toode">
</form>
<?php
if (isset($_POST['nimetus'])) {
    $ajutine_fail =  $_FILES['lisapilt']['tmp_name'];
    move_uploaded_file($ajutine_fail, 'img/'.$_FILES['lisapilt']['name']);
        $read=array();

    $id = array_push($read,count(file('products.csv'))+1);  

    $nimetus = array_push($read, $_POST['nimetus']);
    $kirjeldus = array_push($read, $_POST['kirjeldus']);
    $hind = array_push($read, $_POST['hind']);
    $pildinimi = array_push($read, $_FILES['lisapilt']['name']);

    $path ='products.csv';
    $fp = fopen($path, 'a');
    fputcsv($fp, $read);
    fclose($fp);
    // suunab puhtale lehele
    header('Location:03.php?page=services&ok');

    // $products ="products.csv";
    // $minu_csv = fopen($products, "w");
  //  fputcsv($minu_csv, $nimetus);
  
}

?>

<div class="row row-cols-1 row-cols-md-4 g-4">
<?php
//faili avamine
    $products = "products.csv";
    $minu_csv = fopen($products, "r");
    // Kõikide ridade saaminie feof = fail-end-of-file
    while (!feof($minu_csv)) {
    //ühe rea saamine, eraldatud komaga
    $rida =fgetcsv($minu_csv, filesize($products), ",");
   // print_r($rida);
 //  echo "$rida[1] - $rida[3]€<br>";
 if (is_array($rida)){
  echo'
 <div class="col">
    <div class="card">
      <img src="img/'.$rida[4].'" class="card-img-top" alt="'.$rida[1].'">
      <div class="card-body">
        <h5 class="card-title">'.$rida[1].'</h5>
        <p class="card-text">'.$rida[2].'</p>
        <p class="card-text">Hind: '.$rida[3].'€</p>
      </div>
    </div>
  </div>
';
}
}
fclose($minu_csv);
?>

 </div>