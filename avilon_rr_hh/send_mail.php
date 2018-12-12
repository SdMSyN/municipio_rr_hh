<?php

$name = $_POST['name']; //nombre del remitente
$mail = $_POST['email']; //correo del remitente
$coment = $_POST['message']; //Comentario
$para = "contacto@solucionesynegocios.com.mx"; //MODIFICAR para colocar correo del destinatario
$asunto = $_POST['subject']; //asunto del mensaje

if ($mail)
    $sCabeceras = "From:" . $mail . "\n";
else
    $sCabeceras = "";
$sCabeceras .= "Cc:" . $mail . "\n";
$sCabeceras .= "MIME-version: 1.0\n";

$sTexto = "

	--------------------------------------------------------
	Envio de comentario a través de página Web
	-------------------------------------------------------
	\nDe: " . $name . "
	\n" . $coment . " ";

if (mail($para, $asunto, $sTexto, $sCabeceras)) {
    echo json_encode(array("error"=>0, "msgErr"=>"Exito"));
} else {
    echo json_encode(array("error"=>1, "msgErr"=>"Error"));
}
?>