@extends('layouts.admin')
@section('title', 'Dashboard')

@section('main')
    <section class="main_content dashboard_part">
        <div class="main_content_iner ">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity">
                                            <h4>Total Product</h4>
                                            <h3><span class="counter">{{ $products->count() }}</span> </h3>
                                            <p>Saved 25%</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Total Order</h4>
                                            <h3><span class="counter">{{ $orders->count() }}</span> </h3>
                                            <p>Saved 25%</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Total User</h4>
                                            <h3><span class="counter">{{ $users->count() }}</span> </h3>
                                            <p>Saved 25%</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Total Blog</h4>
                                            <h3><span class="counter">{{ $blogs->count() }}</span> </h3>
                                            <p>Saved 65%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12">
                    <div class="white_box box_border mb_30 min_430">
                        <div id="bar_active2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    var items = @json($users);
    const users = items.map((x) => x.name);
    console.log(users)
    var options = {
        colors: ["#AFD7FF"],
        series: [
            {
                name: "Monthly",
                type: "column",
                data: [1, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160],
            },
            {
                name: "Yearly",
                type: "line",
                data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16],
            },
        ],
        chart: {
            height: 265,
            type: "line",
            toolbar: {
                show: false
            }
        },
        stroke: {
            width: [0, 4]
        },
        dataLabels: {
            enabled: false,
            enabledOnSeries: [1]
        },
        legend: {
            show: false
        },
        labels: [
            "01 Jan 2001",
            "02 Jan 2001",
            "03 Jan 2001",
            "04 Jan 2001",
            "05 Jan 2001",
            "06 Jan 2001",
            "07 Jan 2001",
            "08 Jan 2001",
            "09 Jan 2001",
            "10 Jan 2001",
            "11 Jan 2001",
            "12 Jan 2001",
        ],
        xaxis: {
            type: "datetime"
        },
        yaxis: [{
            title: {}
        }, {
            opposite: true,
            title: {}
        }],
    };
    var chart = new ApexCharts(document.querySelector("#bar_active2"), options);
    chart.render();
</script>
@endsection
