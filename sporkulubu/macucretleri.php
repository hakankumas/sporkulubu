<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From futbolmaclari1');
$sorgu->execute();
$futbolmaclariverileri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From basketbolmaclari1');
$sorgu->execute();
$basketbolmaclariverileri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From futbolverileri');
$sorgu->execute();
$futbolortveri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From basketbolverileri');
$sorgu->execute();
$basketbolortveri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From futboltahminigelir');
$sorgu->execute();
$futboltg=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From basketboltahminigelir');
$sorgu->execute();
$basketboltg=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
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
          ['Takım Ad', 'Hasılat'],
          <?php
          $sql ="SELECT * FROM futbolmaclari1";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
              echo"['".$result['rakip_ad']."',".$result['gelir']."],";
          }

          ?>
        ]);

        var options = {
          title : 'İç Saha Maçları Hasılat Verileri',
          vAxis: {title: 'Hasılat'},
          hAxis: {title: 'Rakip Takım Adı'},
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
          ['Takım Ad', 'Toplam Seyirci'],
          <?php
          $sql ="SELECT * FROM futbolmaclari1";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
              echo"['".$result['rakip_ad']."',".$result['toplam_seyirci']."],";
          }

          ?>
        ]);

        var options = {
          title : 'İç Saha Maçları Seyirci Sayıları',
          vAxis: {title: 'Kişi Sayısı'},
          hAxis: {title: 'Rakip Takım Adı'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
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
          ['Takım Ad', 'Bilet Fiyatı'],
          <?php
          $sql ="SELECT * FROM futbolmaclari1";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
              echo"['".$result['rakip_ad']."',".$result['bilet_fiyati']."],";
          }

          ?>
        ]);

        var options = {
          title : 'İç Saha Maçları Bilet Fiyatları',
          vAxis: {title: 'Bilet Fiyatı'},
          hAxis: {title: 'Rakip Takım Adı'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div3'));
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
          ['Takım Ad', 'Hasılat'],
          <?php
          $sql ="SELECT * FROM basketbolmaclari1";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
              echo"['".$result['rakip_ad']."',".$result['gelir']."],";
          }

          ?>
        ]);

        var options = {
          title : 'İç Saha Maçları Hasılat Verileri',
          vAxis: {title: 'Hasılat'},
          hAxis: {title: 'Rakip Takım Adı'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div4'));
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
          ['Takım Ad', 'Toplam Seyirci'],
          <?php
          $sql ="SELECT * FROM basketbolmaclari1";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
              echo"['".$result['rakip_ad']."',".$result['toplam_seyirci']."],";
          }

          ?>
        ]);

        var options = {
          title : 'İç Saha Maçları Seyirci Sayıları',
          vAxis: {title: 'Kişi Sayısı'},
          hAxis: {title: 'Rakip Takım Adı'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div5'));
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
          ['Takım Ad', 'Bilet Fiyatı'],
          <?php
          $sql ="SELECT * FROM basketbolmaclari1";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
              echo"['".$result['rakip_ad']."',".$result['bilet_fiyati']."],";
          }

          ?>
        ]);

        var options = {
          title : 'İç Saha Maçları Bilet Fiyatları',
          vAxis: {title: 'Bilet Fiyatı'},
          hAxis: {title: 'Rakip Takım Adı'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div6'));
        chart.draw(data, options);
      }
</script>
<script language="javascript">

function hesapla()
{
    var x=document.getElementById("kutu1").value;
	var y=document.getElementById("kutu2").value;
  	var a = x*y;
	document.getElementById("sonuc").innerHTML=a;
}
	
</script>
<script language="javascript">

function hesapla2()
{
    var x2=document.getElementById("kutu3").value;
	var y2=document.getElementById("kutu4").value;
  	var a2 = x2*y2;
	document.getElementById("sonuc2").innerHTML=a2;
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
            <div class="macucretleri_icerik">
                <div class="futbol">
                    <div class="futbol1">
                        <table>
                            <tr class="baslik">
                                <td id="bir">Branş Ad</td>
                                <td id="iki">Rakip Ad</td>
                                <td id="uc">Bilet Fiyatı</td>
                                <td id="dort">Toplam Seyirci</td>
                                <td id="bes">Gelir</td>
                            </tr>
                            <?php
			                foreach($futbolmaclariverileri as $fmv){?>
			 
			 	                <tr class="futbol_mu_veri">
			 	                <td id="bir"><?= $fmv->brans_ad ?></td>
				                <td id="iki"><?= $fmv->rakip_ad ?></td>
                                <td id="uc"><?= $fmv->bilet_fiyati ?></td>
				                <td id="dort"><?= $fmv->toplam_seyirci ?></td>
				                <td id="bes"><?= $fmv->gelir ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                    <div class="futbol2">
                        <table>
                            <tr>
                                <td id="bir">Ortalama Maç Ücreti</td>
                                <td id="iki">Ortalama Seyirci Sayısı</td>
                            </tr>
                            <?php
			                foreach($futbolortveri as $fov){?>
			 
			 	                <tr class="futbol_mu_veri2">
			 	                <td id="bir"><?= $fov->ortalamaMacUcreti ?></td>
				                <td id="iki"><?= $fov->ortalamaSeyirciSayisi ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                    <div class="futbol3">
                        <table>
                            <tr>
                                <td id="bir">Ortalama Tahmini Gelir</td>
                            </tr>
                            <?php
			                foreach($futboltg as $ftg){?>
			 
			 	                <tr class="futbol_mu_veri3">
			 	                <td id="bir"><?= $ftg->tahminiOrtalamaGelir ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>

                <div id="chart_div1" style="width: auto; height: 600px;"></div>
                <br>
                <div id="chart_div2" style="width: auto; height: 600px;"></div>
                <br>
                <div id="chart_div3" style="width: auto; height: 600px;"></div>
                <div class="futboltahmin">
                    <div class="futboltahmin_baslik">
                        <p>Tahmini Bilet Fiyatı ve Seyirci Sayısı Verilerini Giriniz.</p>
                    </div>
                    <div>
                        <input type="text" name="kutu1" id="kutu1" placeholder="Bilet Fiyatı">
                        <br><br>
                        <input type="text" name="kutu2" id="kutu2" placeholder="Seyirci Sayısı">
                        <br><br>
                        <button id="buton" onclick="hesapla()" value="a">Hesapla</button>
                        <br><br>
                        <div id="toplam">Toplam Hasılat: <b id="sonuc"></b> TL</div>
                    </div>
                </div>
                <div class="basketbol">
                    <div class="basketbol1">
                        <table>
                            <tr>
                                <td id="bir">Branş Ad</td>
                                <td id="iki">Rakip Ad</td>
                                <td id="uc">Bilet Fiyatı</td>
                                <td id="dort">Toplam Seyirci</td>
                                <td id="bes">Gelir</td>
                            </tr>
                            <?php
			                foreach($basketbolmaclariverileri as $bmv){?>
			 
			 	                <tr class="basketbol_mu_veri">
			 	                <td id="bir"><?= $bmv->brans_ad ?></td>
				                <td id="iki"><?= $bmv->rakip_ad ?></td>
                                <td id="uc"><?= $bmv->bilet_fiyati ?></td>
				                <td id="dort"><?= $bmv->toplam_seyirci ?></td>
				                <td id="bes"><?= $bmv->gelir ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                        
                    </div>
                    <div class="basketbol2">
                        <table>
                            <tr>
                                <td id="bir">Ortalama Maç Ücreti</td>
                                <td id="iki">Ortalama Seyirci Sayısı</td>
                            </tr>
                            <?php
			                foreach($basketbolortveri as $bov){?>
			 
			 	                <tr class="basketbol_mu_veri2">
			 	                <td id="bir"><?= $bov->ortalamaMacUcreti ?></td>
				                <td id="iki"><?= $bov->ortalamaSeyirciSayisi ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                    <div class="basketbol3">
                        <table>
                            <tr>
                                <td id="bir">Ortalama Tahmini Gelir</td>
                            </tr>
                            <?php
			                foreach($basketboltg as $btg){?>
			 
			 	                <tr class="basketbol_mu_veri3">
			 	                <td id="bir"><?= $btg->tahminiOrtalamaGelir ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>
                <div id="chart_div4" style="width: auto; height: 600px;"></div>
                <br>
                <div id="chart_div5" style="width: auto; height: 600px;"></div>
                <br>
                <div id="chart_div6" style="width: auto; height: 600px;"></div>
                <div class="basketboltahmin">
                    <div class="basketboltahmin_baslik">
                        <p>Tahmini Bilet Fiyatı ve Seyirci Sayısı Verilerini Giriniz.</p>
                    </div>
                    <div>
                        <input type="text" name="kutu3" id="kutu3" placeholder="Bilet Fiyatı">
                        <br><br>
                        <input type="text" name="kutu4" id="kutu4" placeholder="Seyirci Sayısı">
                        <br><br>
                        <button id="buton" onclick="hesapla2()" value="a2">Hesapla</button>
                        <br><br>
                        <div id="toplam">Toplam Hasılat: <b id="sonuc2"></b> TL</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>