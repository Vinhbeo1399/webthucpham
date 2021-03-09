@extends('backend.layouts.main')

@section('content')
    <div class="container-fluid">
        <style type="text/css">
            p.title_thongke{
                text-align: center;
                font-size: 20px;
                font-weight: bold;
            }
        </style>

        <div class="row">
            <p class="title_thongke">Thống kê doanh số bán hàng</p>
            <form autocomplete="off">
                @csrf
                <div class="col-md-2">
                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                </div>

                <div class="col-md-2">
                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                </div>

                <div class="col-md-2">
                    <p>Lọc theo:
                        <select class="dashboard-filter form-control">
                            <option>--Chọn--</option>
                            <option value="7ngay">7 ngày qua</option>
                            <option value="thangtruoc">tháng trước</option>
                            <option value="thangnay">tháng này</option>
                            <option value="365ngayqua">365 ngày qua</option>
                        </select>
                    </p>
                </div>

            </form>
            <div class="col-md-12">
                <div id="chart" style="height: 250px;"></div>
            </div>
        </div>
<br>
{{--        <div class="row">--}}
{{--            <p class="title_thongke">Thống kê truy cập</p>--}}
{{--            <table class="table table-bordered" style="background-color: rgb(211, 210, 210)">--}}
{{--                <thead>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">Đang online</th>--}}
{{--                        <th scope="col">Tổng tháng trước</th>--}}
{{--                        <th scope="col">Tổng tháng này</th>--}}
{{--                        <th scope="col">Tổng một năm</th>--}}
{{--                        <th scope="col">Tổng truy cập</th>--}}
{{--                    </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>1</td>--}}
{{--                        <td>24</td>--}}
{{--                        <td>14</td>--}}
{{--                        <td>50</td>--}}
{{--                        <td>87</td>--}}
{{--                    </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}

        <div class="row">
            <div class="col-md-3 col-xs-12">
                <p class="title_thongke">Thống kê tổng sản phẩm, bài viết, đơn hàng</p>
                <div id="donut" class="morris-donut-inverse"></div>
            </div>
            <div class="col-md-3 col-xs-12" >
                <p class="title_thongke">Sản phẩm xem nhiều</p>
                <ol class="block-20" style="margin-left: 10%">
                    @foreach ($product_view as $item)
                    <li>
                        <a href="{{ route('shop.productDetails',['slug' => $item->slug]) }}" target="_blank">{{$item->name}}  <span style="color: black">| {{$item->views}}</span></a>
                    </li>
                    @endforeach
                </ol>
            </div>
            <div class="col-md-3 col-xs-12">
                <p class="title_thongke">Bài viết xem nhiều</p>
                <ol class="block-20">
                    @foreach ($article_view as $item)
                    <li>
                        <a href="{{ route('shop.articleDetail.detail',['slug' => $item->slug, 'id'=>$item->id]) }}" target="_blank">{{$item->title}}  <span style="color: black">| {{$item->views}}</a>
                    </li>
                    @endforeach
                </ol>
            </div>
            <div class="col-md-3 col-xs-12">
                <p class="title_thongke">Sản phẩm bán chạy</p>
                <ol class="block-20">
                    @foreach ($solded as $item)
                    <li>
                        <span style="color: #43AEDE"> {{$item['name']}} </span> <span style="color: black">| {{$item['solded']}}</span>
                    </li>
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
@endsection
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        Morris.Donut({
        element: 'donut',
        resize: true,
        colors: [
            '#15C221',
            '#BF9C28',
            '#80DEEA',

        ],
        //labelColor:"#cccccc", // text color
        //backgroundColor: '#333333', // border color
        data: [
            {label:"Sản phẩm", value:{{$product}}},
            {label:"Bài viết", value:{{$article}}},
            {label:"Đơn hàng", value:{{$order}}}

        ]
        });
    });
</script>
