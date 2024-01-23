
		// Récupération du canvas et création du graphique
		var ctx = document.getElementById('graphique').getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: <?php echo json_encode(array_column($data, 'nom_enseignant')); ?>,
		        datasets: [{
		            label: 'Nombre de jours d\'absence',
		            data: <?php echo json_encode(array_column($data, 'nb_jours_absence')); ?>,
		            backgroundColor: <?php echo json_encode(array_column($data, 'color')); ?>
		        }]
		    },
		    options: {
		    	responsive: true,
		    	maintainAspectRatio: false,
		    	scales: {
		    		yAxes: [{
		    			ticks: {
		    				beginAtZero: true
		    			}
		    		}]
		    	}
		    }
		});
