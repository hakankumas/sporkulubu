<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT brans.brans_ad, cinsiyet.cinsiyet_ad
FROM brans, brans_cinsiyet, cinsiyet
WHERE brans.brans_id=brans_cinsiyet.brans_id AND cinsiyet.cinsiyet_id=brans_cinsiyet.cinsiyet_id
ORDER BY brans.brans_ad');
$sorgu->execute();
$branslist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>
<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT cinsiyet.cinsiyet_ad, COUNT(cinsiyet.cinsiyet_id) as bransSayisi
FROM brans, brans_cinsiyet, cinsiyet
WHERE brans.brans_id=brans_cinsiyet.brans_id
AND cinsiyet.cinsiyet_id=brans_cinsiyet.cinsiyet_id
GROUP BY cinsiyet.cinsiyet_id
ORDER BY bransSayisi DESC');
$sorgu->execute();
$toplamVeri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
$db= new PDO("mysql:host=localhost;dbname=sporkulubukds;charset=utf8","root","");

    $query = $db->query('SELECT cinsiyet.cinsiyet_ad, COUNT(cinsiyet.cinsiyet_id) as bransSayisi
    FROM brans, brans_cinsiyet, cinsiyet
    WHERE brans.brans_id=brans_cinsiyet.brans_id
    AND cinsiyet.cinsiyet_id=brans_cinsiyet.cinsiyet_id
    GROUP BY cinsiyet.cinsiyet_id
    ORDER BY bransSayisi DESC');

?>


<!DOCTYPE html>
<head>
<title>Spor Kulübü KDS</title>
<meta charset="UTF-8"/>
<meta name="Description" content=""/>
<meta name="Keywords" content=""/>
<link href="style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php
            foreach($query as $row) {
                echo "['".$row["cinsiyet_ad"]."',".$row["bransSayisi"]."],";
            }
            ?>
        ]);
        var options = {'title':'Mevcut Branşların Cinsiyetlere Göre Dağılımı',
                       'width':500,
                       'height':400};
        var chart = new google.visualization.PieChart(document.getElementById('brans_chart'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <a href="index.php"><img class="logo" src="images/logos.png"></a>
            <div class="arac_paneli">
                <img class="symbol" src="images/sponsor.png">
                <span class="span"><a href="sponsor.php">Sponsorlar</a></span>
            </div>
            <div class="arac_paneli">
                <img class="symbol" src="images/dolar.png">
                <span class="span"><a href="macucretleri.php">Maç Ücretleri</a></span>
            </div>
            <div class="arac_paneli">
                <img class="symbol" src="images/member.png">
                <span class="span"><a href="uye.php">Üyeler</a></span>
            </div>
            <div class="arac_paneli">
                <img class="symbol" src="images/shop.png">
                <span class="span"><a href="siparis.php">Siparişler</a></span>
            </div>
            <div class="arac_paneli">
                <img class="symbol" src="images/new.png">
                <span class="span"><a href="yenibrans.php">Yeni Branşlar</a></span>
            </div>
            <div class="arac_paneli">
                <img class="symbol" src="images/turnoff.png">
                <span class="span"><a href="cikis.php">Çıkış</a></span>
            </div>
        </div>
        <div class="content">
            <div class="banner">
                <div>
                    <a>Fenerbahçe Spor Kulübü Karar Destek Sistemleri</a>
                </div>
            </div>

            
            <div class="brans_icerik">
                <div class="brans_tablosu">
                    <table>
			            <tr>
			                <td id="bir">Branş Ad</td>
			                <td id="iki">Branş Cinsiyet</td>
			            </tr>
			 
			                <?php
			                foreach($branslist as $brans){?>
			 
			 	                <tr class="brans_tablosu_veri">
			 	                <td id="bir"><?= $brans->brans_ad ?></td>
				                <td id="iki"><?= $brans->cinsiyet_ad ?></td>
			                    </tr>
				 
			                <?php } ?>
			        </table>  
                                
                </div>
                <div class="bransToplami">
                    <table>
			            <tr>
			                <td id="bir">Cinsiyet</td>
			                <td id="iki">Branş Sayısı</td>
			            </tr>
			 
			                <?php
			                foreach($toplamVeri as $veri){?>
			 
			 	                <tr class="bransToplami_veri">
			 	                <td id="bir"><?= $veri->cinsiyet_ad ?></td>
				                <td id="iki"><?= $veri->bransSayisi ?></td>
			                    </tr>
				 
			                <?php } ?>
			        </table>
                </div>

                <div>
                    <div id="brans_chart"></div>
                </div>
            </div>       
        </div>
    </div>
</body>
</html>