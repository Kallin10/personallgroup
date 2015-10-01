<?php

/*
 * Tela de registro com sucesso de empresa e empresário
 */

/* 
 * Copyright (C) 2015 PersonallGroup
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

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

?>

<style type="text/css">

.mensagem{
	 background-color: rgba(255, 255, 255, 0.3); 
	 padding: 13px; 
	 margin: 15px 20px 10px; 
	 border: 1px solid #e6e4e4;}
	
input[type="button"]{
	background: #5ea561 none repeat scroll 0% 0%; 
	color: #ffffff; 
	border-radius: 3px; 
	border: 1px solid #5d742b; 
	padding: 5px 14px; 
	margin-top: 15px;}
	
input[type="button"]:hover{
	background: #63DA68;
    text-decoration: none;
	border: 1px solid #66B93B;}

</style>

<div class="mensagem">
    Parabéns por cadastrar a sua empresa em nosso serviço. Agora, além de ser
    o Personall de sua própria empresa, você poderá gerenciar seus dados e 
    adicionar profissionais e conteudistas.<br/>
    <a href="index.php?option=com_community&view=profile" style="text-decoration: none;">
    	<input type="button" value="Terminar" />
    </a>
</div>