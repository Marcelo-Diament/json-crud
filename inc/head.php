<?php header("Content-Type: text/html;charset=UTF-8"); ?>
<?php require_once "utils/functions.php" ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=5, shrink-to-fit=no">
	<title>CRUD JSON | Create</title>
	<link rel="manifest" href="manifest.json">
	<script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Organization",
        "url": "https://djament.com.br/estudos/json-crud/index.php",
        "logo": "https://djament.com.br/estudos/json-crud/assets/img/jason1.jpg",
        "description": "Estudo sobre JSON CRUD PHP",
        "additionalType": "http://www.productontology.org/doc/Web_development",
        "telephone" : "+55-11-97605-2723",
        "email" : "contato@djament.com.br",
        "name" : "Djament",
        "alternateName" : "Djament",
        "address" : {
          "@type" : "PostalAddress",
          "addressCountry" : "BR",
          "addressLocality" : "São Paulo",
          "addressRegion" : "São Paulo",
          "postalCode" : "05089-001",
          "streetAddress" : "Rua Guaipá, Vila Leopoldina"
        },
        "brand": {
          "@type": "Thing",
          "name": "Djament"
        },
        "sameAs" : [ "https://www.facebook.com/djamentcomunicacao", "https://www.instagram.com/djamentcomunicacao/" ],
        "contactPoint": [{
          "@type": "ContactPoint",
          "telephone": "+55-11-97605-2723",
          "contactType": "sales",
          "areaServed": "BR",
          "availableLanguage": ["Portuguese","English", "Spanish"]
        }]
      }
    </script>
	<meta http-equiv="Cache-control" content="public, max-age=31536000">
	<meta http-equiv="Expires" CONTENT="Mon, 13 Jul 2020 19:04:06 GMT">
	<meta name="title" content="CRUD JSON | Create">
	<meta name="description" content="Estudo sobre CRUD JSON PHP">
	<meta name="revisit-after" content="1 year">
	<meta name="identifier-URL" content="https://djament.com.br/estudos/json-crud/index.php">
	<meta name="abstract" content="CRUD JSON PHP">
	<meta name="author" content="Marcelo Diament, Djament Comunicação">
	<meta name="robots" content="index,follow">
	<meta name="contact" content="contato@djament.com.br">
	<meta name="reply-to" content="contato@djament.com.br">
	<meta name="copyright" content="Djament">
	<meta name="rating" content="general">
	<meta name="web_author" content="Djament Comunicação">
	<meta name="theme-color" content="#000000">
	<meta property="og:site_name" content="Djament">
	<meta property="og:title" content="Djament">
	<meta property="og:description" content="Saiba mais sobre como executar o CRUD com JSON e PHP">
	<meta property="og:url" content="https://djament.com.br">
	<meta property="og:locale" content="pt-BR">
	<meta name="og:locality" content="São Paulo">
	<meta name="og:region" content="SP">
	<meta name="og:country-name" content="BR">
	<meta property="og:type" content="website">
	<meta property="og:image" content="https://djament.com.br/estudos/json-crud/assets/img/jason1.jpg">
	<meta property="og:image:alt" content="JSON CRUD | Jason">
	<meta property="og:image:url" content="https://djament.com.br/estudos/json-crud/assets/img/jason1.jpg">
	<meta property="og:image:type" content="img/jpg">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="CRUD JSON">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="shortcut icon" sizes="225x225" href="assets/img/jason1.jpg">
	<link rel="icon" type="image/png" sizes="225x225" href="assets/img/jason1.jpg">	
	<link rel="canonical" href="https://djament.com.br/estudos/json-crud/index.php">
	<meta name="keywords" content="json, crud, php, dev, web development, programação, desenvolvimento, estudo">
	<link async rel="stylesheet" type="text/css" href="assets/css/style.min.css">
</head>