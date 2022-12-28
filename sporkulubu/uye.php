<?php
include("baglanti.php");

$sorgu=$vt->prepare('SELECT * From uye');
$sorgu->execute();
$uyeverileri=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
 
?>

<?php
$baglan = mysqli_connect("localhost","root","","sporkulubukds");
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
    var x=document.getElementById("kutu1").value;
	var y=50;
  	var a = x*y;
	document.getElementById("sonuc").innerHTML=a;
}
	
</script>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <div class="baslik">
                <a id="bir">Üye Gelirlerinin Yüzde Kaçını Aidat Olarak Almak İstediğinizi Aşağıya Giriniz:</a>
            </div>
            <div class="searchuye">
                <form action="" method="Post">
                    <input type="text" class="form-control" id="kazancsorgu" autocomplete="off" placeholder="Yüzdelik Bir Oran Yazınız...">
                </form>
            </div>
            <div id="searchresult"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#kazancsorgu").keyup(function(){
                        var input = $(this).val();
                        //alert(input);
            
                        if(input !=""){
                            $.ajax({
                                url:"kazancsorgu.php",
                                method:"POST",
                                data:{input:input},
                                success:function(data){
                                    $("#searchresult").html(data);
                                }
                            });
                        }else{
                            $("$searchresult").css("display","none");
                        }
                    });
                });
            </script>
            <div class="uyetahmin">
                    <div class="uyetahmin_baslik">
                        <p>Üyelerimizden Sabit Bir Tutar Almak İstiyorsanız Aşağıya Tutarı Giriniz:</p>
                    </div>
                    <div>
                        <br><br>
                        <input type="text" name="kutu1" id="kutu1" placeholder="Tutar">
                        <br><br>
                        <br><br>
                        <button id="buton" onclick="hesapla()" value="a">Hesapla</button>
                        <br><br>
                        <div id="toplam">Toplam Aidat Tutarı: <b id="sonuc"></b> TL</div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>