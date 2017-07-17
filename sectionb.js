google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart(){
	
	var data = new google.visualization.DataTable();
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Count');
	  for(var i=0;i<categories.length;i++){
		  data.addRows([[categories[i], parseInt(count[i])]]);
	  }
      var options = {'title':'Number of Books in each Category',
                     'width':600,
                     'height':450};

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);

	 
}