(function(){
  'use strict';
    
  $('[data-toggle="tab"]').on('hide.bs.tab', function (e) {
    $(e.target).removeClass('active')
  })

  Charts.init()
  
  var EarningsTraffic = function(id, type = 'line', options = {}) {
    options = Chart.helpers.merge({
      elements: {
        line: {
          fill: 'start',
          backgroundColor: settings.charts.colors.area
        }
      }
    }, options)

    var data = {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Traffic",
        data: [10, 2, 5, 15, 10, 12, 15, 25, 22, 30, 25, 40]
      }]
    }

    Charts.create(id, type, options, data)
  }

  var Transactions = function(id, type = 'line', options = {}) {
    options = Chart.helpers.merge({
      scales: {
        yAxes: [{
          ticks: {
            maxTicksLimit: 5,
            callback: function(a) {
              return "$" + a + "k"
            }
          }
        }]
      },
      tooltips: {
        callbacks: {
          label: function(a, e) {
            var t = e.datasets[a.datasetIndex].label || "",
                o = a.yLabel,
                r = "";
            return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">$' + o + "k</span>"
          }
        }
      }
    }, options)

    var data = {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Transactions",
        data: [8, 5, 9, 6, 45, 4, 35, 14, 55, 19, 25, 20]
      }]
    }

    Charts.create(id, type, options, data)
  }

  var Products = function(id, type = 'line', options = {}, data) {
    options = Chart.helpers.merge({
      elements: {
        line: {
          fill: 'start',
          backgroundColor: settings.charts.colors.area,
          tension: 0,
          borderWidth: 1
        },
        point: {
          pointStyle: 'circle',
          radius: 5,
          hoverRadius: 5,
          backgroundColor: settings.colors.white,
          borderColor: settings.colors.primary[700],
          borderWidth: 2
        }
      },
      scales: {
        yAxes: [{
          display: false
        }],
        xAxes: [{
          display: false
        }]
      }
    }, options)

    data = data || {
      labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      datasets: [{
        label: "Earnings",
        data: [400, 200, 450, 460, 220, 380, 800]
      }]
    }

    Charts.create(id, type, options, data)
  }

  var Courses = function(id, type = 'line', options = {}) {
    options = Chart.helpers.merge({
      elements: {
        line: {
          borderColor: settings.colors.success[700],
          backgroundColor: settings.hexToRGB(settings.colors.success[100], 0.5)
        },
        point: {
          borderColor: settings.colors.success[700]
        }
      }
    }, options)

    Products(id, type, options)
  }

  var LocationDoughnut = function(id, type = 'doughnut', options = {}) {
    options = Chart.helpers.merge({
      tooltips: {
        callbacks: {
          title: function(a, e) {
            return e.labels[a[0].index]
          },
          label: function(a, e) {
            var t = "";
            return t += '<span class="popover-body-value">' + e.datasets[0].data[a.index] + "%</span>"
          }
        }
      }
    }, options)

    var data = {
      labels: ["United States", "United Kingdom", "Germany", "India"],
      datasets: [{
        data: [25, 25, 15, 35],
        backgroundColor: [settings.colors.success[400], settings.colors.danger[400], settings.colors.primary[500], settings.colors.gray[300]],
        hoverBorderColor: "dark" == settings.charts.colorScheme ? settings.colors.gray[800] : settings.colors.white
      }]
    }

    Charts.create(id, type, options, data)
  }

  var Billing = function(id, type = 'doughnut', options = {}) {
    options = Chart.helpers.merge({
      tooltips: {
        callbacks: {
          title: function(a, e) {
            return e.labels[a[0].index]
          },
          label: function(a, e) {
            var t = "";
            return t += '<span class="popover-body-value">' + e.datasets[0].data[a.index] + "%</span>"
          }
        }
      }
    }, options)

    var data = {
      labels: ["Current Value", null],
      datasets: [{
        data: [75, 25],
        backgroundColor: [settings.colors.primary[500], settings.colors.gray[50]],
        hoverBorderColor: "dark" == settings.charts.colorScheme ? settings.colors.gray[800] : settings.colors.white
      }]
    }

    Charts.create(id, type, options, data)
  }

  var Gender = function(id, type = 'roundedBar', options = {}) {
    options = Chart.helpers.merge({
      barRoundness: 1.2,
      scales: {
        xAxes: [{
          maxBarThickness: 15
        }]
      }
    }, options)

    var data = {
      labels: ["10-17", "18-30", "35-45", "46-60", "61-79", "80+"],
      datasets: [{
        label: "Female",
        data: [25, 20, 30, 22, 17, 10]
      }, {
        label: "Male",
        data: [15, 10, 20, 12, 7, 2],
        backgroundColor: settings.colors.primary[100]
      }]
    }

    Charts.create(id, type, options, data)
  }

  ///////////////////
  // Create Charts //
  ///////////////////
  
  EarningsTraffic('#earningsTrafficChart')
  Transactions('#transactionsChart')
  LocationDoughnut('#locationDoughnutChart')
  Billing('#billingChart')
  Products('#productsChart')
  Courses('#coursesChart')
  Gender('#genderChart')

})()