<?php

$tranKey = "024h1IlD";

$config = array(

	"PSE" => array(

		"auth" => array(
			"login" 	=> "6dd490faf9cb87a9862245da41170ff2",
			"tranKey"	=> $tranKey,
		),
		"wsdl" => "https://test.placetopay.com/soap/pse/?wsdl",
		"location" => "https://test.placetopay.com/soap/pse/",
	),
	"Productos" => array(

		"100000" => "Teclado Genuis",
		"120000" => "Teclado Gamer",
		"250000" => "Teclado y mouse Gamer"

	),
	"valor_default" => "100000",
	"names_values" => array(

			"producto" => "Producto a comprar",
            "producto_valor" => "Valor producto",
            "documentType" => "Tipo de documento",
            "document" => "Documento",
            "firstName" => "Nombre",
            "lastName" => "Apellido",
            "company" => "Compañia",
            "emailAddress" => "Correo eletrónico",
            "country" => "País",
            "province" => "Departamento",
            "city" => "Ciudad",
            "phone" => "Teléfono",
            "mobile" => "Celular"

	)

);


?>