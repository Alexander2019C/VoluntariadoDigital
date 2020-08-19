// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example



$(document).ready(function(){
  T3nombre=[];
  T3horas=[];
  T3titulo=[];


    $.ajax({
        method: 'post',
        url: 'Dao/Graficos.php?action=top3Shoras'
    }).done(function (resp) {
      
      var data=JSON.parse(resp);
       for (var i = 0; i < data.length; i++) {
        T3nombre.push(data[i].nombre);
        T3horas.push(data[i].horas);
        T3titulo.push(data[i].titulo);
         
       }
var ctx = document.getElementById("dona1");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels:T3nombre,
    datasets: [{
      data: T3horas,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 20,
  },
});
});
});



// 

$(document).ready(function(){
  Tpie4total=[];
  Tpie4titulo=[];
  


    $.ajax({
        method: 'post',
        url: 'Dao/Graficos.php?action=Top3SesionesHoras'
    }).done(function (resp) {
      
      var data=JSON.parse(resp);
       for (var i = 0; i < data.length; i++) {
        Tpie4titulo.push(data[i].titulo);
        Tpie4total.push(data[i].total);
        
         
       }
var ctx = document.getElementById("dona2");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels:Tpie4titulo,
    datasets: [{
      data: Tpie4total,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 20,  
  },
});
});
});


// 
// 
// 
$(document).ready(function(){
  T4nombre=[];
  T4liderazgo=[];
  


    $.ajax({
        method: 'post',
        url: 'Dao/Graficos.php?action=top5estu100lider'
    }).done(function (resp) {
      
      var data=JSON.parse(resp);
       for (var i = 0; i < data.length; i++) {
        T4nombre.push(data[i].nombre);
        T4liderazgo.push(data[i].liderazgo);
        
         
       }
var ctx = document.getElementById("dona3");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels:T4nombre,
    datasets: [{
      data: T4liderazgo,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 20,  
  },
});
});
});






// funcion para mostrat el top de 5 estudiantes con el 100% de liderazo top5estu100lider





