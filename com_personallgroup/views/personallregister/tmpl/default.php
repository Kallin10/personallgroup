<?php

/*
 * view Personall Register padrão
 */

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

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$user = Jfactory::getUser();

?>

<style type="text/css">

#txtEmpresa, #txtEmailProf, select[name="cBoxTipoEmp"]{
	margin-bottom:10px;
	padding: 2px;
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
    <h4 style="background-color: rgba(67, 201, 67, 0.3); padding: 13px; border-radius: 20px; color: #fbfff9; max-width: 700px; margin: 15px;">Ol&aacute; <?php echo $user->name; ?>, 
            <br /> Este &eacute; seu perfil profissional. 
            <br /><br /> Aqui voc&ecirc; tem uma incr&iacute;vel ferramenta, que poder&aacute; aumentar seu desempenho como profissional. 
            <br /> N&atilde;o se preocupe, &eacute; tudo gr&aacute;tis para voc&ecirc;.
    </h4>
    <form class="prof_extraopt2" method="post" action="index.php?option=com_personallgroup&task=iniciaRegistro">
    	<label for="txtEmpresa" class="description">Empresa: </label> <br/>
		<input name="txtEmpresa" type="text" value="" id="txtEmpresa"/><br />
        <label for="txtEmailProf" class="description">Seu e-mail profissional: </label> <br/>
		<input name="txtEmailProf" type="text" value="" id="txtEmailProf"/><br />
        <label for="cBoxTipoEmp" class="description">Sua situação profissional: </label> <br/>
    	<select name="cBoxTipoEmp">
                <option value="0" onchange=""> </option>
                <option value="1">Estou empregado</option>
                <option value="2">Sou um empresário</option>
            <!--    <option value="3">Sou um profissional autônomo</option>
                <option value="4">Sou um profissional liberal</option> -->
        </select><p />
        <input type="submit" value="Próximo" />
    </form>
</div>