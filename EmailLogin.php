<?php

if (!defined('TL_ROOT'))
    die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Christopher Bölter 2012
 * @author     Christopher Bölter <http://www.cogizz.de>
 * @package    EmailLogin
 * @license    LGPL
 */

/**
 * Class EmailLogin
 */
class EmailLogin extends Frontend {
    
    /**
     * call the constructor
     */
    public function __construct() {
        return parent::__construct();
    }

    /**
     * get the username that matches to the email adress
     */
    public function getUsernameByEmail($strUsername, $strPassword, $strTable) 
    {
        if(strpos($strUsername, '@') !== false)
        {
            $objUser = $this->Database->prepare('SELECT username FROM '.$strTable.' WHERE email=?')->limit(1)->execute($strUsername);
            
            if($objUser->numRows)
            {
                $this->Input->setPost('username', $objUser->username);
                return true;
            }
        }
    }   

}

?>
