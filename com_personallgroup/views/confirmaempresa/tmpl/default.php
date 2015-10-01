<?php

/*
 * view confirma Empresa padrão
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


$session = JFactory::getSession();

?>

<div id="teste" style="margin: 0px auto; max-width: 700px;">
	<h4 style="background-color: rgba(67, 201, 67, 0.3);  padding: 13px 13px 30px 13px; border-radius: 20px; color: #fbfff9; max-width: 700px; margin: 15px;"> 
		<br /> Pedido para cadastro para a empresa <?php echo $this->nome; ?> feita por
                <?php echo $this->id; ?>.
	</h4>
    <br />
</div>