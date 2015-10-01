<?php

/* 
 * Copyright (C) 2015 PedroRatto
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
$nomeEmpresa = $session->get('empresa');

?>

<div style="margin: 0px auto; max-width: 700px;">
    <h4 style="background-color: rgba(67, 201, 67, 0.3); padding: 13px; border-radius: 20px; color: #fbfff9; max-width: 700px; margin: 15px;">
        Desculpe, mas não achamos a empresa <?php echo $nomeEmpresa; ?> que você procura.
        Tente enviar um e-mail para o seu chefe. <br />
        Assim que sua empresa estiver cadastrada, você poderá fazer uso de
        todos os privilégios em ser um Personall.
    </h4>
    <form class="prof_extraopt2" method="post" action="index.php?option=com_personallgroup&task=enviaEmailConvite">

        <label for="txtNomeSuperior" class="description">Qual o nome de seu chefe?</label><br />
            <input name="txtNomeSuperior" type="text" value="" id="txtNomeSuperiorSuperior"/><br />

        <label for="txtEmailSuperior" class="description">Qual o e-mail de seu chefe?</label><br />
            <input name="txtEmailSuperior" type="text" value="" id="txtEmailSuperior"/><br />

    <input type="submit" value="Próximo" />
    </form>
</div>