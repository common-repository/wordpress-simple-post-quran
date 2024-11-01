<html>
<head>
<script type="text/javascript" src="../../../wp-includes/js/tinymce/tiny_mce_popup.js?ver=3211"></script>
<script>
	function saveContent() {
		var surah = document.getElementById('surah').value;
		var ayat = document.getElementById('ayat').value;
		var x = 'ayat_'+surah;
		var jmlAyat = document.getElementById(x).value;
	
		if (ayat == '' || ayat =='0'){
			alert('Insert the number of ayat');
			document.getElementById('ayat').focus();
			return false;
		}

		alert(ayat);
		alert(jmlAyat);

		if(parseInt(ayat) > parseInt(jmlAyat)){
			alert('The maximum ayat is '+jmlAyat);
			document.getElementById('ayat').focus();
			return false;
		}

		<?php
			$dir = dirname($_SERVER['PHP_SELF']);
			echo "var path = 'http://".$_SERVER['HTTP_HOST'].$dir."';";
		?>
		//alert(document.URL);
		html = '<p style=\'text-align: center;\'><IMG class=\'aligncenter\' SRC=\''+path+'/images/'+surah+'/'+surah+'_'+ayat+'.png\' ALT=\'\' ></p>';

		tinyMCEPopup.execCommand('mcePasteWord', false, html);
		tinyMCEPopup.close();
	}

	function cancelAll()
	{
		tinyMCEPopup.close();
	}

	function initBody()
	{
		document.getElementById('ayat').focus();
	}
</script>
</head>

<body onLoad="initBody();">

<?php
$arrSurah = array('Al-Fatihah'=>'7','Al-Baqarah'=>'286','Ali-\'Imraan'=>'200','An-Nisaa\''=>'176','Al-Maaidah'=>'120','Al-An\'aam'=>'165','Al-A\'raaf'=>'206','Al-Anfal'=>'75','At-Taubah'=>'129','Yunus'=>'109','Hud'=>'123','Yusuf'=>'111','Ar-R\'ad'=>'43','Ibrahim'=>'52','Al-Hijr'=>'99','An-Nahl'=>'128','Al-Israa\''=>'111','Al-Kahfi'=>'110','Maryam'=>'98','Thaaha'=>'135','Al-Anbiyaa\''=>'112','Al-Hajj'=>'78','Al-M\'uminuun'=>'118','An-Nuur'=>'64','Al-Furqaan'=>'77','Asy-Syu\'araa\'227'=>'','An-Naml'=>'93','Al-Qashash'=>'88','Al-\'Ankabuut'=>'69','Ar-Ruum'=>'60','Luqman'=>'34','As-Sajdah'=>'30','Al-Ahzaab'=>'73','Saba\''=>'54','Faathir'=>'45','Yaa Siin'=>'83', 'Ash-Shaffaat'=>'182', 'Shaad'=>'88', 'Az-Zumar'=>'75', 'Ghafir'=>'85', 'Fushshilat'=>'54', 'Asy-Syuura'=>'53', 'Az-Zukhruf'=>'89', 'Ad-Dukhaan'=>'59', 'Al-Jaatsiyah'=>'37', 'Al-Ahqaaf'=>'35', 'Muhammad'=>'38', 'Al-Fath'=>'29', 'Al-Hujarat'=>'18', 'Qaaf'=>'45', 'Adz-Dzaariyaat'=>'60', 'Ath-Thuur'=>'49','An-Najm'=>'62', 'Al-Qamar'=>'55','Ar-Rahmaan'=>'78','Al-Waaqi\'ah'=>'96', 'Al-Hadiid'=>'29', 'Al-Mujaadilah'=>'22', 'Al-Hasyr'=>'24', 'Al-Mumtahanah'=>'13', 'Ash-Shaf'=>'14','Al-Jumu\'ah'=>'11', 'Al-Munaafiquun'=>'11', 'At-Taghaabun'=>'18', 'Ath-Thalaaq'=>'12', 'At-Tahriim'=>'12', 'Al-Mulk'=>'30', 'Al-Qalam'=>'52', 'Al-Haaqqah'=>'52', 'Al-Ma\'aarij'=>'44', 'Nuh'=>'28', 'Al-Jin'=>'28', 'Al-Muzzammil'=>'20', 'Al-Muddatstsir'=>'56', 'Al-Qiyaamah'=>'40', 'Al-Insaan'=>'31', 'Al-Mursalaat'=>'50', 'An-Nabaa\''=>'40', 'An-Nazi\'aat'=>'46', '\'Abasa'=>'42', 'At-Takwiir'=>'29', 'Al-Infithaar'=>'19', 'Al-Muthaffifiin'=>'36', 'Al-Insyiqaaq'=>'25', 'Al-Buruuj'=>'22', 'Ath-Thaariq'=>'17', 'Al-\'Alaa'=>'19', 'Al-Ghaasyiyah'=>'26', 'Al-Fajr'=>'30', 'Al-Balad'=>'20', 'Asy-Syams'=>'15', 'Al-Lail'=>'21','Adh-Dhuhaa'=>'11', 'Al-Insyiraah'=>'8', 'At-Tiin'=>'8','Al-\'Alaq'=>'19', 'Al-Qadr'=>'5', 'Al-Bayyinah'=>'8', 'Al-Zalzalah'=>'8', 'Al-\'Aadiyaat'=>'11', 'Al-Qaari\'ah'=>'11','At-Takaatsur'=>'8', 'Al-\'Ashr'=>'3','Al-Humazah'=>'9','Al-Fiil'=>'5','Quraisy'=>'4','Al-Maa\'uun'=>'7','Al-Kautsar'=>'3','Al-Kaafiruun'=>'6','An-Nashr'=>'3','Al-Lahab'=>'5','Al-Ikhlaash'=>'4','Al-Falaq'=>'5','An-Naas'=>'6');
?>
<FORM METHOD="POST" ACTION="" onsubmit="saveContent();">
<TABLE align="center" cellpadding="3">
<TR>
	<TD>Surah</TD>
	<TD>&nbsp;</TD>
	<TD>
	<SELECT NAME="surah" ID="surah">
	<?php
	$x=0;
	foreach($arrSurah as $surah => $jml)
	{
		$x++;
		echo "<option value=".$x.">".$x."&nbsp;".$surah."</option>";
		$arrAyat[$x] = "<INPUT TYPE=\"hidden\" NAME=\"ayat_".$x."\" value=\"".$jml."\" id=\"ayat_".$x."\">";		
	}	
	?>
	</SELECT>
	</TD>
</TR>
<TR>
	<TD>Ayat</TD>
	<TD>&nbsp;</TD>
	<TD><INPUT TYPE="text" NAME="ayat" id="ayat"></TD>
</TR>
<TR>
	<TD colspan=3 align=center>
		<INPUT TYPE="button" VALUE="Insert" name="submit" ONCLICK="saveContent();">&nbsp;<INPUT TYPE="button" VALUE="Cancel" name="cancel" ONCLICK="cancelAll();">
		<?php
		foreach($arrAyat as $ayat)
		{
			echo $ayat;
		}
		?>
	</TD>
</TR>
</TABLE>

<INPUT TYPE="hidden" NAME="post_id" value="<?php echo $_GET['post_id']?>" >

</FORM>

</body>
</html>
