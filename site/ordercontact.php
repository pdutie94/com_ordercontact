<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$controller = JControllerLegacy::getInstance('OrderContact');
$input = JFactory::getApplication()->input;$controller->execute($input->getCmd('task'));
$controller->redirect();