<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// Require helper file
JLoader::register('OrderContactHelper', JPATH_COMPONENT . '/helpers/ordercontact.php');
// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('OrderContact');
 
// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task'));
 
// Redirect if set by the controller
$controller->redirect();