<?php 

$url = file_get_contents('https://restcountries.com/v2/all');
$toPhp = json_decode($url, true);
var_dump($toPhp);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

</head>
<style>
li{
    list-style: none;
}
</style>
<body>

<h1 class="text-center py-3">Les pays du monde avec PHP</h1>

<section id="table" class="pb-5">
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <table class="table pt-3" id="myTable">
                <thead class="table-responsive table-striped table-bordered table-hover">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Capital</th>
                    <th scope="col">Population</th>
                    <th scope="col">Borders</th>
                    <th scope="col">Languages</th>
                    <th scope="col">Flag</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($toPhp as $k){
                        $n = $k['translations'];
                        $b = (isset($k['borders'])? $k['borders'] : '');
                        $l = $k['languages'];
                        ?>
                        <tr>
                            <td><?= $n['fr']; ?></td>
                            <td><?= (isset($k['capital']) ? $k['capital'] : ''); ?></td>
                            <td><?= number_format($k['population'], 0, ',', ' ') ; ?> habitants</td>  
                            <td>
                                <ul>
                                <?php foreach((array)$b as $borders){ ?>
                                   <li> <?= $borders; ?></li>
                                <?php } ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                <?php foreach($l as $languages){ ?>
                                   <li> <?= $languages['name']; ?></li>
                                <?php } ?>
                                </ul>
                            </td>

                            <td> <img src="  <?= $k['flag']; ?>" alt="" style="max-width:100px; height:auto;"></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>