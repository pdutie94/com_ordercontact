<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class OrderContactModelOrder extends JModelAdmin {

    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    public function getTable($type = 'Order', $prefix = 'OrderContactTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true) {
        // Get the form.
        $form = $this->loadForm(
                'com_ordercontact.order', 'order', array(
            'control' => 'jform',
            'load_data' => $loadData
                )
        );

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData() {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
                'com_ordercontact.edit.order.data', array()
        );

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

}
