<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

abstract class OrderContactHelper {

    public static function addSubmenu($submenu) {
        JSubMenuHelper::addEntry(
                JText::_('Đơn hàng'), 'index.php?option=com_ordercontact', $submenu == 'ordes'
        );

        JSubMenuHelper::addEntry(
                JText::_('Liên hệ'), 'index.php?option=com_ordercontact&view=contacts', $submenu == 'contacts'
        );

    }

}
