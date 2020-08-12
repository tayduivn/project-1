<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <script src="https://cdn.tiny.cloud/1/2pxsmm2ohpi6nnpfj18ib4po32duhgbk4lqef8d5jfj9ewi6/tinymce/4/tinymce.min.js" 
    referrerpolicy="origin"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>

    
    <script>
        window.setTimeout("showTime()", 1000);
        function getVNTime(){
            var time = new Date();
            var dow = time.getDay();
            if(dow==0)
                dow = "Chủ nhật";
            else if (dow==1)
                dow = "Thứ hai";
            else if (dow==2)
                dow = "Thứ ba";
            else if (dow==3)
                dow = "Thứ tư";
            else if (dow==4)
                dow = "Thứ năm";
            else if (dow==5)
                dow = "Thứ sáu";
            else if (dow==6)
                dow = "Thứ bảy";  
            var day = time.getDate();
            var month = time.getMonth()+1;
            var year = time.getFullYear();
            var hr = time.getHours();
            var min = time.getMinutes();
            var sec = time.getSeconds();
            day = ((day < 10) ? "0" : "") + day;
            month = ((month < 10) ? "0" : "") + month;
            return dow + " " + day + "/" + month + "/" + year ;
        }
            function showTime(){
                var vnclock = document.getElementById("vnclock");
                if (vnclock != null)
                    vnclock.innerHTML = getVNTime();
                setTimeout("showTime()", 1000);
           }
    </script>
    <style>
    #vnclock{
        font-weight:bold;
        text-align:center;
        font-size:18px;
        padding:10px;
        color:#787272;
        
    }
    </style>
    <script>
        var editor_config = {
            path_absolute: "http://localhost/unitop/back-end/laravelPro/lesson/unimart/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <title>Admintrator</title>
</head>

<body>
   
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand" style="margin-top:4px;"><h4><a href="{{url('dashboard')}}"><i style="font-size:27px;" class="fas fa-user-shield"></i> ADMIN</a></h4></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('admin/page/add')}}">Thêm bài viết</a>
                        <a class="dropdown-item" href="{{url('admin/product/add')}}">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="{{url('admin/order/list')}}">Thêm đơn hàng</a>
                    </div>
                </div>
                <span id="vnclock"></span>
                <div class="wp-notify dropdown fl-right">
                    <button class="btn  notification bell" style="color:black;margin-top:3px;position: relative;"type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span ><i style="font-size:24px;color:#787272;" class="far fa-bell" aria-hidden="true" ></i></span>
                        @if (session('count')>0)
                           <span class="count" style="position:absolute;color:black;top:-4px;right:1px;;font-size:13px;padding:0.5px 7px;border-radius:50%;background:#c00;color:white;">{{session('count')}}</span>
                        @else
                            <span class="count"> </span>
                        @endif
                   
                    </button>


                    @if (session('count')>0)
                        <ul style="width: 350px;overflow-y:scroll;height:250px" class="dropdown-menu list-content" aria-labelledby="dropdownMenuButton">
                            @foreach (session('infos') as $value)
                                <li style="margin-left:20px;">    
                                    <div style="display:flex;">
                                        <div class="">
                                            <i style="color:green;font-size:36px;margin-right:12px;margin-top:12px;" class="fas fa-user-tie"></i>
                                        </div>
                                        <div style="margin:5px;">
                                            <span style="font-size:15px;">  Bạn có đơn hàng <strong>{{$value['order_code']}}</strong> của <strong>{{$value['fullname']}}</strong> cần xử lý</span>
                                            <div><span style="font-size:14px;color:#777;">{{$value['created_at']}}</span>
                                        </div>
                                    </div>
                                                            
                                </li>      
                            @endforeach
                        
                            <div style="width: 100%; text-align: center" class="wp-view-all"><a href="{{url('admin/order/list')}}">Xem tất cả</a></div>
                        </ul>
                    @else
                    <ul style="width: 310px;height:225px" class="dropdown-menu list-content" aria-labelledby="dropdownMenuButton">
                        <img style="width:100%;" src="{{asset('images/empty-cart.png')}}">
                    </ul>
                    @endif
                    
    
                </div>


                <div class="btn-group">
                    <button type="button" class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       
                        <p style="text-transform: uppercase;margin-top:4px;"> <i style="color:#787272;" class="fas fa-user-circle"></i> {{Auth::user()->name}}</p>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" style="border-bottom:1px solid #e1e1e1" >Chào! {{Auth::user()->name}}</a>
                        <a class="dropdown-item" href="{{url('admin/user/edit', Auth::user()->id)}}">Tài khoản</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            
        </nav>
        <!-- end nav  -->
        @php
        $module_active=session('module_active')//active sidebar khi an se so ra
        @endphp
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <ul id="sidebar-menu">
                    <li class="nav-link {{$module_active=='dashboard'?'active':''}}">
                        <a href="{{url('dashboard')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-folder"></i>
                            </div>
                            Dashboard
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>
                    <li class="nav-link {{$module_active=='slider'?'active':''}}">
                        <a href="{{url('admin/slider/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-folder"></i>
                            </div>
                            Slider
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{url('admin/slider/add')}}">Thêm mới</a></li>
                            <li><a href="{{url('admin/slider/list')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='page'?'active':''}}">
                        <a href="{{url('admin/page/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-folder"></i>
                            </div>
                            Trang
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{url('admin/page/add')}}">Thêm mới</a></li>
                            <li><a href="{{url('admin/page/list')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-link {{$module_active=='product'?'active':''}}">
                        <a href="{{url('admin/product/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-folder"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/product/add')}}">Thêm mới</a></li>
                            <li><a href="{{url('admin/product/list')}}">Danh sách</a></li>
                            <li><a href="{{url('admin/product/cat/list')}}">Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='order'?'active':''}}">
                        <a href="{{url('admin/order/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-folder"></i>
                            </div>
                            Bán hàng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/customer/listcustomer')}}">Khách hàng</a></li>
                            <li><a href="{{url('admin/order/list')}}">Đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='user'?'active':''}}">
                        <a href="{{url('admin/user/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-folder"></i>
                            </div>
                            Thành viên
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{url('admin/user/add')}}">Thêm mới</a></li>
                            <li><a href="{{url('admin/user/list')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="wp-content">
                @yield('content')

            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('admin/js/app.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>