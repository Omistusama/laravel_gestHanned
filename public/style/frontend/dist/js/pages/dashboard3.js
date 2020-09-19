$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true
  console.log(mois)
  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['SEPT', 'OCT', 'NOV', 'DEC', 'JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUIN'],
      datasets: [
        {
          backgroundColor: '#d16852',
          borderColor    : '#d16852',
          data           :  mois
        },
        {
          backgroundColor: '#f8d361',
          borderColor    : '#f8d361',
          data           :  cout
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
  
  var $visitorsChart = $('#visitors-chart')
  var i =0
  
    console.log(mavariablerecup);
      var visitorsChart  = new Chart($visitorsChart, {
        
        data   : {
          labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
          datasets: [{
            type                : 'line',
            
            data                : mavariablerecup ,
            backgroundColor     : 'transparent',
            borderColor         : '#d43e81',
            pointBorderColor    : '#d43e81',
            pointBackgroundColor: '#d43e81',
            fill                : false,
            pointHoverBackgroundColor: '#007bff',
            pointHoverBorderColor    : '#007bff'
          },
            {
              type                : 'line',
              data                : mavariablerecupthird,
              backgroundColor     : 'tansparent',
              borderColor         : '#a4b3c2',
              pointBorderColor    : '#a4b3c2',
              pointBackgroundColor: '#a4b3c2',
              fill                : false,
              pointHoverBackgroundColor: '#ced4da',
              pointHoverBorderColor    : '#ced4da'
            }]
        },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero : true,
              suggestedMax: 200
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    })
  
    var mode      = 'index'
    var intersect = true
    console.log(mois)
    var $barChart = $('#barChart')
    var barChart  = new Chart($barChart, {
      type   : 'bar',
      data   : {
        labels  : ['SEPT', 'OCT', 'NOV', 'DEC', 'JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUIN'],
        datasets: [
          {
            backgroundColor: '#d16852',
            borderColor    : '#d16852',
            data           :  ['5000', '5000', '5000', '5000', '5000', '5000', '5000', '5000', '5000', '5000']
          },
          {
            backgroundColor: '#f8d361',
            borderColor    : '#f8d361',
            data           :  ['6000', '6000', '6000', '6000', '6000', '6000', '6000', '6000', '6000', '6000']
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero : true,
              suggestedMax: 200
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    })
})
