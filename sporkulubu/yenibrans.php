<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT yeni_brans.ybrans_ad, cinsiyet.cinsiyet_ad
FROM yeni_brans LEFT JOIN cinsiyet ON yeni_brans.cinsiyet_id = cinsiyet.cinsiyet_id
ORDER BY yeni_brans.ybrans_ad');
$sorgu->execute();
$yenibranslist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * FROM ybransturnuvayakat');
$sorgu->execute();
$ybransturnuvayakatlist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * FROM ybransturnuvabil');
$sorgu->execute();
$ybransturnuvabillist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * FROM ybranssponsorvar');
$sorgu->execute();
$ybranssponsorvarlist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * FROM ybranssponsorbil');
$sorgu->execute();
$ybranssponsorbillist=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<!DOCTYPE html>
<head>
<title>Spor Kulübü KDS</title>
<meta charset="UTF-8"/>
<meta name="Description" content=""/>
<meta name="Keywords" content=""/>
<link href="style.css" type="text/css" rel="stylesheet"/>
<script language="javascript">

function hesapla()
{
    var x1=document.getElementById("kutu1").value;
    var x2=document.getElementById("kutu2").value;
    var x3=document.getElementById("kutu3").value;
    var x4=document.getElementById("kutu4").value;
    var x5=document.getElementById("kutu5").value;
    var a = x1*x2;
    var b = x3*x4;
    var c = x5*1;
    var d = a+b+c;

    document.getElementById("sonuc").innerHTML=d;


};
	
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
            <div class="yenibrans_icerik">
                <div class="yenibrans_tablo1">
                    <div>
                        <table>
                            <tr>
                                <td id="bir">Yeni Branş Ad</td>
                                <td id="iki">Cinsiyet</td>
                            </tr>
                            <?php
			                foreach($yenibranslist as $ybl){?>
			 
			 	                <tr class="yenibrans_genel_veri1">
			 	                <td id="bir"><?= $ybl->ybrans_ad ?></td>
				                <td id="iki"><?= $ybl->cinsiyet_ad ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="yenibrans_tablo2">
                    <div>
                        <table>
                            <tr>
                                <td id="bir">Yeni Branş Ad</td>
                                <td id="iki">Cinsiyet</td>
                                <td id="uc">Turnuva Ad</td>
                                <td id="dort">Turnuva Durumu</td>
                            </tr>
                            <?php
			                foreach($ybransturnuvayakatlist as $ybtkl){?>
			 
			 	                <tr class="yenibrans_genel_veri2">
			 	                <td id="bir"><?= $ybtkl->ybrans_ad ?></td>
				                <td id="iki"><?= $ybtkl->cinsiyet_ad ?></td>
                                <td id="uc"><?= $ybtkl->turnuva_ad ?></td>
                                <td id="dort"><?= $ybtkl->turnuvaDurumu ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="yenibrans_tablo3">
                    <div>
                        <table>
                            <tr>
                                <td id="bir">Yeni Branş Ad</td>
                                <td id="iki">Cinsiyet</td>
                                <td id="uc">Turnuva Ad</td>
                                <td id="dort">Galibiyet Primi</td>
                                <td id="bes">Beraberlik Primi</td>
                                <td id="alti">Sponsor Primi</td>
                            </tr>
                            <?php
			                foreach($ybransturnuvabillist as $ybll){?>
			 
			 	                <tr class="yenibrans_genel_veri3">
			 	                <td id="bir"><?= $ybll->ybrans_ad ?></td>
				                <td id="iki"><?= $ybll->cinsiyet_ad ?></td>
                                <td id="uc"><?= $ybll->turnuva_ad ?></td>
				                <td id="dort"><?= $ybll->galibiyet_prim ?></td>
                                <td id="bes"><?= $ybll->beraberlik_prim ?></td>
                                <td id="alti"><?= $ybll->sponsor_prim ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="yenibrans_tahmin">
                    <div class="yenibrans_tahmin_baslik">
                        <p>Turnuvadan Gelecek Hasılatı Hesaplayınız:</p>
                    </div>
                    <div>
                        <br><br>
                        <input type="text" name="kutu1" id="kutu1" placeholder="Galibiyet Primi">
                        <br><br>
                        <input type="text" name="kutu2" id="kutu2" placeholder="Maç Sayısı">
                        <br><br>
                        <input type="text" name="kutu3" id="kutu3" placeholder="Beraberlik Primi">
                        <br><br>
                        <input type="text" name="kutu4" id="kutu4" placeholder="Maç Sayısı">
                        <br><br>
                        <input type="text" name="kutu5" id="kutu5" placeholder="Sponsor Primi">
                        <br><br>
                        <button id="buton" onclick="hesapla()" value="d">Hesapla</button>
                        <br><br>
                        <div class="toplam">Toplam Turnuva Geliri: <b id="sonuc"></b> TL</div>
                    </div>
                </div>

                <div class="yenibrans_tablo4">
                    <div>
                        <table>
                            <tr>
                                <td id="bir">Yeni Branş Ad</td>
                                <td id="iki">Cinsiyet</td>
                                <td id="uc">Sponsor Ad</td>
                                <td id="dort">Sponsor Durumu</td>
                            </tr>
                            <?php
			                foreach($ybranssponsorvarlist as $ybsvl){?>
			 
			 	                <tr class="yenibrans_genel_veri4">
			 	                <td id="bir"><?= $ybsvl->ybrans_ad ?></td>
				                <td id="iki"><?= $ybsvl->cinsiyet_ad ?></td>
                                <td id="uc"><?= $ybsvl->sponsor_ad ?></td>
                                <td id="dort"><?= $ybsvl->sponsorDurumu ?></td>
			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="yenibrans_tablo5">
                    <div>
                        <table>
                            <tr>
                                <td id="bir">Yeni Branş Ad</td>
                                <td id="iki">Cinsiyet</td>
                                <td id="uc">Sponsor Ad</td>
                                <td id="dort">Sponsorluk Alanı</td>
                                <td id="bes">Sponsorluk Ücreti</td>
                                <td id="alti">Sponsorluk Türü</td>
                            </tr>
                            <?php
			                foreach($ybranssponsorbillist as $ybsll){?>
			 
			 	                <tr class="yenibrans_genel_veri5">
			 	                <td id="bir"><?= $ybsll->ybrans_ad ?></td>
				                <td id="iki"><?= $ybsll->cinsiyet_ad ?></td>
                                <td id="uc"><?= $ybsll->sponsor_ad ?></td>
				                <td id="dort"><?= $ybsll->sponsor_alan ?></td>
				                <td id="bes"><?= $ybsll->sponsor_ucret ?></td>
				                <td id="alti"><?= $ybsll->sponsor_tur ?></td>

			                    </tr>
				 
			                <?php } ?>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>
</html>