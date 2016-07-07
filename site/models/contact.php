<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class OrderContactModelContact extends JModelItem {

    /**
     * @var string message
     */
    protected $message;

    /**
     * Get the message
     *
     * @return  string  The message to be displayed to the user
     */
    public function getTable($type = 'Contact', $prefix = 'OrderContactTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }


}
