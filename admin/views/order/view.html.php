<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class OrderContactViewOrder extends JViewLegacy {

    protected $form = null;

    public function display($tpl = null) {
        // Get the Data
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }


        // Set the toolbar
        $this->addToolBar();

        // Display the template
        parent::display($tpl);
    }

    protected function addToolBar() {
        $input = JFactory::getApplication()->input;

        // Hide Joomla Administrator Main menu
        $input->set('hidemainmenu', true);

        $isNew = ($this->item->id == 0);

        if ($isNew) {
            $title = JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLD_NEW');
        } else {
            $title = JText::_('Chi tiết đơn hàng');
        }

        JToolBarHelper::title($title, 'order');
        JToolBarHelper::save('order.save');
        JToolBarHelper::cancel(
                'order.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
        );
    }

}
