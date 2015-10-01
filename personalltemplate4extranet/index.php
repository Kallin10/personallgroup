<!-- 
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
-->

<!-- Template para as páginas da extranet do sistema personal
	* Este template foi desenvolvido com a finalidade de funcionar
    * como cama View (padrão MVC) para qualquer sistema que permite este
    * padrão.
    * Apesar de ter sido desenvolvido visando o uso do JomSocial, 
    * o desenvolvedor deverá respeitar o layoute ou adotar novo template
    * que satisfaça às suas necessidades.
    * Autor: Pedro "Ratto" Paixão
    * versão: 1.0
-->

<?php

  defined('_JEXEC') or die;

  $doc = JFactory::getDocument();

  $doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap.min.css');
  $doc->addStyleSheet('templates/' . $this->template . '/css/preset.css');
  $doc->addScript('/templates/' . $this->template . '/js/main.js', 'text/javascript');
  
  JHTML::_('behavior.modal');
  
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

	<!-- No cabeçalho teremos os módulos customizados com os alertas da rede social
    	e com os menus de perfil. -->
        
    <div class="row">
      <div class="col-md-6 col-lg-6 position-search"> <!-- campo de pesquisa -->
          <jdoc:include type="modules" name="alerts" style="xhtml" />
      </div>
      <div class="col-md-6 col-lg-6 position-login"> <!-- área de login -->
          <jdoc:include type="modules" name="tabs" style="xhtml" />
      </div>
    </div>
    <!-- Área de mensagens do Joomla! -->
    <div class="row">
    	<div class="col-md-12"> <!-- área de mensagem -->
          <jdoc:include type="message" />
    </div>
    <!-- Main -->
    <div class="row">
      <!-- o menu direito, na verdade, é uma reutilização do módulo de login
      (mod_hellome) do JomSocial  -->
      <div class="col-md-2 menu_profile">
      	<jdoc:include type="modules" name="hello" style="xhtml" />
      </div>
      <div class="col-md-7 pg_content"> <!-- conteúdo principal -->
      	<jdoc:include type="modules" name="position-2" style="none" />
      	<jdoc:include type="component" />
      </div>
      <!-- Esta será a posição do módulo do menu de Personalls, ainda
      	a ser desenvolvido -->
      <div class="col-md-3 list_personall">
        <jdoc:include type="modules" name="personalls" style="none" />
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