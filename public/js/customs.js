$(document).ready(function() { //lấy giá tiền qua ajax
    $(".num-order").change(function() {
        var product_id = $(this).attr('data-id'); //lấy giá trị thuộc tính data-id

        var num_order = $(this).val(); //lấy giá trị phần tử
        //alert(product_id);
        var data = { product_id: product_id, num_order: num_order }; //chuỗi json js=php
        // /////toàn bộ bên trên xử lý thay đổi số lượng 
        // // alert(product_id);
        // $.ajax({
        //     url: '?mod=users&action=ajax', //nơi xử lý code php
        //     method: 'POST',
        //     data: data,
        //     dataType: 'json',
        //     success: function(data) { //đổ dữ liệu ra html ở file php
        //         $("#" + product_id).html(data.sub_total);
        //         $("#total-price span").html(data.total);
        //         $(".num").text(data.num_order_cart);
        //         console.log(data.num_order_cart);
        //     },
        //     error: function(xhr, ajaxOptions, thrownError) {
        //         alert(xhr.status);
        //         alert(thrownError);
        //     }
        // });
    });
});



//product
$(document).ready(function() {
    $('.view').html('Xem thêm <i id="arrow" class="fa fa-caret-down" aria-hidden="true"></i>');
    //  Cut letter in content
    var showChar = 1500; //giới hạn ký tự lặp
    var content; //phần nộidung dc giới hạn ký tự
    var str_cut; //nối 2 đièu kiện
    var html; //phần tử html ...
    var check = false;

    $('.more').each(function() { //dùng để lặp lại cho từng đoạn khi giới hạn ký tự
        content = $('.more').html();
        str_cut = content.substr(0, showChar);
        html = str_cut + '<span id="dots">...</span>';

        $(this).html(html);
    });
    $('button.view').click(function() {
        check = !check;
        if (check) { //nếu check=false
            $('.more').html(content);
            $('.dots').addClass('div-hidden');
            $('button.view').html('Rút gọn <i id="arrow" class="fa fa-caret-up" aria-hidden="true"></i>');
            $('body,html').stop();
        } else {
            $('.dots').removeClass('div-hidden');
            $('.more').html(html);
            $('button.view').html('Xem thêm <i id="arrow" class="fa fa-caret-down" aria-hidden="true"></i>');
            $('body,html').stop().animate({ scrollTop: 650 }, 800);
        }
    });

});

//blog
$(document).ready(function() { // phải sử dụng thẻ div cả ở button vs text
    $('.btn-read').html('Xem tiếp <i id="arrow" class="fa fa-caret-down" aria-hidden="true"></i>');
    //  Cut letter in content
    var showChar = 1500; //giới hạn ký tự lặp
    var content; //phần nộidung dc giới hạn ký tự
    var str_cut; //nối 2 đièu kiện
    var html; //phần tử html ...
    var check = false;

    $('.see-more').each(function() { //dùng để lặp lại cho từng phần tử
        content = $('.see-more').html();
        str_cut = content.substr(0, showChar);
        html = str_cut + '<span id="dots">...</span>'; //text nối vs ...

        $(this).html(html);
    });
    $('button.btn-read').click(function() {
        check = !check;
        if (check) { //nếu check=false
            $('.see-more').html(content);
            $('.dots').addClass('div-hidden');
            $('button.btn-read').html('Rút gọn <i id="arrow" class="fa fa-caret-up" aria-hidden="true"></i>');
            
        } else {
            $('.dots').removeClass('div-hidden');
            $('.see-more').html(html);
            $('button.btn-read').html('Xem tiếp <i id="arrow" class="fa fa-caret-down" aria-hidden="true"></i>');
            $('body,html').stop().animate({ scrollTop: 0 }, 600);
        }
    });

});

//comment
$(document).ready(function(){
    $('.comment_form').fadeOut();
    $('.but').click(function(){
        $('.comment_form').slideToggle();
        return false;
    })
})

