
// Bar Chart Example




$(document).ready(function(){
  T2nombre=[];
  T2horas=[];
  T2sesiones=[];


    $.ajax({
        method: 'post',
        url: 'Dao/Graficos.php?action=top5sesiones'
    }).done(function (resp) {
      
      var data=JSON.parse(resp);
       for (var i = 0; i < data.length; i++) {
        T2nombre.push(data[i].nombre);
        T2horas.push(data[i].horas);
        T2sesiones.push(data[i].sesion);
         
       }

       var ctx = document.getElementById("top5sesiones");
       var myLineChart = new Chart(ctx, {
         type: 'bar',
         data: {
           labels:T2nombre,
           
           datasets: [{
             label: "Sesiones ",
             lineTension: 1,
             
             backgroundColor:["#ff407b","#ff407b","#ff407b","#ff407b","#ff407b"],
             borderColor: "rgba(78, 115, 223, 1)",
             pointRadius: 4,
             pointBackgroundColor: "red",
             pointBorderColor: "rgba(78, 115, 223, 1)",
             pointHoverRadius: 3,
             pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
             pointHoverBorderColor: "rgba(78, 115, 223, 1)",
             pointHitRadius: 10,
             pointBorderWidth: 1,
             
             data: T2sesiones,
           }],
         },
         options: {
           maintainAspectRatio: false,
           layout: {
             padding: {
               left: 10,
               right: 25,
               top: 25,
               bottom: 0,
               
             }
           },
           scales: {
             xAxes: [{
               time: {
                 unit: 'date'
               },
               gridLines: {
                 display: true,
                 drawBorder: true
               },
               ticks: {
                 maxTicksLimit: 40
               }
             }],
             yAxes: [{
               ticks: {
                 maxTicksLimit: 2,
                 
                 
                 padding: 10,
                 // Include a dollar sign in the ticks
                 callback: function(value, index, values) {
                   return  number_format(value);
                 }
               },
               gridLines: {
                 color: "rgb(234, 236, 244)",
                 zeroLineColor: "rgb(234, 236, 244)",
                 drawBorder: false,
                 borderDash: [10],
                 zeroLineBorderDash: [2]
               }
             }],
           },
           legend: {
             display: true
           },
           tooltips: {
             backgroundColor: "#003366",
             bodyFontColor: "white",
             titleMarginBottom: 20,
             titleFontColor: 'white',
             titleFontSize: 14,
             borderColor: '#dddfeb',
             borderWidth: 1,
             xPadding: 15,
             yPadding: 15,
             displayColors: true,
             intersect: false,
             mode: 'index',
             caretPadding: 20,
             callbacks: {
               label: function(tooltipItem, chart) {
                 var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                 return datasetLabel +number_format(tooltipItem.yLabel)+"0" +" %";
               }
             }
           }
         }
       });


});
    

});


var barChartData = {
  labels: T2nombre,
  datasets: [{
    data: [
      1,2,3,4,5,7,8,9,10
    ],
    type: 'line',
    label: 'This Year',
    fill: false,
    backgroundColor: "#fff",
    borderColor: "#70cbf4",
    borderCapStyle: 'butt',
    borderDash: [],
    borderDashOffset: 0.0,
    borderJoinStyle: 'miter',
    lineTension: 0.3,
    pointBackgroundColor: "#fff",
    pointBorderColor: "#70cbf4",
    pointBorderWidth: 1,
    pointHoverRadius: 5,
    pointHoverBackgroundColor: "#70cbf4",
    pointHoverBorderColor: "#70cbf4",
    pointHoverBorderWidth: 2,
    pointRadius: 4,
    pointHitRadius: 10
  }, {
    data: [
      1,2,3,4,5,7,8,9,10
    ],
    type: 'line',
    label: 'Last Year',
    fill: false,
    backgroundColor: "#fff",
    borderColor: "#737373",
    borderCapStyle: 'butt',
    borderDash: [10, 10],
    borderDashOffset: 0.0,
    borderJoinStyle: 'miter',
    lineTension: .3,
    pointBackgroundColor: "#fff",
    pointBorderColor: "#737373",
    pointBorderWidth: 1,
    pointHoverRadius: 5,
    pointHoverBackgroundColor: "#737373",
    pointHoverBorderColor: "#737373",
    pointHoverBorderWidth: 2,
    pointRadius: 4,
    pointHitRadius: 10
  }, {
    label: 'Promoters',
    backgroundColor: "#aad700",
    yAxisID: "bar-y-axis",
    data: [
      1,2,3,4,5,6,7,8,9,10
    ]
  }, {
    label: 'Passives',
    backgroundColor: "#ffe100",
    yAxisID: "bar-y-axis",
    data: [
      1,2,3,4,5,6,7,8,9,10
    ]
  }, {
    label: 'Detractors',
    backgroundColor: "#ef0000",
    yAxisID: "bar-y-axis",
    data: [
      1,2,3,4,5,6,7,8,9,10
    ]
  }]
};

window.onload = function() {
  var ctx = document.getElementById("canvas").getContext("2d");
  window.myBar = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
    options: {
      title: {
        display: true,
        text: "Registro Completo"
      },
      tooltips: {
        mode: 'label'
      },
      responsive: true,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: false,
          ticks: {
            beginAtZero: true,
            min: 0,
            max: 10
          }
        }, {
          id: "bar-y-axis",
          stacked: true,
          display: false, //optional
          ticks: {
            beginAtZero: true,
            min: 0,
            max: 10
          },
          type: 'linear'
        }]
      }
    }
  });
};