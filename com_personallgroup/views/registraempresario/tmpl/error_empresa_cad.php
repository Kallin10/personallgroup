<?php

/*
 * Página com o erro de empresa existente
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
$session = JFactory::getSession();
$cnpj = $session->get('cnpj');

?>

<style type="text/css">
	
input[type="button"]{
	background: #5ea561 none repeat scroll 0% 0%; 
	color: #ffffff; 
	border-radius: 3px; 
	border: 1px solid #5d742b; 
	padding: 5px 14px; 
	margin: 10px 20px;}
	
input[type="button"]:hover{
	background: #63DA68;
    text-decoration: none;
	border: 1px solid #66B93B;}
	
</style>

<div style="margin: 0px auto; max-width: 700px;">
    <h4 style="background-color: rgba(67, 201, 67, 0.3); padding: 13px; border-radius: 20px; color: #fbfff9; max-width: 700px; margin: 15px;">
        Desculpe, mas parece que uma empresa com o CNPJ <?php echo $cnpj; ?> já está
        cadastrada em nosso sistema. <br/>
        Por favor, tente nos informar o seu CNPJ novamente e, caso ainda não seja 
        possível cadastrar a sua empresa, contate-nos.<br/>
        Analisaremos o caso e resolveremos da melhor forma possível.
    </h4>
    <a href="javascript:history.go(-2)" style="text-decoration: none;">
    	<input type="button" value="Voltar" />
    </a>
</div>