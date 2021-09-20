<?php

// inisialisasi variabel
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";

// formulir dikirimkan
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// mendeklarasikan fungsi enkripsi dan dekripsi
	require_once('vigenere.php');
	
	// mengatur variabel
	$pswd = $_POST['pswd'];
	$code = $_POST['code'];
	
	// memeriksa apakah kata sandi disediakan
	if (empty($_POST['pswd']))
	{
		$error = "Please enter a password!";
		$valid = false;
	}
	
	// memeriksa apakah teks disediakan
	else if (empty($_POST['code']))
	{
		$error = "Please enter some text or code to encrypt or decrypt!";
		$valid = false;
	}
	
	// memeriksa apakah kata sandi alfanumerik
	else if (isset($_POST['pswd']))
	{
		if (!ctype_alpha($_POST['pswd']))
		{
			$error = "Password should contain only alphabetical characters!";
			$valid = false;
		}
	}
	
	// masukan valid
	if ($valid)
	{
		// jika tombol enkripsi diklik
		if (isset($_POST['encrypt']))
		{
			$code = encrypt($pswd, $code);
			$error = "Text encrypted successfully!";
			$color = "#526F35";
		}
			
		// jika tombol dekripsi diklik
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($pswd, $code);
			$error = "Code decrypted successfully!";
			$color = "#526F35";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
</head>
<body>
    <form action="index.php" method="post">
        <div class="login">
            <div class="avatar">
                <i class="fa fa-windows"></i>
            </div>
            <div class="box-login">
                <i class="fas fa-lock"></i>
                <input type="text" name="pswd" id="pass" value="<?php echo htmlspecialchars($pswd); ?>" />
            </div>
            <div class="box-login">
                <i class="fas fa-book"></i>
                <input type="textarea" name="code" id="box" value="<?php echo htmlspecialchars($code); ?>" />
            </div>
            <input type="submit" name="encrypt" class="button" value="Encode" onclick="validate(1)" /><br>
            <input type="submit" name="decrypt" class="button" value="Decode" onclick="validate(2)" />
        </div>
    </form>
</body>
</html>