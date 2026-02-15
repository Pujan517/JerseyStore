<div class="main-panel">
    <div class="content-wrapper">
        <h1 style="color:#fff; font-size:2.3rem; font-weight:800; margin-bottom:32px; text-align:center; letter-spacing:1px;">Admin Dashboard</h1>
        <div class="dashboard-section" style="margin-bottom:40px;">
            <h2 style="color:#fff; font-size:1.4rem; font-weight:700; margin-bottom:18px;"></h2>
            <div class="row" style="display:flex; flex-wrap:wrap; gap:24px; justify-content:center;">
                <!-- Stat Cards -->
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{$total_product}}</h3>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Total Products</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{$total_order}}</h3>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Total Order</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{$total_user}}</h3>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-danger">
                                        <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Total Customers</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">Rs.{{$total_revenue}}</h3>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{ $total_delivered }}</h3>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Order Delivered</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{ $total_processing }}</h3>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Order Processing</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- You can add more dashboard sections here if needed -->
            <!-- Bar Graph Visualization -->
            <div class="dashboard-section" style="margin-bottom:32px; display: flex; justify-content: center; align-items: center; min-height: 60vh;">
                <div>
                    <h2 style="color:#fff; font-size:1.3rem; font-weight:700; margin-bottom:18px; text-align:center;">Overview Chart</h2>
                    <div style="background:#222; border-radius:16px; padding:32px 40px; box-shadow:0 4px 16px rgba(0,0,0,0.22); width:800px; height:600px; display:flex; justify-content:center; align-items:center;">
                        <canvas id="dashboardBarChart" height="400" width="700" style="display:block;"></canvas>
                    </div>
                </div>
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('dashboardBarChart').getContext('2d');
                var dashboardBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total Orders', 'Total Products', 'Order Delivered', 'Order Processing'],
                        datasets: [{
                            label: 'Statistics',
                            data: [
                                parseInt(@json($total_order)),
                                parseInt(@json($total_product)),
                                parseInt(@json($total_delivered)),
                                parseInt(@json($total_processing))
                            ],
                            backgroundColor: [
                                '#1976d2',
                                '#ffb300',
                                '#7e57c2',
                                '#e53935'
                            ],
                            borderColor: [
                                '#90caf9',
                                '#ffe082',
                                '#b39ddb',
                                '#ef9a9a'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: false },
                            title: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: '#333',
                                titleColor: '#fff',
                                bodyColor: '#fff'
                            }
                        },
                        scales: {
                            x: {
                                ticks: { color: '#fff', font: { size: 11 } },
                                grid: { color: '#444' }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: { color: '#fff', font: { size: 11 } },
                                grid: { color: '#444' }
                            }
                        }
                    }
                });
            });
            </script>
    </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
     
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>