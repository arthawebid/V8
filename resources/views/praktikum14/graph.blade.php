@extends('prakgraph')
@section('FOOTER')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable({!!$DTA!!});

      var view = new google.visualization.DataView(data);
      @if($JNS=="BAR")
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "{{$JUDULGRAFIK}}",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      @else
      var options = {
        title: "{{$JUDULGRAFIK}}"
        };
        var chart = new google.visualization.PieChart(document.getElementById("columnchart_values"));
      @endif
      chart.draw(view, options);
  }
  </script>
@endsection