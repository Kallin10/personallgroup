<?php

/*
 * Página vermelha
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
$user = Jfactory::getUser();

?>

<style type="text/css">
	
input[type="button"]{
	background: #5ea561 none repeat scroll 0% 0%; 
	color: #ffffff; 
	border-radius: 3px; 
	border: 1px solid #5d742b;
	margin: 10px 0px;}
	
input[type="button"]:hover{
	background: #63DA68;
    text-decoration: none;
	border: 1px solid #66B93B;}
	
label{
	margin: 0px 10px 30px 30px;}
	
@media screen and (max-width:450px){
	label{
		margin:0px 30px;
		float:left;
		clear:both;}
	input[type="button"]{
		margin:15px 30px;}}
	
</style>

<div style="margin: 0px auto 20px; max-width: 700px; background-color: rgba(201, 67, 67, 0.3);  border-radius: 20px;  max-width: 700px;">
    <h4 style=" padding: 30px 35px; color: #fbfff9; border-bottom: 1px solid #8A6161;">Este é o painel de sua empresa. Em breve, mais recursos estarão dsponíveis.</h4>
    <label>Solicitações de Personall pendentes:</label><a href="index.php?option=com_personallgroup&task=gerenciaMeusPersonalls" style="text-decoration: none;"><input type="button" value="Abrir Painel" />
    </a>
</div>