@extends("layout")
@section("content")
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Contact</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Contact Main Page Area -->
<div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
    <div class="container mb-60">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.097408129727!2d105.80036741542362!3d21.06877139178588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aadcdc58b3cf%3A0x2d0be06900a61434!2zQ2h1bmcgQ8awIEtPU01PIFTDonkgSOG7kw!5e0!3m2!1sen!2s!4v1623697205609!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">Liên hệ chúng tôi:</h3>
                    <p class="contact-page-message mb-25">Thái Bình là một tỉnh ven biển ở đồng bằng sông Hồng. Theo quy hoạch phát triển kinh tế, Thái Bình thuộc vùng duyên hải Bắc Bộ .</p>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Địa chỉ</h4>
                        <p>1 đường Xuân Đỉnh, quận Bắc Từ Liêm, thành phố Hà Nội</p>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> SĐT </h4>
                        <p>Mobile: (+84) 037 210 5792</p>
                        <p>Hotline: 084 286 2226</p>
                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <p>thoigian5792@gmail.com</p>
                        <p>support@hastech.company</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content pt-sm-55 pt-xs-55">
                    <h3 class="contact-page-title">Bạn muốn nhắn nhở điều gì?</h3>
                    <div class="contact-form">
                        <form id="contact-form" action="" method="post">
                            <div class="form-group">
                                <label>Your Name <span class="required">*</span></label>
                                <input type="text" name="customerName" id="customername" required>
                            </div>
                            <div class="form-group">
                                <label>Your Email <span class="required">*</span></label>
                                <input type="email" name="customerEmail" id="customerEmail" required>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="contactSubject" id="contactSubject">
                            </div>
                            <div class="form-group mb-30">
                                <label>Your Message</label>
                                <textarea name="contactMessage" id="contactMessage" ></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="submit" id="submit" class="li-btn-3" name="submit">Gửi</button>
                            </div>
                        </form>
                    </div>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
