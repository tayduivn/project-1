@extends('layouts.index')
@section('manual')
<style>
    * {
    margin: 0;
    padding: 0;
    /* box-sizing: border-box; */
    outline: none;
    }
    .news-content {
    width: 100%;
    float: left;
    margin-top: 10px;
    }
    .css-content {
    float: left;
    width: 100%;
    font-size: 16px;
    position: relative;
    text-align: justify;
}
    .news-content-list {
       
        width: 80%;
        
    }
    .news-content-detail-title {
        width: 100%;
        float: left;
        font-size: 20px;
        line-height: 25px;
        color: #c69a39;
        margin: 0 0 10px;
        font-weight: 700;
    }
    .detail {
    width: 100%;
    float: left;
    margin: 10px 0;
    }
    .css-content div {
        line-height: 25px;
    }
    .css-content h2 {
        font: 700 20px/24px sans-serif;
        margin-bottom: 14px;
        color: #c69a39;
    }
    .css-content h3 {
        font: 700 18px/21px sans-serif;
        margin-bottom: 8px;
        color: #c69a39;
    }
    .news-rating {
        width: 100%;
        float: left;
    }
    .news-rating-star {
        float: left;
    }
    .news-rating-star i {
    float: left;
    cursor: pointer;
    font-size: 20px;
    line-height: 25px;
    margin-right: 5px;
    color: #ff9727;
    }
    .news-rating-info {
        float: left;
        font-size: 20px;
        line-height: 25px;
        margin-left: 10px;
    }
    #btn_share {
        float: left;
        word-wrap: 100%;
        margin: 10px 0;
    }
    .jssocials-share {
        display: inline-block;
        vertical-align: top;
        margin: .3em .6em .3em 0;
    }
    .jssocials-share-logo {
    width: 1em;
    vertical-align: middle;
    font-size: 1.5em;
    }
    .jssocials-shares * {
    box-sizing: border-box;
    }
    .css-content p {
    line-height: 25px;
    margin: 5px 0 15px;
    }
    .jssocials-share-label {
    padding-left: .3em;
    vertical-align: middle;
    }
   
    .fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }
    .jssocials-share-link {
        padding: .5em .6em;
        border-radius: .3em;
        color: #acacac;
        -webkit-transition: background 200ms ease-in-out,color 200ms ease-in-out,border-color 200ms ease-in-out;
        transition: background 200ms ease-in-out,color 200ms ease-in-out,border-color 200ms ease-in-out;
    }
</style>
<div class="news-content">
    <div class="news-content-list news-content-detail">
        <h1 class="news-content-detail-title">Hướng dẫn thanh toán</h1>
        <div class="detail css-content">
            <div class="news_box_summary" style="text-align: justify;margin-bottom:10px;">Để tạo điều kiện và hỗ trợ khách hàng thanh toán một cách tốt nhất, sau đây là thông tin hướng dẫn thanh toán tại UNIMART</div>
            <div class="news_box_body">
                <h2>Hướng dẫn thanh toán khi mua hàng tại Unimart</h2>
                <h3>I. Phương thức thanh toán – Giao tiền mặt</h3>
                <p>Phương thức này hỗ trợ giao hàng cho quý khách ở khu vực có phạm vi dưới 10 km hoặc mua trực tiếp tại 2 địa chỉ:</p>
            </div>
            <div class="news_box_body">
                <p><strong>Tại Hà Nội:</strong>&nbsp;120 Thái Hà, Đống Đa - Điện thoại :&nbsp;<strong>0433 120 120</strong>&nbsp;&amp;&nbsp;<strong>0969 120 120</strong></p>
                <p><strong>Tại TPHCM:</strong>&nbsp;123 Trần Quang Khải, Quận 1 - Điện thoại:&nbsp;<strong>0965 123 123</strong>&nbsp;&amp;&nbsp;<strong>0822 300 600</strong></p>
                <p>Quý khách có thể đặt hàng trực tiếp thông qua website Unimart.com hoặc gọi theo tổng đài&nbsp;(HN: 0969 120 120 - TPHCM: 0965 123 123)</p>
                <p style="text-align: justify;">Quý khách có trách nhiệm thanh toán đầy đủ toàn bộ giá trị đơn hàng cho Nhân viên giao nhận hoặc Nhân viên bán hàng, chăm sóc khách hàng của Unimart. Ngay sau khi hoàn tất việc kiểm tra hàng hóa và nhận phiếu giao hàng cũng như phiếu xuất kho. Quý khách thanh toán đúng số tiền được ghi trên Phiếu, nếu có bất cứ thắc mắc nào Quý khách gọi lại cho Unimart để được thông tin cụ thể hơn.</p>
                <h3>II. Phương thức thanh toán trước</h3>
                <p style="text-align: center;"><img class="lazy" src="https://cdn1.tnwcdn.com/wp-content/blogs.dir/1/files/2013/05/112952678-1.jpg" data-original="https://cdn1.tnwcdn.com/wp-content/blogs.dir/1/files/2013/05/112952678-1.jpg" alt="" width="700" height="266" style=""></p>
                <p>Quý khách làm theo các bước sau:</p>
                <ul>
                    <li style="text-align: justify;">1/ Đến Ngân hàng gần nhất của Quý khách để chuyển tiền/chuyển khoản theo thông tin chi tiết MobileCity cung cấp: Số tiền, Tên đơn vị, số tài khoản, Ngân hàng mở tài khoản, nội dụng chuyển tiền/chuyển khoản.</li>
                    <li style="text-align: justify;">2/ Thông báo cho Unimart (qua điện thoại, email, SMS, fax ...) ngay khi Quý khách đã thực hiện chuyển tiền/chuyển khoản.</li>
                    <li style="text-align: justify;">3/ Hoặc Quý khách vui lòng liên hệ với Bộ phận Bán hàng trực tuyến của Unimart theo số (HN: 0969 120 120 - TPHCM: 0965 123 123), để thông báo đã chuyển tiền.</li>
                    <li style="text-align: justify;">4/ Ngay khi nhận được báo cáo xác nhận từ phía Ngân hàng, Unimart sẽ tiến hành thông báo lại cho Quý khách đồng thời xuất hàng giao hàng cho Quý khách trong thời gian quy định.</li>
                </ul>
                <p><strong>Tài khoản nhận tiền áp dụng với Khách hàng Khu vực phía Bắc&nbsp;- Hotline: 0969 120 120</strong></p>
                <table style=" height: 200px;" border="1px" width="720">
                    <tbody>
                        <tr>
                            <td style="text-align: center; blackbround: #c69a39;"><strong>STT</strong></td>
                            <td style="text-align: center;"><strong>Tên ngân hàng</strong></td>
                            <td style="text-align: center;"><strong>Chi nhánh</strong></td>
                            <td style="text-align: center;"><strong>Số tài khoản</strong></td>
                            <td style="text-align: center;"><strong>Tên tài khoản&nbsp;</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>Ngân Hàng Vietcombank</td>
                            <td style="text-align: center;">Hà Nội</td>
                            <td style="text-align: center;"><strong>0021 000 828 066</strong></td>
                            <td style="text-align: center;"><strong>Đỗ Kỳ Sơn</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>Ngân Hàng Techcombank</td>
                            <td style="text-align: center;">Hà Nội</td>
                            <td style="text-align: center;"><strong>19020 8542 66669</strong></td>
                            <td style="text-align: center;"><strong>Đỗ Kỳ Sơn</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>Ngân Hàng Agribank</td>
                            <td style="text-align: center;">Hà Nội</td>
                            <td style="text-align: center;"><strong>1400 205 394 429</strong></td>
                            <td style="text-align: center;"><strong>Đỗ Kỳ Sơn</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4</td>
                            <td>Ngân Hàng VietTinBank</td>
                            <td style="text-align: center;">Hai Bà Trưng</td>
                            <td style="text-align: center;"><strong>10300 3997 355</strong></td>
                            <td style="text-align: center;"><strong>Đỗ Kỳ Sơn</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">5</td>
                            <td>Ngân hàng BIDV</td>
                            <td style="text-align: center;">Hà Nội</td>
                            <td style="text-align: center;"><strong>2611 000000 3621</strong></td>
                            <td style="text-align: center;"><strong>Đỗ Kỳ Sơn</strong></td>
                        </tr>
                    </tbody>
                </table>
                <p><strong>Tài khoản áp dụng với Khách hàng Khu vực phía Nam&nbsp;- Hotline: 0965 123 123</strong></p>
                <table style="border-collapse: collapse; height: 200px;" border="1px" width="720">
                    <tbody>
                        <tr>
                            <td style="text-align: center;"><strong>STT</strong></td>
                            <td style="text-align: center;"><strong>Tên ngân hàng</strong></td>
                            <td style="text-align: center;"><strong>Chi nhánh</strong></td>
                            <td style="text-align: center;"><strong>Số tài khoản</strong></td>
                            <td style="text-align: center;"><strong>Tên tài khoản&nbsp;</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>Ngân Hàng Vietcombank</td>
                            <td style="text-align: center;">Tân Định</td>
                            <td style="text-align: center;"><strong>0491 0000 27577&nbsp;</strong></td>
                            <td style="text-align: center;"><strong>Lê Quang Trung</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>Ngân Hàng&nbsp;Sacombank</td>
                            <td style="text-align: center;">Tân Định</td>
                            <td style="text-align: center;"><strong>0601 4484 9208</strong></td>
                            <td style="text-align: center;"><strong>Lê Quang Trung</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>Ngân Hàng Agribank</td>
                            <td style="text-align: center;">Sài Gòn</td>
                            <td style="text-align: center;"><strong>1600 2051 35197&nbsp;</strong></td>
                            <td style="text-align: center;"><strong>Lê Quang Trung</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4</td>
                            <td>Ngân Hàng&nbsp;BIDV</td>
                            <td style="text-align: center;">Sài Gòn</td>
                            <td style="text-align: center;"><strong>1691 0000 697 438</strong></td>
                            <td style="text-align: center;"><strong>Lê Quang Trung</strong></td>
                        </tr>
                    </tbody>
                </table>
                <p style="text-align: justify;"><strong><br>Xin Quý khách lưu ý:<br></strong></p>
                <ul>
                    <li style="text-align: justify;">Unimart sẽ không chịu trách nhiệm về sai sót trong quá trình chuyển khoản hoặc chuyển khoản sai thông tin.</li>
                    <li style="text-align: justify;">Quý khách hoàn toàn có thể nhờ đến phía Ngân hàng mà Quý khách thực hiện giao dịch hoặc Ngân hàng của Unimart sử dụng để kiểm tra và đối chứng khi cần thiết. &nbsp;</li>
                </ul>
                <p style="text-align: justify;">Quý khách có thể tham khảo dịch vụ giao hàng và thu tiền tận nhà của Unimart:&nbsp;<strong><a href="" target="_blank" rel="noopener noreferrer">Ship COD Unimart</a></strong></p>
            </div>
        </div>
       
        <div id="btn_share" class="jssocials">
            <div class="jssocials-shares">
                <div class="jssocials-share jssocials-share-twitter"><a target="_blank" href="" class="jssocials-share-link"><i class="fa fa-twitter jssocials-share-logo"></i><span class="jssocials-share-label">Tweet</span></a>
                    <div class="jssocials-share-count-box jssocials-share-no-count"><span class="jssocials-share-count"></span></div>
                </div>
                <div class="jssocials-share jssocials-share-facebook"><a target="_blank" href="" class="jssocials-share-link"><i class="fa fa-facebook jssocials-share-logo"></i><span class="jssocials-share-label">Facebook</span></a>
                    <div class="jssocials-share-count-box jssocials-share-no-count"><span class="jssocials-share-count"></span></div>
                </div>
                <div class="jssocials-share jssocials-share-linkedin"><a target="_blank" href="" class="jssocials-share-link"><i class="fa fa-linkedin jssocials-share-logo"></i><span class="jssocials-share-label">Share</span></a>
                    <div class="jssocials-share-count-box jssocials-share-no-count"><span class="jssocials-share-count"></span></div>
                </div>
                <div class="jssocials-share jssocials-share-pinterest"><a target="_blank" href="&amp;description=text%20to%20share" class="jssocials-share-link"><i class="fa fa-pinterest jssocials-share-logo"></i><span class="jssocials-share-label">Pin it</span></a>
                    <div class="jssocials-share-count-box jssocials-share-no-count"><span class="jssocials-share-count"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar">
    </div>
</div>
@endsection