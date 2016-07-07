<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class OrderContactViewContacts extends JViewLegacy {

    function display($tpl = null) {
        // Get application
        $app = JFactory::getApplication();
        $context = "contact.list.admin.contact";
        // Get data from the model
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        
        $this->state = $this->get('State');
        $this->filter_order = $app->getUserStateFromRequest($context . 'filter_order', 'filter_order', 'fullname', 'cmd');
        $this->filter_order_Dir = $app->getUserStateFromRequest($context . 'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }

        OrderContactHelper::addSubmenu('orders');
        // Set the toolbar
        $this->addToolBar();
        // Display the template
        parent::display($tpl);
    }

    protected function addToolBar() {
        $title = JText::_('Danh sách liên hệ');
        if ($this->pagination->total) {
            $title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
        }
        JToolBarHelper::title($title, 'contact');
        JToolBarHelper::editList('contact.edit');
        JToolBarHelper::deleteList('', 'contacts.delete');
    }

}
