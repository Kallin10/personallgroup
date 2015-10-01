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

class personallreqHelper
{
    private $id;
    private $user_id;
    protected $empresa;
    public $personall_email;
    public $superior_email;
    private $cargo;
    
    public function getId() {
        return $this->id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function getPersonall_email() {
        return $this->personall_email;
    }

    public function getSuperior_email() {
        return $this->superior_email;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    public function setPersonall_email($personall_email) {
        $this->personall_email = $personall_email;
    }

    public function setSuperior_email($superior_email) {
        $this->superior_email = $superior_email;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }
    
}