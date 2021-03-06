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

require JPATH_COMPONENT . '/helpers/confirmaempresa.php';

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by PersonallGroup
$controller = JControllerLegacy::getInstance('PersonallGroup');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();