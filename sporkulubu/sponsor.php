<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * FROM futbolsponsorverileri');
$sorgu->execute();
$futbolsponsorveri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * FROM basketbolsponsorverileri');
$sorgu->execute();
$basketbolsponsorveri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * FROM voleybolsponsorverileri');
$sorgu->execute();
$voleybolsponsorveri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<!DOCTYPE html>
<head>
<title>Spor Kulübü KDS</title>
<meta charset="UTF-8"/>
<meta name="Description" content=""/>
<meta name="Keywords" content=""/>
<link href="style.css" type="text/css" rel="stylesheet"/>
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
            <div class="sponsor_icerik">
                <div class="futbol">
                    <table>
                        <tr class="baslik">
                            <td id="bir">Branş Ad</td>
                            <td id="iki">Sponsor Ad</td>
                            <td id="uc">Sponsorluk Alanı</td>
                            <td id="dort">Sponsorluk Ücreti</td>
                            <td id="bes">Sponsorluk Türü</td>
                        </tr>
                        <?php
		                foreach($futbolsponsorveri as $fsv){?>			 
			 	            <tr class="s_futbol_veri">
			 	            <td id="bir"><?= $fsv->brans_ad ?></td>
                            <td id="iki"><?= $fsv->sponsor_ad ?></td>
                            <td id="uc"><?= $fsv->sponsor_alan ?></td>
			                <td id="dort"><?= $fsv->sponsor_ucret ?></td>
                            <td id="bes"><?= $fsv->sponsor_tur ?></td>
		                    </tr>
			 
		                <?php } ?>
                    </table>
                </div>
                <div class="basketbol">
                    <table>
                        <tr class="baslik">
                            <td id="bir">Branş Ad</td>
                            <td id="iki">Sponsor Ad</td>
                            <td id="uc">Sponsorluk Alanı</td>
                            <td id="dort">Sponsorluk Ücreti</td>
                            <td id="bes">Sponsorluk Türü</td>
                        </tr>
                        <?php
		                foreach($basketbolsponsorveri as $bsv){?>			 
			 	            <tr class="s_basketbol_veri">
			 	            <td id="bir"><?= $bsv->brans_ad ?></td>
                            <td id="iki"><?= $bsv->sponsor_ad ?></td>
                            <td id="uc"><?= $bsv->sponsor_alan ?></td>
			                <td id="dort"><?= $bsv->sponsor_ucret ?></td>
                            <td id="bes"><?= $bsv->sponsor_tur ?></td>
		                    </tr>
			 
		                <?php } ?>
                    </table>
                </div>
                <div class="voleybol">
                    <table>
                        <tr class="baslik">
                            <td id="bir">Branş Ad</td>
                            <td id="iki">Sponsor Ad</td>
                            <td id="uc">Sponsorluk Alanı</td>
                            <td id="dort">Sponsorluk Ücreti</td>
                            <td id="bes">Sponsorluk Türü</td>
                        </tr>
                        <?php
		                foreach($voleybolsponsorveri as $vsv){?>			 
			 	            <tr class="s_voleybol_veri">
			 	            <td id="bir"><?= $vsv->brans_ad ?></td>
                            <td id="iki"><?= $vsv->sponsor_ad ?></td>
                            <td id="uc"><?= $vsv->sponsor_alan ?></td>
			                <td id="dort"><?= $vsv->sponsor_ucret ?></td>
                            <td id="bes"><?= $vsv->sponsor_tur ?></td>
		                    </tr>
			 
		                <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>