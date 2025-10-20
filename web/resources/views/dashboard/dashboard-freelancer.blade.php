<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Freelancer Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
      :root { --card-bg: #ffffff; --muted: #6c757d; }
      body { background: #f5f7fb; font-family: 'Poppins', sans-serif; color: #222; }
      .page-header { padding: 24px 0; }
      .summary-card { background: var(--card-bg); border-radius: 12px; padding: 18px; box-shadow: 0 6px 18px rgba(19,24,36,0.06); }
      .section-title { font-weight: 600; margin-bottom: 16px; }
      .job-actions .btn { min-width: 110px; }
      .table-job td, .table-job th { vertical-align: middle; }
      .rating-stars { color: #f1c40f; font-size: 1.1rem; }
      .muted { color: var(--muted); }
      .deactivated { opacity: 0.6; text-decoration: line-through; }
    </style>
  </head>
  <body>
    <div class="container page-header">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h2 class="mb-0">Dashboard</h2>
          <small class="muted">Welcome back — here's a summary of your account</small>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#postJobModal">Post a Job</button>
          <a class="btn btn-primary" href="#">View public profile</a>
        </div>
      </div>
    </div>

    <div class="container mb-5">
      <div class="row g-4">
        <!-- LEFT: Jobs, Orders -->
        <div class="col-lg-8">
          <div class="mb-4 summary-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <h5 class="section-title mb-0">Jobs You Posted</h5>
                <small class="muted">Active listings and quick controls</small>
              </div>
              <div class="text-end muted">Total: <strong>3</strong></div>
            </div>

            <div class="table-responsive">
              <table class="table table-job table-hover">
                <thead class="table-light">
                  <tr>
                    <th>Title</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Applicants</th>
                    <th class="text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-job-id="101">
                    <td>
                      <div class="fw-semibold">Web Application Security Audit</div>
                      <div class="muted small">Posted: 3 days ago • Deadline: 20 Nov 2025</div>
                    </td>
                    <td class="text-center"><span class="badge bg-success">Active</span></td>
                    <td class="text-center">5</td>
                    <td class="text-end job-actions">
                      <button class="btn btn-sm btn-outline-secondary" onclick="viewJob(101)">View</button>
                      <button class="btn btn-sm btn-danger" onclick="toggleDeactivate(this,101)">Deactivate</button>
                    </td>
                  </tr>
                  <tr data-job-id="102">
                    <td>
                      <div class="fw-semibold">API Pentest (Auth Flows)</div>
                      <div class="muted small">Posted: 10 days ago • Deadline: 05 Nov 2025</div>
                    </td>
                    <td class="text-center"><span class="badge bg-warning">In Progress</span></td>
                    <td class="text-center">2</td>
                    <td class="text-end job-actions">
                      <button class="btn btn-sm btn-outline-secondary" onclick="viewJob(102)">View</button>
                      <button class="btn btn-sm btn-danger" onclick="toggleDeactivate(this,102)">Deactivate</button>
                    </td>
                  </tr>
                  <tr data-job-id="103">
                    <td>
                      <div class="fw-semibold">Short-term Secure Code Review</div>
                      <div class="muted small">Posted: 2 months ago • Deadline: Completed</div>
                    </td>
                    <td class="text-center"><span class="badge bg-secondary">Closed</span></td>
                    <td class="text-center">8</td>
                    <td class="text-end job-actions">
                      <button class="btn btn-sm btn-outline-secondary" onclick="viewJob(103)">View</button>
                      <button class="btn btn-sm btn-danger" onclick="toggleDeactivate(this,103)">Deactivate</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="mb-4 summary-card">
            <h5 class="section-title">Orders</h5>
            <ul class="nav nav-tabs" id="ordersTab" role="tablist">
              <li class="nav-item" role="presentation"><button class="nav-link active" id="current-tab" data-bs-toggle="tab" data-bs-target="#current" type="button" role="tab">Current Orders</button></li>
              <li class="nav-item" role="presentation"><button class="nav-link" id="past-tab" data-bs-toggle="tab" data-bs-target="#past" type="button" role="tab">Past Orders</button></li>
            </ul>
            <div class="tab-content mt-3">
              <div class="tab-pane fade show active" id="current" role="tabpanel">
                <div class="list-group">
                  <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">Web App Audit — Order #234</div>
                      <div class="muted small">Client: Acme Co — Due: 2025-11-22</div>
                    </div>
                    <div>
                      <span class="badge bg-info me-2">In Progress</span>
                      <button class="btn btn-sm btn-outline-primary">Open</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="past" role="tabpanel">
                <div class="list-group">
                  <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">API Review — Order #190</div>
                      <div class="muted small">Client: Bank XYZ — Completed: 2025-10-12</div>
                    </div>
                    <div>
                      <span class="badge bg-success">Completed</span>
                      <button class="btn btn-sm btn-outline-secondary ms-2">Receipt</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- RIGHT: Earnings, Rating, Quick Stats -->
        <div class="col-lg-4">
          <div class="mb-4 summary-card text-center">
            <h6 class="muted">Monthly Income</h6>
            <h3 class="mt-2">Rp 5.200.000</h3>
            <div class="muted small">Paid this month</div>
            <div class="mt-3">
              <canvas id="miniEarnings" width="300" height="120"></canvas>
            </div>
          </div>

          <div class="mb-4 summary-card text-center">
            <h6 class="muted">Rating</h6>
            <div class="rating-stars mt-2">★★★★★ <span class="small muted">(4.8)</span></div>
            <div class="muted small mt-2">Based on 124 reviews</div>
          </div>

          <div class="summary-card">
            <h6 class="muted">Quick Stats</h6>
            <div class="d-flex justify-content-between mt-3">
              <div>
                <div class="muted small">Active Jobs</div>
                <div class="fw-bold">3</div>
              </div>
              <div>
                <div class="muted small">Open Orders</div>
                <div class="fw-bold">1</div>
              </div>
              <div>
                <div class="muted small">Completed</div>
                <div class="fw-bold">27</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Post Job Modal (frontend placeholder) -->
    <div class="modal fade" id="postJobModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Post a new Job</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="post-job-form">
              <div class="mb-3">
                <label class="form-label">Job Title</label>
                <input class="form-control" placeholder="e.g. Web application pentest" />
              </div>
              <div class="mb-3">
                <label class="form-label">Budget</label>
                <input class="form-control" placeholder="Rp 3.000.000" />
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="4"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="fakePostJob()">Post Job (placeholder)</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function viewJob(id){
        alert('Open job details (placeholder) — job id: ' + id);
      }
      function toggleDeactivate(btn, id){
        const row = btn.closest('tr');
        const deactivated = row.classList.toggle('deactivated');
        btn.textContent = deactivated ? 'Activate' : 'Deactivate';
      }
      function fakePostJob(){
        const modal = new bootstrap.Modal(document.getElementById('postJobModal'));
        modal.hide();
        alert('Job posted (placeholder). Implement server-side create to persist.');
      }

      // Small placeholder chart (no external Chart.js dependency required)
      (function renderMiniChart(){
        const c = document.getElementById('miniEarnings');
        if(!c) return;
        const ctx = c.getContext('2d');
        ctx.fillStyle = '#e9f2ff'; ctx.fillRect(0,0,c.width,c.height);
        ctx.fillStyle = '#007bff';
        [40,60,45,70,55,75,65].forEach((v,i)=>{ ctx.fillRect(10+i*40, c.height - v, 24, v); });
      })();
    </script>
  </body>
</html>
