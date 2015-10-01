<?php

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

include_once 'solicitacao_header.php';

$session = JFactory::getSession();
$cnpj = $session->get('cnpj');

// Get a db connection.
$db = JFactory::getDbo();

// Create a new query object.
$query = $db->getQuery(true);
$query
    ->select($db->quoteName(array('b.name','a.personall_email','a.cargo')))
    ->from($db->quoteName('#__personall_request_link', 'a'))
    ->join('INNER', $db->quoteName('#__users', 'b') . 'ON (' . $db->quoteName('b.id') . ' = ' . $db->quoteName('a.user_id') . ')')
    ->where($db->quoteName('cnpj') . ' LIKE '. $db->quote($cnpj));
$db->setQuery($query);
$db->execute();

$num_rows = $db->getNumRows();

$results = $db->loadAssocList();

echo '<p/>&nbsp';

if ($results == NULL){
    echo 'Não há nenhuma solicitação de profissional pendente.';
}
echo '<form method="POST" action="index.php?option=com_personallgroup&task=responderSolicitacao">';
echo '<table width="100%" border="0">';
'<tr>';
    echo '<td><h4>Nome</h4></td>';
    echo '<td><h4>E-mail</h4></td>';
    echo '<td><h4>Cargo</h4></td>';

for ($i=0; $i <= ($num_rows-1); $i++)
{
    echo '<tr>';
    echo '<td>' . $results[$i]['name'] . '</td>';
    echo '<td>' . $results[$i]['personall_email'] . '</td>';
    echo '<td>' . $results[$i]['cargo'] . '</td>';
    echo '<td><input type="hidden" id="email" name="email" value="'. $results[$i]['personall_email'] .'" /></td>';
    echo '<td><input type="hidden" id="cargo" name="cargo" value="'. $results[$i]['cargo'] .'" /></td>';
    echo '<td><input type="submit" class="btn-success" value="Aceitar" /></td>';
    echo '<td><input type="submit" class="btn-danger" onClick="" value="Rejeitar" /></td>';
    echo '</tr>';
}
echo '</table>';
echo '</form>';

echo '<br/><a class="btn-default" href="index.php?option=com_personallgroup&view=paginavermelha">Voltar</a>';
