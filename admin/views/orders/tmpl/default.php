<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('_JEXEC') or die('Restricted Access');
JHtml::_('formbehavior.chosen', 'select');
$listOrder = $this->escape($this->filter_order);
$listDirn = $this->escape($this->filter_order_Dir);
?> 
<form action="index.php?option=com_ordercontact&view=orders" method="post" id="adminForm" name="adminForm">
    <div class="row-fluid">
        <div class="span12">						
            <?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>		
        </div>	
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th width="2%">
                    <?php echo JHtml::_('grid.checkall'); ?>
                </th>
                <th width="5%">
                    <?php echo JText::_('Mã đơn hàng'); ?>
                </th>
                <th width="5%">
                    <?php echo JHtml::_('grid.sort', 'Người đặt hàng', 'fullname', $listDirn, $listOrder); ?>
                </th>
                <th width="5%">
                    <?php echo JText::_('Email'); ?>
                </th>
                <th width="5%">
                    <?php echo JHtml::_('grid.sort', 'Ngày đặt hàng', 'date_time', $listDirn, $listOrder); ?>
                </th>
                <th width="5%">
                    <?php echo JHtml::_('grid.sort', 'Tình trạng đơn hàng', 'status', $listDirn, $listOrder); ?>
                </th>
                <th width="2%">
                    <?php echo JHtml::_('grid.sort', 'ID', 'id', $listDirn, $listOrder); ?>
                </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="7">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php if (!empty($this->items)) : ?>
                <?php foreach ($this->items as $i => $row) : ?>
                    <?php $link = JRoute::_('index.php?option=com_ordercontact&task=order.edit&id=' . $row->id); ?>
                    <tr>
                        <td>
                            <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                        </td>
                        <td>
                            <a href="<?php echo $link; ?>" title="<?php echo JText::_('Sửa đơn hàng ') . $row->order_number; ?>">
                                <?php echo $row->order_number; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $row->fullname; ?>
                        </td>
                        <td>
                            <?php echo $row->email; ?>
                        </td>
                        <td>
                            <?php echo $row->date_time; ?>
                        </td>
                        <td>
                            <?php
                            if ($row->status == '0') {
                                echo JText::_('Đang chờ');
                            } else if ($row->status == '1') {
                                echo JText::_('Đã xác nhận');
                            } else if ($row->status == '2') {
                                echo JText::_('Đã giao hàng');
                            } else if ($row->status == '3') {
                                echo JText::_('Đã xong');
                            } else {
                                echo JText::_('Đã hủy');
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php echo $row->id; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>	
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>