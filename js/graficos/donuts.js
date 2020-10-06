var colors = Highcharts.getOptions().colors,
  categories = [
    'Chrome',
    'Firefox',
    'Internet Explorer',
  ],
  data = [
    {
      y: 62.74,
      color: colors[3],
      drilldown: {
        name: 'Chrome',
        categories: [
          'Chrome v65.0'
        ],
        data: [
          0.1
        ]
      }
    },
    {
      y: 10.57,
      color: colors[2],
      drilldown: {
        name: 'Firefox',
        categories: [
          'Firefox v47.0'
        ],
        data: [
          0.12
        ]
      }
    },
    {
      y: 7.23,
      color: colors[1],
      drilldown: {
        name: 'Internet Explorer',
        categories: [
          'Internet Explorer v11.0'
        ],
        data: [
          0.47
        ]
      }
    },


  ],
  browserData = [],
  versionsData = [],
  i,
  j,
  dataLen = data.length,
  drillDataLen,
  brightness;


// Build the data arrays
for (i = 0; i < dataLen; i += 1) {

  // add browser data
  browserData.push({
    name: categories[i],
    y: data[i].y,
    color: data[i].color
  });

  // add version data
  drillDataLen = data[i].drilldown.data.length;
  for (j = 0; j < drillDataLen; j += 1) {
    brightness = 0.2 - (j / drillDataLen) / 5;
    versionsData.push({
      name: data[i].drilldown.categories[j],
      y: data[i].drilldown.data[j],
      color: Highcharts.color(data[i].color).brighten(brightness).get()
    });
  }
}

// Create the chart
Highcharts.chart('container_donut', {
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Browser market share, January, 2018'
  },
  subtitle: {
    text: '' },
  plotOptions: {
    pie: {
      shadow: true,
      center: ['50%', '50%']
    }
  },
  tooltip: {
    valueSuffix: '%'
  },
  series: [ {
    name: 'Versions',
    data: versionsData,
    size: '90%',
    innerSize: '70%',
    dataLabels: {
      formatter: function () {
        // display only if larger than 1
        return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
          this.y + '%' : null;
      }
    },
    id: 'versions'
  }],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 400
      },
      chartOptions: {
        series: [{
        }, {
          id: 'versions',
          dataLabels: {
            enabled: false
          }
        }]
      }
    }]
  }
});