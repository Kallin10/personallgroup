<?php

/*
 * view Registra Empregado padrão
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
$empresa = $session->get('empresa');

?>

<style type="text/css">

#txtCargo, #txtNomeSuperior, #txtEmailSuperior{
	margin-bottom:10px;
	width:100%;
	max-width: 400px;}

.prof_extraopt2 {
	margin-left:20px;}
	
input[type="submit"]{
	background: #5ea561 none repeat scroll 0% 0%; 
	color: #ffffff; 
	border-radius: 3px; 
	border: 1px solid #5d742b; 
	padding: 5px 14px; 
	margin-top: 15px;}
	
input[type="submit"]:hover{
	background: #63DA68;
    text-decoration: none;
	border: 1px solid #66B93B;}

</style>

<div style="margin: 0px auto; max-width: 700px;">
	<h4 style="background-color: rgba(67, 201, 67, 0.3); padding: 13px; border-radius: 20px; color: #fbfff9; max-width: 700px; margin: 15px;"> 
		<br />Você iniciou o processo cadastramento como Personall da <?php echo $empresa; ?>. <br />
                Só precisaremos de mais alguns dados.
	</h4>
    <form class="prof_extraopt2" method="POST" action="index.php?option=com_personallgroup&task=iniciaCadEmpregado">
    	<label for="txtCargo" class="description">Qual o seu cargo? </label><br />
		<input name="txtCargo" type="text" value="" id="txtCargo"/>
        <!--<input type="button" class="fa" value="&#xf067;" name="btnAddCargo" style="padding: 2px 1px; border-radius: 8px; margin-left: 10px;">
        <input type="button" class="fa" value="&#xf068;" name="btnRemCargo" style="padding: 2px 1px; border-radius: 8px; margin-left: 2px;"> -->
        <p />
        <label for="txtNomeSuperior" class="description">Qual o nome de seu chefe? </label><br />
		<input name="txtNomeSuperior" type="text" value="" id="txtNomeSuperior"/>
        <p />
        <label for="txtEmailSuperior" class="description">Qual o e-mail de seu chefe? </label><br />
		<input name="txtEmailSuperior" type="text" value="" id="txtEmailSuperior"/>
        <p />
        <input type="submit" value="Próximo" />
    </form>
</div>