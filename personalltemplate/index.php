<?php

/* 
 * Copyright (C) 2015, PersonallGroup
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

  defined('_JEXEC') or die;

  $doc = JFactory::getDocument();

  $doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap.min.css');
  $doc->addStyleSheet('templates/' . $this->template . '/css/preset.css');
  $doc->addStyleSheet('templates/' . $this->template . '/css/KKmenu.css');
  $doc->addScript('/templates/' . $this->template . '/js/main.js', 'text/javascript');
  /*Documentos do Efeito Sanfona------------------------------------------------*/
  $doc->addStyleSheet('templates/' . $this->template . '/css/Accordion_Effect.css');
  
  
?>

<!DOCTYPE html>
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->

<jdoc:include type="head" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Metatags para o robot SEO do Google -->
<meta name="description" content="Portal para encontrar o produto que você quer">
<meta name="keywords" content="Personall, Personallgroup, Produtos, Serviços, Consumidores, Vendedores, Empresas">
<meta name="author" content="INETEP - Instituto Nacional de Educação, Tecnologia e Pesquisa">

<!--<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="/css/preset.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<script src="js/main.js" type="text/javascript"></script>-->

</head>

<body>
<!-- Conteúdo da página inteira -->
<div class="container-fluid">
    <!-- Menu -->
    <div class="col-md-offset-0">
      <section class="KKmenu">
          <input id="KK-1" name="lateral-menu" type="checkbox"/>
          
          <article class="KK-size">
              <jdoc:include type="modules" name="position-7" style="xhtml" />
          </article>
      </section>
    </div>
    <div class="KKbotao">
        <h3><label id="menutag" for="KK-1"><i class="fa fa-bars"></i></label></h3>
    </div>
    <!-- Header -->
    <div class="row">
      <div class="col-md-6 col-lg-6 position-search"> <!-- campo de pesquisa -->
          <jdoc:include type="modules" name="position-1" style="none" />
      </div>
      <div class="col-md-6 col-lg-6 position-login"> <!-- área de login -->
          <jdoc:include type="modules" name="hello" style="none" />
      </div>
    </div>
    
    <!-- Feature -->
    <div class="row">
      <div class="col-md-12 col-lg12 position-banner"> <!-- banner -->
        <jdoc:include type="modules" name="banner" style="none" />
      </div>
      
    </div>
    <!-- Main -->
    <div class="row">
      <div class="col-md-12 position-warning"> <!-- mensagens/avisos -->
          <jdoc:include type="modules" name="position-4" style="none" />
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"> <!-- conteúdo principal -->
          <jdoc:include type="modules" name="position-2" style="none" />
          <jdoc:include type="message" />
          <jdoc:include type="component" />
      </div>
    </div>
    <!-- Footer -->
    <div class="row">
      <div class="col-md-9"> <!-- footer -->
          <jdoc:include type="modules" name="footer" style="none" />
      </div>
      <div class="col-md-3"> <!-- botão "topo" -->
          <jdoc:include type="modules" name="position-5" style="none" />
      </div>
    </div>
  </div>
</body>
</html>