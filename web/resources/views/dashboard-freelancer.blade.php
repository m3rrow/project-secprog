<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Freelancer Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }
    header {
      background: #212529;
      color: #fff;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      font-size: 1.5rem;
      margin: 0;
    }
    header nav a {
      color: #fff;
      margin: 0 10px;
      text-decoration: none;
    }
    .summary-card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      text-align: center;
    }
    .summary-card h5 {
      font-size: 1rem;
      color: #6c757d;
    }
    .summary-card h2 {
      margin-top: 10px;
      font-weight: bold;
    }
    footer {
      text-align: center;
      padding: 15px;
      background: #212529;
      color: #fff;
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Dashboard Freelancer</h1>
    <nav>
      <a href="#">Projects</a>
      <a href="#">Messages</a>
    </nav>
    <div>
      <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User" />
      <span>freelancer</span>
    </div>
  </header>

  <main class="container my-4">
    <div class="mb-4 p-4 bg-white rounded shadow-sm d-flex justify-content-between align-items-center">
      <div>
        <h3>Welcome back, freelancer name!</h3>
        <p>You have <strong>2 active</strong> projects and <strong>1 new</strong> offer.</p>
      </div>
      <div>
        <button class="btn btn-primary me-2">View Projects</button>
        <button class="btn btn-outline-secondary">Upload Report</button>
      </div>
    </div>

    <div class="row text-center g-3 mb-4">
      <div class="col-md-3"><div class="summary-card"><h5>Active Projects</h5><h2>3</h2></div></div>
      <div class="col-md-3"><div class="summary-card"><h5>Earnings (Month)</h5><h2>Rp 5.200.000</h2></div></div>
      <div class="col-md-3"><div class="summary-card"><h5>Rating</h5><h2>4.8 ⭐</h2></div></div>
      <div class="col-md-3"><div class="summary-card"><h5>Pending Tasks</h5><h2>2</h2></div></div>
    </div>

    <div class="row g-4">
      <div class="col-lg-8">
        <div class="bg-white p-4 rounded shadow-sm mb-4">
          <h4 class="mb-3">My Projects</h4>
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>Project</th>
                <th>Client</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Progress</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Web Security Audit</td>
                <td>PT CyberSafe</td>
                <td><span class="badge bg-warning">In Progress</span></td>
                <td>25 Okt 2025</td>
                <td><div class="progress"><div class="progress-bar" style="width: 60%">60%</div></div></td>
              </tr>
              <tr>
                <td>Phishing Awareness Training</td>
                <td>Bank XYZ</td>
                <td><span class="badge bg-success">Done</span></td>
                <td>10 Okt 2025</td>
                <td><div class="progress"><div class="progress-bar bg-success" style="width: 100%">100%</div></div></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="bg-white p-4 rounded shadow-sm">
          <h4 class="mb-3">Project Offers</h4>
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>Project</th>
                <th>Description</th>
                <th>Budget</th>
                <th>Deadline</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Penetration Test WebApp</td>
                <td>Audit OWASP Top 10</td>
                <td>Rp 3.500.000</td>
                <td>5 hari</td>
                <td><button class="btn btn-sm btn-primary">Apply</button></td>
              </tr>
              <tr>
                <td>API Vulnerability Review</td>
                <td>Check Auth & Token Flow</td>
                <td>Rp 4.200.000</td>
                <td>7 hari</td>
                <td><button class="btn btn-sm btn-primary">Apply</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="bg-white p-4 rounded shadow-sm mb-4 text-center">
          <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Profile" />
          <h5>freelancer name</h5>
          <p class="text-muted">Web Penetration Tester</p>
          <div class="mb-3">
            <span class="badge bg-info text-dark">Web Pentest</span>
            <span class="badge bg-info text-dark">OSINT</span>
            <span class="badge bg-info text-dark">Python</span>
          </div>
          <button class="btn btn-outline-primary w-100">Edit Profile</button>
        </div>

        <div class="bg-white p-4 rounded shadow-sm mb-4">
          <h5 class="mb-3">Earnings Overview</h5>
          <canvas id="earningsChart"></canvas>
        </div>

        <div class="bg-white p-4 rounded shadow-sm">
          <h5 class="mb-3">Notifications</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">💰 Payment received from Bank XYZ</li>
            <li class="list-group-item">🧾 New project offer: API Review</li>
            <li class="list-group-item">⭐ You got a 5-star review!</li>
          </ul>
        </div>
      </div>
    </div>
  </main>

  <footer>
    &copy; 2025 Freelance Platform. All Rights Reserved.
  </footer>

  <script>
    const ctx = document.getElementById('earningsChart');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        datasets: [{
          label: 'Earnings (Rp)',
          data: [2500000, 3000000, 4200000, 4800000, 5100000, 5200000, 5300000],
          borderColor: '#007bff',
          fill: false,
          tension: 0.2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        },
        scales: {
          y: { beginAtZero: false }
        }
      }
    });
  </script>
</body>
</html>
