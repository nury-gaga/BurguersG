<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Subir archivos al servidor</title>
    <meta name ="author" content ="Norfi Carrodeguas">
    <style type="text/css" media="screen">
        body{font-size:1.2em;}
    </style>
</head>
<body>
<form enctype="multipart/form-data" action="" method="POST">
<input name="uploadedfile" type="file">
<input type="submit" value="Subir archivo">
</form> 
<?php
$uploadedfileload="true";
$uploadedfile_size=$_FILES['uploadedfile'];
echo $_FILES[uploadedfile];
if ($_FILES[uploadedfile]>200000)
{$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
$uploadedfileload="false";}

if (!($_FILES[uploadedfile] =="image/pjpeg" OR $_FILES[uploadedfile]=="image/gif" OR $_FILES[uploadedfile]=="image/png"))
{$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
$uploadedfileload="false";}

$file_name=$_FILES[uploadedfile];
$add="uploads/$file_name";
if($uploadedfileload=="true"){

if(move_uploaded_file ($_FILES[uploadedfile], $add)){
echo " Ha sido subido satisfactoriamente";
}else{echo "Error al subir el archivo";}

}else{echo $msg;}
?>
</body>
</html> 