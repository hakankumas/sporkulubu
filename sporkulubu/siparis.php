<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From sehirlerinhasilatlaridetayli');
$sorgu->execute();
$sehirlerinhasilatlaridetaylilist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>
<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From hasilatsizsehirlercase');
$sorgu->execute();
$hasilatsizsehirlercaselist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>
<?php
$con = mysqli_connect("localhost","root","","sporkulubukds");
$con->set_charset("utf8");
mysqli_query($con,"SET CHARACTER 'utf8'");
mysqli_query($con,"SET SESSION collation_connection ='utf8_turkish_ci'");
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
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Şehir Ad', 'Hasılat'],
          <?php
          $sql ="SELECT * FROM sehirlerinhasilatlaridetayli";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
              echo"['".$result['sehir_ad']."',".$result['fiyat']."],";
          }

          ?>
        ]);

        var options = {
          title : 'Şehirlerin Hasılat Verileri:',
          vAxis: {title: 'Hasılat'},
          hAxis: {title: 'Şehir Adı'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Şehir Ad', 'Binde'],
          <?php
          $sql ="SELECT * FROM sehirlerinhasilatlaridetayli";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
              echo"['".$result['sehir_ad']."',".$result['binde']."],";
          }

          ?>
        ]);

        var options = {
          title : 'Şehirlerin Hasılatlarının Binde Değerleri:',
          vAxis: {title: 'Binde'},
          hAxis: {title: 'Şehir Adı'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
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
            <div class="siparis_icerik">
                <div class="baslik1">
                    <table>
                        <tr>
                            <td id="bir">Şehirlerin Gelirlerine Göre Çoktan Aza:</td>
                        </tr>
                    </table>
                </div>
                <div class="siparis_tablo1">
                    <div>
                        <table>
                            
                            <tr>
                                <td id="bir">Şehir Ad</td>
                                <td id="iki">Nüfus</td>
                                <td id="uc">Gelirler</td>
                                <td id="dort">Binde</td>
                            </tr>
                            <?php
			                foreach($sehirlerinhasilatlaridetaylilist as $shdl){?>
			 
			 	                <tr class="sehirlerin_sv">
			 	                <td id="bir"><?= $shdl->sehir_ad ?></td>
				                <td id="iki"><?= $shdl->sehir_nufus ?></td>
                                <td id="uc"><?= $shdl->fiyat ?></td>
				                <td id="dort"><?= $shdl->binde ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="baslik2">
                    <table>
                        <tr>
                            <td id="iki">Hasılatsız Şehirler:</td>
                        </tr>
                    </table>
                </div>
                <div class="siparis_tablo2">
                    <div>    
                        <table>
                            <tr>
                                <td id="bir">Şehir Ad</td>
                                <td id="iki">Mağaza Durumu</td>
                            </tr>
                            <?php
			                foreach($hasilatsizsehirlercaselist as $hscl){?>
			 
			 	                <tr class="hasilatsizsehirler_veri">
			 	                <td id="bir"><?= $hscl->sehir_ad ?></td>
				                <td id="iki"><?= $hscl->magazaDurumu ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>
                <br>
                <div id="chart_div1" style="width: auto; height: 600px;"></div>
                <br>
                <div id="chart_div2" style="width: auto; height: 600px;"></div>
            </div>
        </div>
    </div>
</body>
</html>