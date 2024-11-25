<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farm Expert Dashboard</title>
  <style>
    body {
  font-family: sans-serif;
  margin: 0;
  padding: 20px;
  background-color: #f5f5f5;
}

header {
  background-color: #3f51b5;
  color: white;
  padding: 15px;
  text-align: center;
}

h1, h2 {
  margin-bottom: 10px;
}

.overview, .tasks, .charts {
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

.card, .tasks ul li {
  background-color: white;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  padding: 15px;
  margin: 10px;
  width: calc(33% - 20px);
  list-style: none;
}

.charts canvas {
  width: 100%;
  height: 250px;
}

  </style>
</head>
<body>
  <header>
    <h1>Farm Expert Dashboard</h1>
  </header>

  <main>
    <section class="overview">
      <h2>Farm Overview</h2>
      <div class="card">
        <h3>Livestock</h3>
        <p>20 Cows, 50 Chickens, 10 Pigs</p>
      </div>
      <div class="card">
        <h3>Crops</h3>
        <p>5 acres Wheat, 2 acres Corn, 1 acre Vegetables</p>
      </div>
      <div class="card">
        <h3>Weather</h3>
        <p>Temperature: 25°C, Humidity: 60%, Wind: 5 mph</p>
      </div>
    </section>

    <section class="tasks">
      <h2>Today's Tasks</h2>
      <ul>
        <li>Milk the cows (8:00 AM)</li>
        <li>Collect chicken eggs (9:00 AM)</li>
        <li>Water the vegetables (10:00 AM)</li>
        <li>Monitor soil moisture levels (11:00 AM)</li>
      </ul>
    </section>

    <section class="charts">
      <h2>Recent Trends</h2>
      <canvas id="myChart"></canvas> </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Sample chart data (replace with your actual data)
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'],
        datasets: [{
          label: 'Crop Yield',
          data: [100, 120, 115, 130, 125],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>
</html>
