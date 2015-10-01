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

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$user = Jfactory::getUser();

?>

<div style="margin: 0px auto; max-width: 700px;">
    <h4 style="background-color: rgba(67, 201, 67, 0.3); padding: 13px; border-radius: 20px; color: #fbfff9; max-width: 700px; margin: 15px;">Ol&aacute; <?php echo $user->name; ?>, 
            <br /> Este &eacute; seu perfil profissional. 
            <br /><br /> Aqui voc&ecirc; tem uma incr&iacute;vel ferramenta, que poder&aacute; aumentar seu desempenho como profissional. 
            <br /> N&atilde;o se preocupe, &eacute; tudo gr&aacute;tis para voc&ecirc;.
    </h4>
    <form class="prof_extraopt2" method="post" action="index.php?option=com_personallgroup&task=iniciaRegistro">
    	<label for="txtEmpresa" class="description">Empresa: </label>
		<input name="txtEmpresa" type="text" value="" id="txtEmpresa"/><br />
        <label for="txtEmailProf" class="description">Seu e-mail profissional: </label>
		<input name="txtEmailProf" type="text" value="" id="txtEmailProf"/><br />
    	<select name="cBoxTipoEmp">
                <option value="0" onchange=""> </option>
                <option value="1">Estou empregado</option>
                <option value="2">Sou um empresário</option>
                <option value="3">Sou um profissional autônomo</option>
                <option value="4">Sou um profissional liberal</option>
        </select><p />
        <input type="submit" value="Próximo" />
    </form>
<!--	<p style="background-color: rgba(255, 255, 255, 0.3); padding: 13px; margin: 55px 20px 10px; border: 1px solid #e6e4e4;">
		Logo abaixo insira o e-mail de seu superior na empresa (supervisor, gerente, diretor, propiet&aacute;rio...) enviaremos uma mensagem para esta pessoa para validar seu cadastro e voc&ecirc; receber todas as informa&ccedil;&otilde;es da empresa.
	</p>
	<form class="prof_regform" style="margin: 22px; background-color: rgba(255, 255, 255, 0.4); padding: 15px;">
		<div style="max-width: 315px; width: 100%; float: left; margin-right: 35px;">
			<label for="camp_1" class="description">Digite seu e-mail profissional: </label><br />
			<input name="camp_1" type="text" value="" id="camp_1" style="width: 100%;" /><br />
			<label for="camp_2" class="description">Digite o e-mail do seu superior na empresa: </label><br />
			<input name="camp_2" type="text" value="" id="camp_2" style="width: 100%;" /><br />
			<label for="camp_3" class="description">Digite os e-mails que quer mandar como c&oacute;pia: </label><br />
			<input name="camp_3" type="text" value="" id="camp_3" style="width: 100%;" />
		</div>
		<div style="max-width: 275px; float: left; width: 100%;">
			<label for="camp_4" class="description">Digite uma mensagem: </label><br />
			<textarea name="camp_4" id="camp_4" style="width: 100%; height: 129px; resize: none;"></textarea>
		</div>
		<div style="clear: both;">
			<input name="submit" type="submit" value="Quero ser um Personall" id="saveForm" style="background: #5ea561 none repeat scroll 0% 0%; color: #ffffff; border-radius: 3px; border: 1px solid #5d742b; padding: 5px 14px; margin-top: 20px;" />
		</div>
	</form> -->
</div>