<?php 

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="<?php echo JRoute::_('index.php?option=com_ordercontact&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm">
	<div class="form-horizontal">
        <?php foreach ($this->form->getFieldsets() as $name => $fieldset): ?>
        <fieldset class="adminform">
            <legend><?php echo JText::_($fieldset->label); ?></legend>
            <div class="row-fluid">
                <div class="span12">
                    <?php foreach ($this->form->getFieldset($name) as $field): ?>
                        <div class="control-group">
                            <div class="control-label"><?php echo $field->label; ?></div>
                            <div class="controls"><?php echo $field->input; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </fieldset>
        <?php endforeach; ?>
    </div>
    <input type="hidden" name="task" value="order.edit" />
    <?php echo JHtml::_('form.token'); ?>
</form>