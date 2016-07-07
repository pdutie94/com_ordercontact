<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldOrderContact extends JFormFieldList {

    protected $type = 'ordercontact';

    protected function getOptions() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('id,fullname');
        $query->from('#__product_order');
        $db->setQuery((string) $query);
        $messages = $db->loadObjectList();
        $options = array();

        if ($messages) {
            foreach ($messages as $message) {
                $options[] = JHtml::_('select.option', $message->id, $message->fullname);
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }

}
