@extends('layouts.app')

@section('content')
<div class="container relative w-full top-[100px] left-[35px]">
    <div class="grid grid-cols-4 gap-3 w-full">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="font-medium text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">USERS</div>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $users }}</h5>
            </a>
            <a href="/dashboard/account" class="inline-flex font-medium items-center text-blue-400 hover:underline">
                Show details
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="font-medium text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">STUDENTS</div>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $stu }}</h5>
            </a>
            <a href="/dashboard/list/students" class="inline-flex font-medium items-center text-blue-400 hover:underline">
                Show details
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="font-medium text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">ROLES</div>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $role }}</h5>
            </a>
            <a href="/dashboard/list/students" class="inline-flex font-medium items-center text-blue-400 hover:underline">
                Show details
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="font-medium text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">NONE</div>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">0</h5>
            </a>
            <a href="/dashboard/list/students" class="inline-flex font-medium items-center text-blue-400 hover:underline">
                Show details
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="max-w-full mt-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div id="chartdiv"></div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  am5.ready(function () {

    var root = am5.Root.new("chartdiv");

    root.setThemes([
      am5themes_Animated.new(root)
    ]);

    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX: false,
      paddingLeft: 0
    }));

    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
      behavior: "none"
    }));
    cursor.lineY.set("visible", false);


    // Generate random data
    var date = new Date();
    date.setHours(0, 0, 0, 0);
    var value = 100;

    function generateData() {
      value = Math.round((Math.random() * 10 - 5) + value);
      am5.time.add(date, "day", 1);
      return {
        date: date.getTime(),
        value: value
      };
    }

    function generateDatas(count) {
      var data = [];
      for (var i = 0; i < count; ++i) {
        data.push(generateData());
      }
      return data;
    }

    var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
      maxDeviation: 0.5,
      baseInterval: {
        timeUnit: "day",
        count: 1
      },
      renderer: am5xy.AxisRendererX.new(root, {
        minGridDistance: 80,
        minorGridEnabled: false,
        pan: "none"
      }),
      tooltip: am5.Tooltip.new(root, {})
    }));

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      maxDeviation: 1,
      renderer: am5xy.AxisRendererY.new(root, {
        pan: "none"
      })
    }));


    var series = chart.series.push(am5xy.SmoothedXLineSeries.new(root, {
      name: "Series",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      valueXField: "date",
      tooltip: am5.Tooltip.new(root, {
        labelText: "{valueY}"
      })
    }));

    series.fills.template.setAll({
      visible: true,
      fillOpacity: 0.2
    });

    series.bullets.push(function () {
      return am5.Bullet.new(root, {
        locationY: 0,
        sprite: am5.Circle.new(root, {
          radius: 4,
          stroke: root.interfaceColors.get("background"),
          strokeWidth: 2,
          fill: series.get("fill")
        })
      });
    });

    var data = generateDatas(50);
    series.data.setAll(data);


    series.appear(1000);
    chart.appear(1000, 100);

  });

});
</script>
@endsection