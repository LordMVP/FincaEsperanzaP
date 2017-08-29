<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head>
 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
<title>PigModel Emails</title>
 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 
</head>
 
<body style="margin: 0; padding: 0;">
 
 <table align="center" border="1" cellpadding="0" cellspacing="0" width="600">
 
 <tr>
 
<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
 
 <img src="{{ asset('img/logo.png') }}" alt="Creating Email Magic" width="300" height="230" style="display: block;" />
 <h2><strong>PigModel</strong></h2>
</td>
 
 </tr>
 
 <tr>
 

 
 <tr>
 
<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
 
 <center><b>Recuperación Contraseña!</b></center>
 
</td>
 
 </tr>
 
 <tr>
 
<td style="padding: 10px; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
 
 Buen Dia <br>
 {!! $mensaje !!}

 <<strong>Recuerde que este enlace tiene un tiempo de dos horas de vencimiento</strong>
</td>
 
 </tr>
 
 <tr>
 
<td>
 
 <table border="1" cellpadding="0" cellspacing="0" width="100%">
 
 <tr>
 
<td style="padding: 10px; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
 
 <?php

$rand = rand(5, 15);
$time3 = date('H:i:s', time());

 for($i = 0; $i < $rand; $i++){
 	$id = base64_encode($id);
 	$time3 = base64_encode($time3);
 }
$rand = base64_encode(base64_encode($rand));

 //$url = "http://" . $_SERVER["SERVER_NAME"] . '/porcinos/public/restablecer?v='.base64_encode($id).'';
 $url = "http://" . $_SERVER["SERVER_NAME"] . '/porcinos/public/mail/'.$id.'/'.$time3.'/'.$rand.'/restablecer';

?>
 
<a href="{{ $url }}">Click para Restablecer Contraseña</a>

</td>
 
 </tr>
 
</table>
 
</td>
 
 </tr>
 
</td>
 
 </tr>
 
 <tr>

 
 <td bgcolor="#ee4c50" style="padding: 10px; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
 
 PigModel - Copyright © 2017 - Natalia Gamez , Jorge Quevedo & Miguel Ojeda All rights reserved.
 
</td>
 
 </tr>
 
</table>
 
</body>


</html>