<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

// link to the font file no the server
$fontnome = 'font/Roboto-Regular.ttf';
// controls the spacing between text

//JPG image quality 0-100
$quality = 100;

function create_image($user){
$height = 0;
$i=30;

global $fontnome;	
global $quality;
global $im;
$file = "covers/".md5($user[0]['nome'].$user[1]['nome'].$user[2]['nome']).".jpg";	

// if the file already exists dont create it again just serve up the original	
//if (!file_exists($file)) {	


// define the base image that we lay our text on
$im = imagecreatefromjpeg("pass.png");
$src = imagecreatefromjpeg('fotos/foto.png');

// setup the text colours
$color['grey'] = imagecolorallocate($im, 54, 56, 60);
$color['green'] = imagecolorallocate($im, 55, 189, 102);

// this defines the starting height for the text block
$y = imagesy($im) - $height - 550;
$imgy = imagesy($src) - $height - 550;

imagecopymerge($im, $src, 124, 463, 0, 0, 353, 354, 100);


// loop through the array and write the text	
foreach ($user as $value){
	// center the text in our image - returns the x value
	$x = center_text($value['nome'], $value['font-size']);	
	imagettftext($im, $value['font-size'], 0, $x, $y+$i, $color[$value['color']], $fontnome,$value['nome']);
	// add 32px to the line height for the next text block
	$i = $i+36;
}

// create the image
imagejpeg($im, $file, $quality);

//}

return $file;	
}

function center_text($string, $font_size){

global $fontnome;

$image_width = 1004;
$dimensions = imagettfbbox($font_size, 0, $fontnome, $string);

return ceil(($image_width - $dimensions[4]) / 5.0);				
}



$user = array(

array(
	'nome'=> 'Nome',
	'font-size'=>'36',
	'color'=>'grey'),

array(
	'nome'=> 'Cargo',
	'font-size'=>'16',
	'color'=>'grey'),

array(
	'nome'=> 'Organização',
	'font-size'=>'13',
	'color'=>'green'
	)
);

if(isset($_POST['submit'])){

$error = array();

if(strlen($_POST['nome'])==0){
	$error[] = 'Please enter a nome';
}

if(strlen($_POST['local_e'])==0){
	$error[] = 'Please enter a local_e title';
}		

if(strlen($_POST['email'])==0){
	$error[] = 'Please enter an email address';
}

if(count($error)==0){

	$file = rand(1000,100000)."-".$_FILES['foto']['nome'];
    $file_loc = $_FILES['foto']['tmp_nome'];
	 $file_size = $_FILES['foto']['size'];
	 $file_type = $_FILES['foto']['type'];
	 $folder="fotos/";
 
 	move_uploaded_file($file_loc,$folder.$file);

	$user = array(

		array(
			'nome'=> $_POST['nome'], 
			'font-size'=>'27',
			'color'=>'grey'),
		
		array(
			'nome'=> $_POST['local_e'],
			'font-size'=>'16',
			'color'=>'grey'),
		
		array(
			'nome'=> $_POST['email'],
			'font-size'=>'13',
			'color'=>'green'
			),
		array(
			'nome'=> $_POST['email'],
			'font-size'=>'13',
			'color'=>'green'
			)
		
		);	
	$im = imagecreatefromjpeg("pass.jpg");	
	imagecopymerge($im, imagecreatefromjpeg($folder.$file), 124, 463, 0, 0, 353, 354, 100);
}

}

// run the script to create the image
$filenome = create_image($user);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Gerar Crachás</title>
<link href="../style.css" rel="stylesheet" type="text/css" />

<style>
input{
	border:1px solid #ccc;
	padding:8px;
	font-size:14px;
	width:300px;
}

.submit{
	width:110px;
	background-color:#FF6;
	padding:3px;
	border:1px solid #FC0;
	margin-top:20px;}	

	</style>

</head>

<body>

	<img src="<?=$filenome;?>?id=<?=rand(0,1292938);?>" /><br/><br/>

	<ul>
		<?php if(isset($error)){

			foreach($error as $errors){

				echo '<li>'.$errors.'</li>';

			}


		}?>
	</ul>
<!--
	<a href="<?php echo $filenome; ?>">Clique aqui para Baixar</a>

	<div class="dynamic-form">
		<form action="" method="post" enctype="multipart/form-data">
			<label>Nome</label>
			<input type="text" value="<?php if(isset($_POST['nome'])){echo $_POST['nome'];}?>" nome="nome" placeholder="nome"><br/>
			<label>Local de Trabalho</label>
			<input type="text" value="<?php if(isset($_POST['local_e'])){echo $_POST['local_e'];}?>" nome="local_e" placeholder="local_e Title"><br/>
			<label>Email</label>
			<input type="text" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" nome="email" placeholder="Email"><br/>
			<input nome="submit" type="submit" class="btn btn-primary" value="Update Image" />
		</form>
	</div>
-->
</body>
</html>