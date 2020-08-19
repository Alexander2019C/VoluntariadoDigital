// $(document).ready(function(){
//   T4nombre=[];
//   T4liderazgo=[];
  


//     $.ajax({
//         method: 'post',
//         url: 'Dao/Graficos/VG.php?action=graficos'
//     }).done(function (resp) {
      
//       var data=JSON.parse(resp);
//        for (var i = 0; i < data.length; i++) {
//         T4nombre.push(data[i].nombre);
//         T4liderazgo.push(data[i].liderazgo);
        
         
//        }
// var ctx = document.getElementById("alex");
// var myBarChart = new Chart(ctx, {
//   type: 'bar',
//   data: {
//     labels:["SESION1","SESION2","SESION3","SESION4","SESION5","SESION6","SESION7","SESION8"],
//     datasets: [{
//       data: T4liderazgo,
//       backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
//       hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
//       hoverBorderColor: "black",
//     }],
//   },
//   options: {
//     maintainAspectRatio: false,
//     tooltips: {
//       backgroundColor: "black",
//       bodyFontColor: "lime",
//       borderColor: '#dddfeb',
      
//       xPadding: 15,
//       yPadding: 15,
//       displayColors: true,
      
//     },
//     legend: {
//       display: false
//     },
     
//   },
// });
// });
// });




// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example






$('#indicadores').click(function(){
 
  Thoras1=[];



    $.ajax({
        method: 'get',
        url: 'Dao/Graficos/VG.php?action=graficos',
        data:{id_volu:dni}
    }).done(function (resp) {
      
      var data=JSON.parse(resp);
       for (var i = 0; i < data.length; i++) {
        
        Thoras1.push(data[i].horas);
        
         
       }
      // chart
 var ctx = document.getElementById("alex");
 var myLineChart = new Chart(ctx, {
   type: 'bar',
   data: {
    labels:["SESION1","SESION2","SESION3","SESION4","SESION5","SESION6","SESION7","SESION8"],
     
     datasets: [{
       label: "Total",
       lineTension: 1,
       
       backgroundColor:["#9440ed"],
       borderColor: "rgba(144, 115, 223, 1)",
       pointRadius: 4,
       pointBackgroundColor: "red",
       pointBorderColor: "rgba(78, 115, 223, 1)",
       pointHoverRadius: 3,
       pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
       pointHoverBorderColor: "rgba(78, 115, 223, 1)",
       pointHitRadius: 10,
       pointBorderWidth: 1,
       
       data: Thoras1,
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
           maxTicksLimit: 8
         }
       }],
       yAxes: [{
         ticks: {
           maxTicksLimit: 1,
           barPercentage: 100,
           max:100,
           min:0,
           
           padding: 2,
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
           return "Completado 100%";
         }
       }
     }
   }
 });
 // fin chart
     
    });
    

});
