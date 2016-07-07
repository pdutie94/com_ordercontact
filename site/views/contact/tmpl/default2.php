<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('_JEXEC') or die('Restricted access');

function saveData($name, $phone, $email, $title, $message) {
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $query = "INSERT INTO `#__user_contact`(`fullname`,`phone`,`email`,`title`,`message`,`published`) VALUES ('$name','$phone','$email','$title','$message','0')";
    $db->setQuery($query);
    if ($db->execute()) {
        return true;
    } else {
        return false;
    }
}

$error = '';
$error2 = '';
if (isset($_POST['contactform_btn'])) {
    $input = JFactory::getApplication()->input;
    if ($_POST['fullname'] == NULL || $_POST['phone_number'] == NULL || $_POST['user_email'] == NULL || $_POST['title'] == NULL || $_POST['message'] == NULL) {
        $error = '<div class="alert alert-error">
            <div class="alert-message-error">Bạn chưa điền đầy đủ thông tin</div>
            </div>';
    } else {
        if (!is_numeric($_POST['phone_number']) || (strlen($_POST['phone_number']) < 10 || strlen($_POST['phone_number']) > 11)) {
            $error2 = "Số điện thoại chưa đúng!";
        } else {
            $name = $input->get('fullname', '', 'STRING');
            $phone = $input->get('phone_number');
            $email = $input->get('user_email');
            $title = $input->get('title', '', 'STRING');
            $message = $input->get('message', '', 'STRING');
            saveData($name, $phone, $email, $title, $message);
            $error = '<div class="alert alert-success">
                                <div class="alert-message">Gửi thành công</div>
                                </div>';
        }
    }
}
?>
<?php echo $error; ?>
<?php echo $error2; ?>
<div class="contact contact2" itemscope="" itemtype="http://schema.org/Person">

    <div class="page-header">
        <h2>
            <span class="contact-name" itemprop="name">liên hệ với chúng tôi</span>
        </h2>
        <span class="form-desc">Cam kết bởi hơn 500 khách hàng đã tin tưởng lựa chọn CNC là đơn vị tư vấn và cung cấp dòng TPCN chăm sóc sức khỏe chất lượng cao.<br />Hãy liên hệ ngay với chúng tôi hôm nay để được tư vấn miễn phí và cung cấp hàng chính hãng giá rẻ nhất.</span>
    </div>
    <div class="company-info-block">
        <div class="company-info">
            <ul>
                <li>Miền bắc:</li>
                <li>Địa chỉ:   Số 51 Nguyễn Xiển, Thanh Xuân, Hà Nội, Việt Nam</li>
                <li>Tel:   04.2211 0983</li>
                <li>Website:  www.cncvietduc.com</li>
                <li>Email:  cncvietduc@gmail.com</li>
            </ul>
        </div>
        <div class="company-info">
            <ul>
                <li>Miền nam:</li>
                <li>Địa chỉ:  23/31 Nguyễn Văn Công, P3, Q. Gò Vấp, TP. HCM</li>
                <li>Tel:   090.487.6331</li>
                <li>Website:  www.cncvietduc.com</li>
                <li>Email:  cncvietduc@gmail.com</li>
            </ul>
        </div>
    </div>
    <div class="google-maps">
        <img src="<?php echo JUri::root() . 'images/top-map.png' ?>" alt="" />
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0921164683164!2d105.80264361493192!3d20.988944286020054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acbffa1027d1%3A0x9d46110ac0cec49e!2zNTEgTmd1eeG7hW4gWGnhu4NuLCBUaGFuaCBYdcOibiBOYW0sIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1467825141154" style="width: 100%;height: 356px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <div class="page-header form2"><h2><span>Quý khách hàng có nhu cầu tư vấn và mua sản phẩm<br /> xin vui lòng liên hệ theo form dưới đây.</span></h2></div>
    <div class="contact-form">
        <div class="row">
            <form action="" name="quick_contact" id="contact_form" method="post">
                <div class="contact-form-left col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <input name="fullname" class="form-control" id="fullname" placeholder="Tên của bạn" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="user_email" name="user_email" placeholder="Địa chỉ Email" type="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="phone_number" name="phone_number" placeholder="Số điện thoại" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="title" name="title" placeholder="Tiêu đề" type="text">
                    </div>
                </div>
                <div class="contact-form-right col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <textarea class="form-control" rows="8" name="message" id="message" placeholder="Nội dung câu hỏi"></textarea>
                    </div>
                    <button type="submit" name="contactform_btn" id="contactform_btn" class="btn btn-default">Gửi đi</button>
                </div>

            </form>
        </div>

    </div>
</div>