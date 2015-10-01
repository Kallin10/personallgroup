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

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport( 'joomla.database.databasequery' );

/**
 * Personall Group Component Controller
 */
class PersonallGroupController extends JControllerLegacy
{	
    function iniciaRegistro()
    {
        $user = JFactory::getUser(); // instancia o usuário logado
        $jinput = JFactory::getApplication()->input;
        $session = JFactory::getSession();

        if (!$user->guest)
        {
            $empresa = $jinput->getString('txtEmpresa');
            $email = $jinput->getString('txtEmailProf');
            $session->set("empresa", $empresa);
            $session->set('emailProf', $email);
            $session->set("userID", $user->id);
            $numTipo = $jinput->get('cBoxTipoEmp');

            if ($numTipo == '1')
            {
                $resultado = PersonallGroupController::existeEmpresa($empresa);
        
                if($resultado != FALSE)
                {
                    $view = $this->getView( 'registraempregado', 'html' );
                    $view->setLayout('default');
                    $view->display();
                } else {
                    $view = $this->getView( 'personallregister', 'html' );
                    $view->setLayout('error_company_not_found');
                    $view->display();
                }
                
            } else if ($numTipo == '2'){
                $view = $this->getView( 'registraempresario', 'html' );
                $view->setLayout('default');
                $view->display();
            } /*else if ($numTipo == '3'){

            } else if ($numTipo == '4'){

            }*/ else {
                $view = $this->getView( 'personallregister', 'html' );
                $view->setLayout('error_blank');
                $view->display();
            }
        } else {
            $view = $this->getView( 'personallregister', 'html' );
            $view->setLayout('error_blank');
            $view->display();
        }
    }

    function iniciaCadEmpregado()
    {
        /*
         * Pedro "Ratto" Paixão, PersonallGroup, 2015
         * Esta função irá pesquisar pelo e-mail do chefe dentro do
         * cadastro da empresa.
         */
        
        $user = JFactory::getUser();
        $userId = $user->id;
        
        $jinput = JFactory::getApplication()->input;
        $session = JFactory::getSession();
        
        $cargo = $jinput->getString('txtCargo');
        $nomeSuperior = $jinput->getString('txtNomeSuperior');
        $emailSuperior = $jinput->getString('txtEmailSuperior');
        
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName('b.cnpj', 'a.email_profissional'))
            ->from($db->quoteName('#__personall_link', 'a'))
            ->join('INNER', $db->quoteName('#__personall_empresa', 'b') . 'ON (' . $db->quoteName('b.cnpj') . ' = ' . $db->quoteName('a.cnpj') . ')')
            ->where($db->quoteName('a.email_profissional') . ' LIKE '. $db->quote($emailSuperior));
        $db->setQuery($query);
        $db->execute();
        
        $result = $db->loadResult();
        $cnpj = $result;  // tem que retornar apenas um valor;
        
        if ($cnpj != NULL)
        {
            $currentTime = new JDate('now'); // Current date and time
            $data = $currentTime;
            
            $email = $session->get('emailProf');
            
            // Get a db connection.
            $db = JFactory::getDbo();

            // Create a new query object.
            $query = $db->getQuery(true);

            // Insert columns.
            $columns = array('user_id', 'personall_email', 'superior_email', 'cnpj', 'req_date', 'cargo');

            // Insert values.
            $values = array($db->quote($userId), $db->quote($email), $db->quote($emailSuperior), $db->quote($cnpj), $db->quote($data), $db->quote($cargo));

            // Prepare the insert query.
            $query
                ->insert($db->quoteName('#__personall_request_link'))
                ->columns($db->quoteName($columns))
                ->values(implode(',', $values));

            // Set the query using our newly populated query object and execute it.
            $db->setQuery($query);
            $db->execute();
            
            // chama a view de sucesso;
            $view = $this->getView( 'registraempregado', 'html' );
            $view->setLayout('regsucesso');
            $view->display();
        
        } else {
            echo "Chefe não encontrado.";
        }
    }
    
    function existeEmpresa($empresa)
    {
        /*
         * Sistema que pesquisa se a empresa existe no cadastro.
         */
        
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName('nome'))
            ->from($db->quoteName('#__personall_empresa'))
            ->where($db->quoteName('nome') . ' LIKE '. $db->quote($empresa));
        $db->setQuery($query);
        $db->execute();
        
        $result = $db->loadObjectList();
        if ($result != NULL)
        {
            return true; // Retorna verdadeiro se o achar uma empresa com o mesmo nome
        } else {
            return false; // Retorna falso se não achar o nome da empresa
        }
    }
    
    function pesquisaEmpresa($empresa)
    {
        /*
         * Sistema que procura empresas no cadastro.
         */
        
        
        
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName('nome'))
            ->from($db->quoteName('#__personall_empresa'))
            ->where($db->quoteName('nome') . ' LIKE '. $db->quote($empresa));
        $db->setQuery($query);
        $db->execute();
        
        $result = $db->loadObjectList();
        if ($result != NULL)
        {
            return true;
        } else {
            return false;
        }
    }
    
    function enviaEmailConvite()
    {
        /*
         * Programa que checa se o e-mail está na lista de banidos
         * e, se não estiver, enviará o convite.
         */
        
        $jinput = JFactory::getApplication()->input; 
        $session = JFactory::getSession();
        $email = $jinput->getString('txtEmailSuperior');
        $nome = $jinput->getString('txtNomeSuperior');
        
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName('email'))
            ->from($db->quoteName('#__personall_ban'))
            ->where($db->quoteName('email') . ' LIKE '. $db->quote($email));
        $db->setQuery($query);
        $db->execute();
        
        $result = $db->loadObjectList();
        
        if ($result != NULL)
        {
            $session->set('nomeSuperior', $nome);
            $session->set('emailSuperior', $email);
            
            $view = $this->getView( 'enviaEmail', 'html' );
            $view->setLayout('default');
            $view->display();
        } else {
            $session->set('nomeSuperior', $nome);
            $session->set('emailSuperior', $email);
            
            $view = $this->getView( 'enviaemail', 'html' );
            $view->setLayout('default');
            $view->display();
        }
    }
    
    function pegaDados($empresa)
    {
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName('cnpj'))
            ->from($db->quoteName('#__personall_empresa'))
            ->where($db->quoteName('empresa') . ' LIKE '. $db->quote($empresa));
        $db->setQuery($query);
        $db->execute();
        
        $result = $db->loadObjectList();
    }
    
    function confirmaPersonall()
    {
        
    }
    
    function registraEmpresario()
    {
        /*
         * Pedro "Ratto" Paixão (pedro.ratto@personallgroup.com)
         * Personallgroup, 2015
         * PersonallGroup
         * Função para validar e iniciar o cadastramento de empresas
         */
        
        $jinput = JFactory::getApplication()->input;
        $session = JFactory::getSession();
        
        $cnpj = $jinput->getString('txtCnpj');
        $setor = $jinput->getString('txtSetor');
        $produto = $jinput->getString('txtProduto');
        
        $session->set('setor', $setor);
        $session->set('produto', $produto);
        $session->set('cnpj', $cnpj);
        
        $cnpj_valido = PersonallGroupController::validaCnpj($cnpj);
        if ($cnpj_valido != TRUE)
        {
            $view = $this->getView( 'registraEmpresario', 'html' );
            $view->setLayout('error_cnpj_inv');
            $view->display();
        } else {
            $cnpj = preg_replace('/[^0-9]/', '', $session->get('cnpj'));
            $empresa_valida = PersonallGroupController::existeCnpj($cnpj);
            if ($empresa_valida != False)
            {
                $view = $this->getView( 'registraEmpresario', 'html' );
                $view->setLayout('error_empresa_cad');
                $view->display();
            } else {
                // termina o cadastramento de Empresário e Empresa.
                PersonallGroupController::terminaRegistroEmpresa($cnpj);
            }
        }
    }
    
    function existeCnpj($cnpj)
    {
        /*
         * Função que pesquisa se o CNPJ já foi cadastrado.
         */
        
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName('cnpj'))
            ->from($db->quoteName('#__personall_empresa'))
            ->where($db->quoteName('cnpj') . ' LIKE '. $db->quote($cnpj));
        $db->setQuery($query);
        $db->execute();
        
        $result = $db->loadObjectList();
        
        if ($result != NULL)
        {
            return TRUE; // achou uma empresa cadastrada
        } else {
            return FALSE; // não achou uma empresa cadastrada
        }
    }
    
    function validaCnpj($cnpj)
    {
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
        
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }
    
    function terminaRegistroEmpresa($cnpj)
    {
        /*
         * Pedro "Ratto" Paixão, PersonallGroup, 2015
         * Esta função termina o registro de uma nova Empresa
         * e inicia o vínculo entre o dono da Empresa e a Empresa.
         */
        
        $session = JFactory::getSession();
        $nomeEmpresa = $session->get('empresa');
        $ownerID = $session->get('userID');
        $setor = $session->get('setor');
        $produto = $session->get('produto');
        
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        
        // Insert columns.
        $columns = array('cnpj', 'nome', 'owner_id', 'setor', 'produto');

        // Insert values.
        $values = array($db->quote($cnpj), $db->quote($nomeEmpresa), $db->quote((int)$ownerID), $db->quote($setor), $db->quote($produto));

        // Prepare the insert query.
        $query
            ->insert($db->quoteName('#__personall_empresa'))
            ->columns($db->quoteName($columns))
            ->values(implode(',', $values));

        // Set the query using our newly populated query object and execute it.
        $db->setQuery($query);
        $db->execute();
        
        PersonallGroupController::terminaRegistroEmpresario($ownerID, $cnpj);
        
    }
    
    function terminaRegistroEmpresario($id, $cnpj)
    {
        /*
         * Pedro "Ratto" Paixão, PersonallGroup, 2015
         * Esta função grava o vínculo entre o dono da
         * Empresa e a própria empresa cadastrada.
         */
        
        $currentTime = new JDate('now'); // Current date and time
        
        $session = JFactory::getSession();
        
        $emailProfissional = $session->get('emailProf');
        $cargo = "dono";
        $start_date = $currentTime;
        
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        
        // Insert columns.
        $columns = array('user_id','email_profissional','cargo', 'cnpj', 
            'start_date', 'stop_date', 'status', 'approver_id');

        // Insert values.
        $values = array($db->quote((int)$id), $db->quote($emailProfissional), 
            $db->quote('dono'), $db->quote($cnpj), $db->quote($start_date),
            $db->quote(NULL), $db->quote('aprovado'), $db->quote((int)$id));

        // Prepare the insert query.
        $query
            ->insert($db->quoteName('#__personall_link'))
            ->columns($db->quoteName($columns))
            ->values(implode(',', $values));

        // Set the query using our newly populated query object and execute it.
        $db->setQuery($query);
        $db->execute();
        
        PersonallGroupController::adicionaGrupoEmpresario($id);
    }
    
    function adicionaGrupoEmpresario($id)
    {
        /*
         * Pedro "Ratto" Paixão, PersonallGroup, 2015
         * Função criada para adicionar o empresário nos grupos
         * Personall (permitindo acesso às páginas verdes), Conteudista
         * (permitindo acesso às páginas vermelhas) e Empresario
         *  (permitindo o acesso à administração de uma empresa.
         */
        jimport( 'joomla.user.helper' );
        
        JUserHelper::addUserToGroup((int)$id, 12);
        JUserHelper::addUserToGroup((int)$id, 11);
        JUserHelper::addUserToGroup((int)$id, 10);
        
        $view = $this->getView( 'registraempresario', 'html' );
        $view->setLayout('regsucesso');
        $view->display();
    }
    
    function adicionaGrupoPersonall($id)
    {
        /*
         * Pedro "Ratto" Paixão, PersonallGroup, 2015
         * Função criada para adicionar o empresário nos grupos
         * Personall (permitindo acesso às páginas verdes), Conteudista
         * (permitindo acesso às páginas vermelhas) e Empresario
         *  (permitindo o acesso à administração de uma empresa.
         */
        jimport( 'joomla.user.helper' );
        
        JUserHelper::addUserToGroup((int)$id, 10);
        
    }
    
    function adicionaGrupoConteudista($id)
    {
        /*
         * Pedro "Ratto" Paixão, PersonallGroup, 2015
         * Função criada para adicionar o empresário nos grupos
         * Personall (permitindo acesso às páginas verdes), Conteudista
         * (permitindo acesso às páginas vermelhas) e Empresario
         *  (permitindo o acesso à administração de uma empresa.
         */
        jimport( 'joomla.user.helper' );
        
        JUserHelper::addUserToGroup((int)$id, 11);
        
    }
    
    function gerenciaMeusPersonalls()
    {   
        $user = JFactory::getUser();
        $id = $user->id;
        
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName('cnpj'))
            ->from($db->quoteName('#__personall_empresa'))
            ->where($db->quoteName('owner_id') . ' LIKE '. $db->quote($id));
        $db->setQuery($query);
        $db->execute();
        
        $result = $db->loadResult();
        $cnpj = $result;  // tem que retornar apenas um valor;
        
        if($cnpj != NULL)
        {
            // O sistema achou o CNPJ e confirma que este é o dono
            $session = JFactory::getSession();
            $session->set('cnpj', $cnpj);
            
            $view = $this->getView( 'paginavermelha', 'html' );
            $view->setLayout('solicitacaopersonall');
            $view->display();
        } else {
            $view = $this->getView( 'paginavermelha', 'html' );
            $view->setLayout('error_auth');
            $view->display();
        }
    }

}

function responderSolicitacao()
{
    $session = JFactory::getSession();
    $currentTime = new JDate('now'); // Current date and time
    
    $user = JFactory::getApplication()->input;
    $uid = $user->id;
    
    $email = JRequest::getVar('email','post', 'string');
    $cargo = JRequest::getVar('cargo','post', 'string');
    
    // Get a db connection.
    $db = JFactory::getDbo();

    // Create a new query object.
    $query = $db->getQuery(true);
    
    // Create a new query object.
    $query = $db->getQuery(true);
    $query
        ->select($db->quoteName('user_id'))
        ->from($db->quoteName('#__personall_request_link'))
        ->where($db->quoteName('personall_email') . ' LIKE '. $db->quote($email));
    $db->setQuery($query);
    $db->execute();
    
    $result = $db->loadObject();
    
    $userId = $result;
    $cnpj = $session->get('cnpj');

    // Insert columns.
    $columns = array('user_id','email_profissional','cargo', 'cnpj', 
        'start_date', 'stop_date', 'status', 'approver_id');

    // Insert values.
    $values = array($db->quote((int)$userId), $db->quote($email), 
        $db->quote($cargo), $db->quote($cnpj), $db->quote($currentTime),
        $db->quote(NULL), $db->quote('aprovado'), $db->quote((int)$uid));

    // Prepare the insert query.
    $query
        ->insert($db->quoteName('#__personall_link'))
        ->columns($db->quoteName($columns))
        ->values(implode(',', $values));

    // Set the query using our newly populated query object and execute it.
    $db->setQuery($query);
    $db->execute();
    
    if (!$db->execute())
    {
        $view = $this->getView( 'paginavermelha', 'html' );
        $view->setLayout('error_auth');
        $view->display();
    }
    
    $view = $this->getView( 'paginavermelha', 'html' );
    $view->setLayout('solicitacaopersonall');
    $view->display();
}