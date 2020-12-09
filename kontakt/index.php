<?php

  // Alert poruke

  $alertPoruka = '';
  $alertKlasa = '';


  if(filter_has_var(INPUT_POST, 'submit')) {

    // uzmi podatke iz forme

    $imePrezime = htmlspecialchars($_POST['imePrezime']);
    $email = htmlspecialchars($_POST['email']);
    $poruka = htmlspecialchars($_POST['poruka']);

    // Provjeri polja

    if(!empty($imePrezime) && !empty($email) && !empty($poruka)) {

      // Polja su ispunjena
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

        // email nije ok
        $alertPoruka = 'Email adresa nije ispravna!';
        $alertKlasa = 'alert-danger';

      } else {

        // email je ok, šalji podatke na mail

        // email na koji šaljemo 
        $toEmail = 'nika.brcic.skola@gmail.com';

        // subject
        $subject = 'Upit od '. $imePrezime;

        // body
        $body = '<h2>Upit</h2>
                 <h4>Ime i prezime</h4><p>' . $imePrezime . '</p>
                 <h4>Email</h4><p>' . $email . '</p>
                 <h4>Poruka</h4><p>' . $poruka . '</p>'; 

        // email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

        $headers .= "From: " . $imePrezime . "<" . $email . ">" . "\r\n";

        // slanje podataka na mail
        if(mail($toEmail, $subject, $body, $headers)) {

          // uspjeh
          $alertPoruka = 'Poruka je uspješno poslana!';
          $alertKlasa = 'alert-success';

        }  else {

          // neuspjeh
          $alertPoruka = 'Došlo je do greške!';
          $alertKlasa = 'alert-danger';

        }   


      }

  } else {

    // Greška
    $alertPoruka = 'Molimo ispunite sva polja!';
    $alertKlasa = 'alert-danger';

  }


}


?>



<!DOCTYPE html>
<html lang="hr">
<html>
<head>

	<title>Poliklinika Grbavac</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style4.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="../slike/ikone/logocolor.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
	<div class="container">
		<div class="infonav">
		  <p><img src="../slike/ikone/phone.png">(01) 377 69 96/(01) 370 23 26</p>
		  <p><img src="../slike/ikone/mail.png">info@poliklinika-grbavac.hr/ poliklinikagrbavac@gmail.com</p>
		  <p><img src="../slike/ikone/lokacija.png">Trg Francuske republike 12</p>
		</div>

		<div id="navbar" class="navbar">
			<div class="middle">
				<a class="left" href="../"><img src="../slike/ikone/logocolor.png"></br>POLIKLINIKA GRBAVAC</a>
				<div class="begone">
				<a class="right" href="../kontakt">KONTAKT</a>
					<a class="right" href="../o-nama">O NAMA</a>
					<a class="right" href="../usluge">USLUGE</a>
				</div>
				<div id="hamburger">
				<a onclick="openNav()">&#9776;</span></a>
			</div>
		  	</div>
		</div>

		<div id="myNav" class="overlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div class="overlay-content">
				<a class="down" href="../usluge">USLUGE</a>
				<a class="down" href="../o-nama">O NAMA</a>
				<a class="down" href="../kontakt">KONTAKT</a>

				<div class="infonav-mob">
					<p><img src="../slike/ikone/phone.png">(01) 377 69 96/(01) 370 23 26</p>
					<p><img src="../slike/ikone/mail.png">info@poliklinika-grbavac.hr/ poliklinikagrbavac@gmail.com</p>
					<p><img src="../slike/ikone/lokacija.png">Trg Francuske republike 12</p>
				</div>
			</div>
		</div>

		<div class="header">
			<h1> KONTAKT</h1>
			<p>KAKO NAS KONTAKTIRATI</p>
			<hr>
		</div>

		<div class="kontakt">

			<div class="info">
				<?php if($alertPoruka != ''):  ?>

				  <div class="alert <?php echo $alertKlasa?>"><?php echo $alertPoruka; ?></div>

				<?php endif; ?>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				
					<h2>LOKACIJA I KONTAKT</h2>
					<div class="unes1">
						<label for="ime">Ime i prezime</label>
						<input type="text" id="imePrezime" name="imePrezime" placeholder="">
					</div>
					<div class="unes2">
						<label for="email">Email</label>
						<input type="text" id="email" name="email" placeholder="">
					</div>
					<div class="unes3">
						<label for="poruka">Poruka</label>
						<textarea id="poruka" name="poruka" placeholder="Napišite nešto.." style="height:100px"></textarea>
					</div>
					<button type="submit" name="submit" class="button">Pošalji</button>
				</form>
			</div>
			<div class="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.06522100394!2d15.95118551546581!3d45.80995217910657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6dc52a1d469%3A0x608b23a89954fa8a!2sPoliklinika%20Grbavac!5e0!3m2!1shr!2shr!4v1588327379442!5m2!1shr!2shr" class="gogmap" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>


		<div class="footer">
			<div class="empty"></div>
			<div class="fottext1">
				<p><img src="../slike/ikone/lokacija.png">Trg Francuske republike 12</p>
				<p><img src="../slike/ikone/phone.png">(01) 377 69 96/(01) 370 23 26 </p>
				<p><img src="../slike/ikone/mail.png">info@poliklinika-grbavac.hr/</p>
				<p>poliklinikagrbavac@gmail.com </p>
			</div>
			<div class="fotlogo">
				<img src="../slike/ikone/logocolor.png">
				<h2>POLIKLINIKA GRBAVAC</h2>
			</div>
			<div class="fottext2">
				<p><img src="../slike/ikone/kartica.png">IBAN  HR8623400091110907865 </p>
				<p><img src="../slike/ikone/osoba.png">Predsjednica upravnog vijeća: Nada Grbavac </p>
				<p><img src="../slike/ikone/vaga.png">Trgovački sud u Zagrebu</p>
				<p>Tt-10/5935-2, MBS:080436856 </p>
			</div>
		</div>

	</div>

	<script src="../js/js.js"></script>
</body>
</html>