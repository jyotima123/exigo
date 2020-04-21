
// GOOGLE CHART
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Camera Not Working',     11],
    ['Internet Issue',      2],
    ['Broken Camera',  2],
    ['Singnal Not Sending', 2],
    ['Visibility Not Clear',    7]
  ]);

  var options = {
  title: '',
  is3D: true,
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
  chart.draw(data, options);
}
    

// AM CHARTS
am4core.ready(function() {
  am4core.useTheme(am4themes_animated);
  var chart = am4core.create("chartdiv", am4charts.XYChart);
  chart.exporting.menu = new am4core.ExportMenu();

  var data = [ {
    "year": "19 Mar 2020",
    "income": 18.5,
    "expenses": 21.1
    }, {
    "year": "20 Mar 2020",
    "income": 21.2,
    "expenses": 30.5
    }, {
    "year": "21 Mar 2020",
    "income": 24.1,
    "expenses": 34.9
    }, {
    "year": "22 Mar 2020",
    "income": 28.1,
    "expenses": 34.9
    }, {
    "year": "23 Mar 2020",
    "income": 30.1
  }];

  /* Create axes */
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "year";
  categoryAxis.renderer.minGridDistance = 30;

  /* Create value axis */
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

  /* Create series */
  var columnSeries = chart.series.push(new am4charts.ColumnSeries());
  columnSeries.name = "Income";
  columnSeries.dataFields.valueY = "income";
  columnSeries.dataFields.categoryX = "year";

  columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
  columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
  columnSeries.columns.template.propertyFields.stroke = "stroke";
  columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
  columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
  columnSeries.tooltip.label.textAlign = "middle";

  var lineSeries = chart.series.push(new am4charts.LineSeries());
  lineSeries.name = "Expenses";
  lineSeries.dataFields.valueY = "expenses";
  lineSeries.dataFields.categoryX = "year";

  lineSeries.stroke = am4core.color("#fdd400");
  lineSeries.strokeWidth = 3;
  lineSeries.propertyFields.strokeDasharray = "lineDash";
  lineSeries.tooltip.label.textAlign = "middle";

  var bullet = lineSeries.bullets.push(new am4charts.Bullet());
  bullet.fill = am4core.color("#fdd400"); // tooltips grab fill from parent by default
  bullet.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
  var circle = bullet.createChild(am4core.Circle);
  circle.radius = 4;
  circle.fill = am4core.color("#fff");
  circle.strokeWidth = 3;

  chart.data = data;

}); 


am4core.ready(function() {
  am4core.useTheme(am4themes_animated);
  var chart = am4core.create("chartdiv-event", am4charts.XYChart);
  chart.exporting.menu = new am4core.ExportMenu();

  var data = [ {
    "year": "19 Mar 2020",
    "income": 18.5,
    "expenses": 21.1
    }, {
    "year": "20 Mar 2020",
    "income": 21.2,
    "expenses": 30.5
    }, {
    "year": "21 Mar 2020",
    "income": 24.1,
    "expenses": 34.9
    }, {
    "year": "22 Mar 2020",
    "income": 28.1,
    "expenses": 34.9
    }, {
    "year": "23 Mar 2020",
    "income": 30.1
  }];

  /* Create axes */
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "year";
  categoryAxis.renderer.minGridDistance = 30;

  /* Create value axis */
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

  /* Create series */
  var columnSeries = chart.series.push(new am4charts.ColumnSeries());
  columnSeries.name = "Income";
  columnSeries.dataFields.valueY = "income";
  columnSeries.dataFields.categoryX = "year";

  columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
  columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
  columnSeries.columns.template.propertyFields.stroke = "stroke";
  columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
  columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
  columnSeries.tooltip.label.textAlign = "middle";

  var lineSeries = chart.series.push(new am4charts.LineSeries());
  lineSeries.name = "Expenses";
  lineSeries.dataFields.valueY = "expenses";
  lineSeries.dataFields.categoryX = "year";

  lineSeries.stroke = am4core.color("#fdd400");
  lineSeries.strokeWidth = 3;
  lineSeries.propertyFields.strokeDasharray = "lineDash";
  lineSeries.tooltip.label.textAlign = "middle";

  var bullet = lineSeries.bullets.push(new am4charts.Bullet());
  bullet.fill = am4core.color("#fdd400"); // tooltips grab fill from parent by default
  bullet.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
  var circle = bullet.createChild(am4core.Circle);
  circle.radius = 4;
  circle.fill = am4core.color("#fff");
  circle.strokeWidth = 3;

  chart.data = data;

});
  
  

// PIE CHARTS
am4core.ready(function() {
  am4core.useTheme(am4themes_animated);
  var chart = am4core.create("chartdiv2", am4charts.GaugeChart);
  chart.innerRadius = -15;

  var axis = chart.xAxes.push(new am4charts.ValueAxis());
  axis.min = 0;
  axis.max = 100;
  axis.strictMinMax = true;

  var colorSet = new am4core.ColorSet();

  var gradient = new am4core.LinearGradient();
  gradient.stops.push({color:am4core.color("red")})
  gradient.stops.push({color:am4core.color("yellow")})
  gradient.stops.push({color:am4core.color("green")})

  axis.renderer.line.stroke = gradient;
  axis.renderer.line.strokeWidth = 15;
  axis.renderer.line.strokeOpacity = 1;

  axis.renderer.grid.template.disabled = true;

  var hand = chart.hands.push(new am4charts.ClockHand());
  hand.radius = am4core.percent(97);

  setInterval(function() {
    hand.showValue(Math.random() * 100, 1000, am4core.ease.cubicOut);
  }, 2000);

}); 


  
// PIE CHART 2
am4core.ready(function() {
  am4core.useTheme(am4themes_animated);
  var chart = am4core.create("chartdiv5", am4charts.GaugeChart);
  chart.innerRadius = -15;
  
  var axis = chart.xAxes.push(new am4charts.ValueAxis());
  axis.min = 0;
  axis.max = 100;
  axis.strictMinMax = true;
  
  var colorSet = new am4core.ColorSet();
  
  var gradient = new am4core.LinearGradient();
  gradient.stops.push({color:am4core.color("red")})
  gradient.stops.push({color:am4core.color("yellow")})
  gradient.stops.push({color:am4core.color("green")})
  
  axis.renderer.line.stroke = gradient;
  axis.renderer.line.strokeWidth = 15;
  axis.renderer.line.strokeOpacity = 1;
  
  axis.renderer.grid.template.disabled = true;
  
  var hand = chart.hands.push(new am4charts.ClockHand());
  hand.radius = am4core.percent(97);
  
  setInterval(function() {
      hand.showValue(Math.random() * 100, 1000, am4core.ease.cubicOut);
  }, 2000);
    
}); 


// GAUG CHARTS
am4core.ready(function() {
  am4core.useTheme(am4themes_animated);
  var chart = am4core.create("chartdiv1", am4charts.GaugeChart);
  chart.innerRadius = am4core.percent(82);

  var axis = chart.xAxes.push(new am4charts.ValueAxis());
    axis.min = 0;
    axis.max = 100;
    axis.strictMinMax = true;
    axis.renderer.radius = am4core.percent(80);
    axis.renderer.inside = true;
    axis.renderer.line.strokeOpacity = 1;
    axis.renderer.ticks.template.disabled = false
    axis.renderer.ticks.template.strokeOpacity = 1;
    axis.renderer.ticks.template.length = 10;
    axis.renderer.grid.template.disabled = true;
    axis.renderer.labels.template.radius = 40;
    axis.renderer.labels.template.adapter.add("text", function(text) {
    return text + "%";
  })

  // AXIS FOR RANGER
  var colorSet = new am4core.ColorSet();

  var axis2 = chart.xAxes.push(new am4charts.ValueAxis());
  axis2.min = 0;
  axis2.max = 100;
  axis2.renderer.innerRadius = 10
  axis2.strictMinMax = true;
  axis2.renderer.labels.template.disabled = true;
  axis2.renderer.ticks.template.disabled = true;
  axis2.renderer.grid.template.disabled = true;

  var range0 = axis2.axisRanges.create();
  range0.value = 0;
  range0.endValue = 50;
  range0.axisFill.fillOpacity = 1;
  range0.axisFill.fill = colorSet.getIndex(0);

  var range1 = axis2.axisRanges.create();
  range1.value = 50;
  range1.endValue = 100;
  range1.axisFill.fillOpacity = 1;
  range1.axisFill.fill = colorSet.getIndex(2);

  // LABLE
  var label = chart.radarContainer.createChild(am4core.Label);
  label.isMeasured = false;
  label.fontSize = 45;
  label.x = am4core.percent(50);
  label.y = am4core.percent(100);
  label.horizontalCenter = "middle";
  label.verticalCenter = "bottom";
  label.text = "50%";

  // HAND
  var hand = chart.hands.push(new am4charts.ClockHand());
  hand.axis = axis2;
  hand.innerRadius = am4core.percent(20);
  hand.startWidth = 10;
  hand.pin.disabled = true;
  hand.value = 50;

  hand.events.on("propertychanged", function(ev) {
    range0.endValue = ev.target.value;
    range1.value = ev.target.value;
    label.text = axis2.positionToValue(hand.currentPosition).toFixed(1);
    axis2.invalidate();
  });

  setInterval(function() {
    var value = Math.round(Math.random() * 100);
    var animation = new am4core.Animation(hand, {
      property: "value",
      to: value
    }, 1000, am4core.ease.cubicOut).start();
  }, 2000);

}); 