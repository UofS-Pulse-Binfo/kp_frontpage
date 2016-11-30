(function ($) {
  Drupal.behaviors.KPdataWeHave = {
    attach: function (context, settings) {
      bgColor = d3.scale.category20();

      // Tool tip to show details when svg element is selected.
      var infoBox = d3.select('body')
        .append('div')
        .attr('class', 'kp-homepage-tool-tip')
        .style('display', 'none');

      // Data and count
      var statData = [];

      // Read hidden field containing values required by bar chart.
      $('.statset-0').each(function() {
        var tmp = $(this).attr('id');
        statData[tmp.replace('-', ' ')] = +$(this).attr('value');
      });

      var barCaption = d3.keys(statData);
      var barValues = d3.values(statData);

      // Format number with comma symbol.
      var f = d3.format(',');

      // Chart object.
      var chartObj = {};
        // Height and width of g container.
        chartObj.height = 133;
        chartObj.width = 240;
        // Padding Right and Padding Left.
        // Ensures that x axis texts are not cut off.
        chartObj.paddingR = 15;
        chartObj.paddingL = 3;
        // Gutter/space between bars.
        chartObj.rectGutter = 2;
        // Render elements in this area.
        chartObj.chartAreaW = chartObj.width - chartObj.paddingR - chartObj.paddingL;
        // 20px to account for the size of ticks and label.
        chartObj.chartAreaH = chartObj.height - 20;
        // The height of each bar.
        chartObj.barH = Math.round(chartObj.chartAreaH / d3.values(statData).length) - chartObj.rectGutter;
        // Number of tick marks in the x axis.
        chartObj.barTicks = 4;

      // Select main SVG canvas.
      var canvas = d3.select('#kp-chart');

      // G CONTAINERS.
      // Add g container for bar chart.
      var barChartWrapper = canvas.append('g')
        .attr('id', 'kp-homepage-bar-chart')
        .attr('height', chartObj.height)
        .attr('width', chartObj.width);

      // Add g container for bubble chart.
      var bubbleChartWrapper = canvas.append('g')
        .attr('id', 'kp-homepage-bubble-chart')
        .attr('height', chartObj.height)
        .attr('width', chartObj.width);


      // BEGIN BAR CHART
      // X Axis. Scale number in the x axis to short values.
      // (eg. 1000 to 1K)
      var xscale = d3.scale.linear()
			  .domain([0, d3.max(barValues)])
				.range([0, chartObj.chartAreaW])
				.nice();

      var	xAxis = d3.svg.axis();
			xAxis
				.orient('bottom')
				.scale(xscale)
				.tickFormat(d3.format('s'))
				.ticks(chartObj.barTicks);

      // Create a g container in main bar chart container
      // to hold all bars.
			var containerBar = barChartWrapper
        .selectAll('g')
        .data(barCaption);

			// In the bar container, create a g container containing
			// bar (polygon), rect and text
			var eachBar = containerBar.enter()
        .append('g')
        .attr('transform', function(d, i) {
          return 'translate(0,' + i * chartObj.rectGutter + ')';
        })
        .on('mousemove', function(d, i) {
          d3.select(this).style('opacity', 0.9);
          infoBox.transition().style({'opacity' : 1, 'display' : 'block'});
          infoBox
            .html(d + ' : ' + f(barValues[i]))
            .style('left', (d3.event.pageX + 10) + 'px')
            .style('top', (d3.event.pageY) + 'px');

        })
        .on('mouseout', function(d) {
          d3.select(this).style('opacity', 1);
          infoBox.transition().style({'opacity' : 1, 'display' : 'none'});
        });

			// A rectangular container and acts as a background for each
			// bar. Extends to the the max data in the x axis.
			eachBar.append('rect')
			  .attr('class', 'bg-gray')
			  .attr('width', chartObj.chartAreaW)
			  .attr('height', chartObj.barH)
			  .attr('transform', function(d, i) {
			    return 'translate(' + chartObj.paddingL + ', '+ i * chartObj.barH +')';
			  })
			  .style('opacity', 0.1);

			// The bar (polygon).
			eachBar.append('polygon')
        .attr('points', function(d, i) {
          var polyObj = {};
            // Draw polygon.
            // * start ********* len *
            // *  fill       title     * point (1/2 bar height)
            // * start ********* len *
            polyObj.start = i * chartObj.barH ;
            // To make the poly more pointed... increase the value.
            polyObj.point = 8;
            polyObj.len = xscale(statData[d]) - polyObj.point;
            polyObj.sep = ',';
            polyObj.spc = ' ';

          return chartObj.paddingL + polyObj.sep + polyObj.start + polyObj.spc +
                 polyObj.len + polyObj.sep + polyObj.start + polyObj.spc +
                 (polyObj.len + polyObj.point) + polyObj.sep + (polyObj.start + Math.round(chartObj.barH/2)) + polyObj.spc +
                 polyObj.len + polyObj.sep + (polyObj.start + chartObj.barH) + polyObj.spc +
                 chartObj.paddingL + polyObj.sep + (polyObj.start + chartObj.barH) + polyObj.spc +
                 chartObj.paddingL + polyObj.sep + polyObj.start;

          })
          .attr('fill', function(d, i) {
            return bgColor(i);
          })
          .attr('filter', 'url(#d-shadow)')
          .style('opacity', 0)
          .transition()
          .duration(function(d, i) {
            return i * 200;
          })
          .ease('back')
          .style('opacity', 1);

			// Label each bar (polygon)
			eachBar.append('text')
        .attr('x', 0)
        .transition()
        .duration(500)
        .text(function(d, i) {
          return d;
        })
        .attr('y', function(d, i) {
          return (i * chartObj.barH) + Math.round(chartObj.barH / 2) + chartObj.rectGutter;
        })
        .attr('x', function(d, i) {
          // 15px right padding.
          return xscale(d3.values(statData)[i]) - 15;
        })
        .attr('text-anchor', 'end')
        .style('font-size', '12px');

      // x axis
      barChartWrapper.append('g')
        .style('opacity', 0.4)
			  .attr('class', 'barchart-axis')
        .attr('transform', function() {
          return 'translate(' + chartObj.paddingL + ',' + ((chartObj.chartAreaH + chartObj.rectGutter) - 1) + ')';
        })
			  .call(xAxis);



      // BEGIN BUBBLE CHART
      var circleInfo = {};
      // Circle information for each data require by bubble chart.
      circleInfo = {
        'Phenotypes'     : {'radius' : 35, 'x' : 195, 'y' : 242},
        'Traits'         : {'radius' : 25, 'x' : 205, 'y' : 185},
        'Genotype Calls' : {'radius' : 50, 'x' : 125, 'y' : 200},
        'Germplasm'      : {'radius' : 39, 'x' : 43,  'y' : 215}
      };

      // Reset stat data array.
      statData = [];
      // Read hidden fields required by bubble chart.
      $('.statset-1').each(function() {
        var tmp = $(this).attr('id');
        statData[tmp.replace('-', ' ')] = $(this).attr('value');
      });

      var bubbleCaption = d3.keys(statData);

      // Create g container in the main bubble chart g container.
      var containerBubble = bubbleChartWrapper
        .selectAll('g')
        .data(bubbleCaption)

      // Create a g container for each data in the statData array
      // to hold each bubble.
      var eachBubble = containerBubble.enter()
        .append('g')
        .attr('transform', function(d) {
          return 'translate(' + circleInfo[d].x + ',' + circleInfo[d].y + ')';
        })
        .on('mousemove', function(d, i) {
          d3.select(this)
            .select('circle')
            .attr('r', function(d) {
               return circleInfo[d].radius - 5;
            })
            .transition()
            .ease('bounce')
            .duration(400)
            .attr('r', function(d) {
               return circleInfo[d].radius;
            });

          infoBox.transition().style({'opacity' : 1, 'display' : 'block'});
          infoBox
            .html(d+ ' : ' + f(statData[d]))
            .style('left', (d3.event.pageX + 10) + 'px')
            .style('top', (d3.event.pageY) + 'px');
        })
        .on('mouseout', function(d) {
          infoBox.transition().style({'opacity' : 0, 'display' : 'none'});
        });

      // Add the circles/bubble for each data in data array.
      eachBubble.append('circle')
        .attr('stroke-width', 8)
        .attr('r', function(d) {
          return circleInfo[d].radius;
        })
        .attr('stroke', function(d, i) {
          return bgColor(i);
        })
        .attr('r', 0)
        .transition()
        .ease('bounce')
        .duration(function(i) {
          return (Math.random() * (2 - 1) + 1) * 800;
        })
        .attr('r', function(d) {
          return circleInfo[d].radius;
        })
        .attr('filter', 'url(#c-glow)');

      // Inner ring.
      eachBubble.append('circle')
        .attr('stroke-width', 1)
        .attr('stroke', function(d, i) {
           return bgColor(i);
        })
        .attr('r', function(d) {
          return circleInfo[d].radius - 6;
        });

      // Center text of each bubble.
      eachBubble.append('text')
        .attr('class', 'bbls-text')
        .text(function(d, i) {
          return formatCount(statData[d]);
        })
        .style('font-size', 0)
        .transition()
        .duration(1000)
        .ease('bounce')
        .style('font-size', function(d){
          return Math.round(circleInfo[d].radius / 1.5) + 'px';
        })
        .attr('dy', '5px');

      // Label each bubble.
      eachBubble.append('text')
        .attr('class', 'bbls-text')
        .text(function(d) {
          return d;
        })
        .style('font-size', 0)
        .transition()
        .duration(1000)
        .ease('bounce')
        .style('font-size', function(d) {
          return (d.length <= 15) ? '10px' : '8px';
        })
        .attr('dy', '15px');


      // Shorten values.
      function formatCount(n) {
        // Values have to be shortened.
        if (n < 1000) {
          // Hundred and less.
          n = n;
        }
        else if (n < 1000000) {
          // Thousand.
          n = Math.round(n / 1000, 0).toFixed(0) + 'K';
        }
        else if (n < 1000000000) {
          // Million.
          n = Math.round(n / 1000000, 0).toFixed(0) + 'M';
        }
        else {
          // Billion.
          n = Math.round(n / 1000000000, 0).toFixed(0) + 'B';
        }

        return n;
      }
    }
  };
})(jQuery);
