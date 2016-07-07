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
<div class="contact" itemscope="" itemtype="http://schema.org/Person">

    <div class="page-header">
        <h2>
            <span class="contact-name" itemprop="name">Hỏi Đáp - Thanh Toán</span>
        </h2>
        <span class="form-desc">Quý khách hàng có nhu cầu tư vấn và mua sản phẩm xin vui lòng liên hệ với chúng tôi</span>
    </div>
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

    <div class="page-header"><h2><span>hướng dẫn mua hàng bằng phương thức c.o.d <br>( nhận hàng và thanh toán tại nhà )</span></h2></div>
    <div class="checkout clearfix">
        <div class="checkout-tutorial">
            <div class="step step1 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="step-content">
                    <p>1/ Quý khách đặt đơn hàng qua website www.cncvietduc.com, hoặc gọi điện để đặt hàng.</p>
                </div>
            </div>
            <div class="step step2 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="step-content">
                    <img src="<?php echo JUri::root() . 'images/hand-right.png' ?>" alt=""/>
                    <p>2/  Nhân viên cncvietduc.com sẽ tiếp nhận đơn hàng trên hệ thống website và tiến hành gọi điện thoại cho quý khách để xác nhận đơn hàng bao gồm tổng giá trị đơn hàng, chi phí vận chuyển mà khách hàng phải thanh toán.</p>
                </div>
            </div>
            <div class="step step4 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="step-content">
                    <img src="<?php echo JUri::root() . 'images/hand-left.png' ?>" alt=""/>
                    <p>4/  Qúy khách hàng nhận sản phẩm tại nhà và thanh toán trực tiếp cho nhân viên bưu chính. Hoàn thành đơn hàng</p>
                </div>
            </div>
            <div class="step step3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="step-content">
                    <img src="<?php echo JUri::root() . 'images/hand-down.png' ?>" alt=""/>
                    <p>3/  Nhân viên cncvietduc.com sẽ tiến hành đòng gói sản phẩm và mang ra bưu chính tiến hành chuyển hàng và cập nhật mã vận đơn lên hệ thống cho khách hàng ( Khách hàng có thể kiểm tra thông tin chuyển phát của hệ thống website).</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="contact-title2"><span>Cùng tìm hiểu về dịch vụ và những quy định được áp dụng khi dùng phương thức chuyển hàng COD ( giao hàng thu tiền tận nơi )</span></h2>
    <div class="shipment-method">
        <p>
            <span>a - Chuyển tiền COD là gì ?</span><br/><br/>
            Trả lời : Dịch vụ phát hàng thu tiền COD là một loại hình dịch vụ mới mà người gửi có thể để ủy thác cho nhân viên bưu điện  thu hộ một khoản tiền của người nhận khi phát bưu gửi là hàng hóa và chuyển trả khoản tiền đó cho người gửi.<br/><br/>
            Những ưu điểm và nhược điểm khi sử dụng dịch vụ COD (Giao hàng và thu tiền tận nơi ): <br/><br/>
            <i>- Ưu điểm</i> : Khách hàng sẽ hoàn toàn tin tưởng vì chỉ khi khách hàng nhận được hàng . Khách hàng mới phải thanh toán tiền cho nhân viên bưu chính . Chánh tối đa lừa đảo trực tuyến hạn chế 100% rủi ro cho khách hàng . <br/><br/>    
            <i>- Nhược điểm</i> : Đơn hàng của quý khách đôi khi sẽ bị gửi chậm hơn là những đơn hàng gửi chuyển phát nhanh thông thường .Và có những khách hàng đặt hàng dịch vụ này nhưng hoàn toàn không có ý địch lấy hàng . Dẫn đến người gửi bị tổn thất phí gửi hàng + COd + phí hàng quay trở lại . ( chính vì vậy chúng tôi có chính sách riêng cho vấn đề gửi hàng COD mong quý khách thông cảm ) .<br/><br/>
            Chi phí : Ngoài chi phí gửi hàng quý khách sẽ phải gửi thêm tiền thanh toán dịch vụ cod ( thấp nhất 25000 Đồng ) cho một đơn hàng . <br/><br/>
            <span>b - Các chính sách áp dụng của chúng tôi khi quý khách tham da dịch vụ gửi hàng COD .</span> <br/><br/>
            Do những rủi ro khi gửi hàng cho quý khách chúng tôi đã gặp phải . Có những trường hợp khách hàng đặt hàng và sử dụng dịch vụ cod nhưng khi nhân viên bưu điện gọi điện để lấy hàng và thanh toán thì khách hàng đó không nghe máy cũng như không lấy sản phẩm . Sau một tuần sản phẩm đó bắt buộc gửi trả lại cho người gửi . Khi đó người thiệt hại là chúng tôi vì chúng tôi phải thanh toán tiền gửi chuyển phát nhanh + phí gửi COD + tiền hàng quay trở lại . Gây thiệt hại rất lớn cho chúng tôi . Chính vì vậy chúng tôi có những chính sách cho những khách hàng lần đầu mua sản phẩm trên website của chúng tôi . Mọi sự phiền nhiễu mong quý khách thông cảm . <br/><br/>
            <span>1 - Với quý khách lần dầu sử dụng dịch vụ cod và mua hàng lần dầu trên website chúng tôi  ( Chỉ áp dụng cho quý khách hàng mua hàng lần đầu tiên ).</span> <br/><br/>
            Quý khách vui lòng thanh toán phí gửi hàng + phí gửi cod của đơn hàng cho chúng tôi bằng các phương thức chuyển khoản hay sử dụng thẻ nạp điện thoại để thanh toán ( Chỉ nhận thẻ viettel - Mobile - Và vinaphone  ).<br/><br/>
            Ví dụ khi quý khách mua đơn hàng hết 550 .000 Đ ( 5 trăm năm mươi  ngàn đồng ) có phí gửi COD + phí gửi hàng là 50.000 Đồng . Quý khách sẽ phải chuyển khoản trước cho chúng tôi là 50 .000 Đồng qua phương thức chuyển khoản qua ngân hàng - Hoặc cào thẻ nạp điện thoại . <br/><br/>
            Số tiền còn lại của đơn hàng là 500.000 ( Năm trăm ngàn đồng ) quý khách sẽ thanh toán cho nhân viên bưu chính khi quý khách nhận được sản phẩm trên tay . <br/><br/>
            <span>2- Với những  quý khách đã từng mua hàng trên website chúng tôi và sử dụng dịch vụ cod lần thứ 2.</span><br/><br/>
            Quý khách sẽ không phải thanh toán trước bất kỳ khoản tiền nào . Chúng tôi sẽ nhận đơn hàng của quý khách sau đó xác nhận đơn hàng qua điện thoại và tiến hành đóng gửi chuyển hàng cho quý khách một cách sớm nhất . 
        </p>
    </div>

    <div class="page-header testi-title">
        <h2>
            <span>ý kiến khách hàng</span>
        </h2>
        <span class="form-desc">
            Cảm ơn quý khách hàng đã tin tưởng và lựa chọn CNC Việt Đức là đơn vị sản xuất TPCN chăm sóc sức khỏe chất lượng cao tại Việt Nam.<br/>
            Dưới đây là một số đánh giá và thông tin phản hồi từ khách hàng của chúng tôi.
        </span>
    </div>
    <div class="testimonials">
        <div class="testi testi-item col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="testi-content">
                <img src="<?php echo JUri::root() . 'images/testi1.png' ?>" alt=""/>
                <p>Chị Hoa<br/>
                    Thanh Xuân, Hà Nội<br/>
                    Mình đang cảm thấy rất hài lòng sau 2 tháng sử dụng dòng sản phẩm Collagen của Nhật Bản. Da mình trắng sáng và mịn màng lên trông thấy, thật không thể tin được</p>
            </div>
        </div>
        <div class="testi testi-item col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="testi-content">
                <img src="<?php echo JUri::root() . 'images/testi2.png' ?>" alt=""/>
                <p>Chị Loan Minh<br/>
                    Cổ Nhuế - Từ Liêm<br/>
                    Thật là tuyệt vời, tôi đã giảm được 3kg sau 1 tháng sử dụng Lishou. TPCN không gây tác dụng phụ. Từ khi dùng Lishou, tôi cảm thấy mình tự tin hơn .</p>
            </div>
        </div>
        <div class="testi testi-item col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="testi-content">
                <img src="<?php echo JUri::root() . 'images/testi3.png' ?>" alt=""/>
                <p>Mr Thắng<br/>
                    Hà Nội<br/>
                    Tôi rất tin tưởng và lựa chọn CNC Việt Đức là đơn vị cung cấp dòng sản phẩm giảm cân chính hãng New Lishou. TPCN với thành phần thảo dược là chính nên cảm thấy rất an tâm khi sử dụng. sau 2 tháng dùng sản phẩm, tôi dã giảm được 6 cân .</p>
            </div>
        </div>
        <div class="testi testi-item col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="testi-content">
                <img src="<?php echo JUri::root() . 'images/testi4.png' ?>" alt=""/>
                <p>Chị Hoa<br/>
                    Thanh Xuân, Hà Nội<br/>
                    Khi sử dụng các sản phẩm của công ty mình rất hài lòng và an tâm về chất lượng cũng như sự nhiệt tình của công ty. Sau một thời gian sử dụng sản phẩm, tôi đã thấy rất hiệu quả.</p>
            </div>
        </div>
    </div>
</div>