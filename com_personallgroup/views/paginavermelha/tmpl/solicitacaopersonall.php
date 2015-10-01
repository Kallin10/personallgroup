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

echo '<style type="text/css">
.btn-voltar{
	background: #5ea561 none repeat scroll 0% 0%; 
	color: #ffffff; 
	border-radius: 3px; 
	border: 1px solid #5d742b; 
	padding: 5px 14px; 
	margin: 10px 0px;}
	
.btn-voltar:hover{
	background: #63DA68;
    text-decoration: none;
	border: 1px solid #66B93B;}
	
.btn-success, .btn-danger{
	border-radius: 5px;
	border: 0px;}

.elementoTab{
	padding-bottom: 10px;
	padding-top: 10px;
	border-bottom: 1px solid black;}
	
h3{
	background-color: rgba(201, 67, 67, 0.3); 
	padding: 13px; 
	border-radius: 20px 20px 0px 0px;
	color: #fbfff9; 
	max-width: 700px; 
	margin: 20px 0px 0px;}

table{
	background-color: rgba(255, 255, 255, 0.3); 
	border-radius: 0px 0px 20px 20px;
	max-width: 700px;
	border-width: 0px 10px 10px;
	border-style: none solid solid;
	border-color: -moz-use-text-color transparent transparent;}

@media screen and (max-width: 600px) {
  .elementoTab {
    float: left;
	clear: both;
	padding: 5px 5px;
	border: 0px;}
	
  .firstElementoTab{
	margin-top: 15px;}
	
  tr {
	  border-bottom: 1px solid black;}
  
  .tab_but_rej{
	  clear: none;
	  margin-bottom: 20px;}

  .labelsTab{
  	  display: none;}
}
	  
  .div_center {
	margin: 0px auto; 
	max-width: 700px;}

	
</style>';

echo '<div class="div_center">';

if ($results == NULL){
    echo 'Não há nenhuma solicitação de profissional pendente.';
}
echo '<form method="POST" action="index.php?option=com_personallgroup&task=responderSolicitacao">';
echo '<table width="100%" border="0">';
'<tr>';
    echo '<td class="labelsTab"><h4>Nome</h4></td>';
    echo '<td class="labelsTab"><h4>E-mail</h4></td>';
    echo '<td class="labelsTab"><h4>Cargo</h4></td>';

for ($i=0; $i <= ($num_rows-1); $i++)
{
    echo '<tr>';
    echo '<td class="elementoTab firstElementoTab">' . $results[$i]['name'] . '</td>';
    echo '<td class="elementoTab">' . $results[$i]['personall_email'] . '</td>';
    echo '<td class="elementoTab">' . $results[$i]['cargo'] . '</td>';
    echo '<td class="elementoTab"><input type="hidden" id="email" name="email" value="'. $results[$i]['personall_email'] .'" /></td>';
    echo '<td class="elementoTab"><input type="hidden" id="cargo" name="cargo" value="'. $results[$i]['cargo'] .'" /></td>';
    echo '<td class="elementoTab"><input type="submit" class="btn-success" value="Aceitar" /></td>';
    echo '<td class="elementoTab tab_but_rej"><input type="submit" class="btn-danger" onClick="" value="Rejeitar" /></td>';
    echo '</tr>';
}
echo '</table>';
echo '</form>';

echo '<br/><a href="index.php?option=com_personallgroup&view=paginavermelha" style="text-decoration: none;"><input class="btn-voltar" type="button" value="Voltar" /></a>';