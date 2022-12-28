<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    
</body>
</html>

<?php
include("ajaxcon.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];
    $query = "SELECT uye.uye_ad, uye.uye_soyad, ROUND(((uye.uye_kazanc*'{$input}')/100)) as gelir
    FROM uye";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){?>
    <table class="uyegelirleriveri1">
        <thead>
            <tr>
                <th id="bir">Üye Ad</th>
                <th id="iki">Üye Soyad</th>
                <th id="uc">Aidat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                $uye_ad = $row['uye_ad'];
                $uye_soyad = $row['uye_soyad'];
                $gelir = $row['gelir'];

                ?>
                <tr class="uyegelirleriveri2">
                    <td id="bir"><?php echo $uye_ad;?></td>
                    <td id="iki"><?php echo $uye_soyad;?></td>
                    <td id="uc"><?php echo $gelir;?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>    

        <?php
    }else{
        echo "No data found";
    }
}
?>
        <?php
include("ajaxcon.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];
    $query = "SELECT SUM(ROUND(((uye.uye_kazanc*'{$input}')/100))) as toplamgelir
    FROM uye";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){?>
    <table class="uyegelirleriveri3">
        <thead>
            <tr>
                <th id="bir">Toplam Gelir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                $toplamgelir = $row['toplamgelir'];

                ?>
                <tr class="uyegelirleriveri4">
                    <td id="bir"><?php echo $toplamgelir;?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>    
        
        <?php
    }else{
        echo "No data found";
    }
}
?>