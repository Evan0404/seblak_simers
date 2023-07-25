<div>
    <h1>Dashboard</h1>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-lg mb-2">
                <div class="card-body h-100 p-3">
                    <div class="row">
                        <div class="col-4">
                            <h1 class="text-success"><i class="bi bi-currency-dollar"></i></h1>
                        </div>
                        <div class="col-8">
                            <p class="mb-0" style="font-size: 15px">Total Margin</p>
                            <h5>Rp {{number_format(($totalpenjualan+$totalpemasukan)-$totalpengeluaran, 0, ',', '.')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-1 bg-success">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-lg mb-2">
                <div class="card-body h-100 p-3">
                    <div class="row">
                        <div class="col-4">
                            <h1 class="text-primary"><i class="bi bi-cart-fill"></i></h1>
                        </div>
                        <div class="col-8">
                            <p class="mb-0" style="font-size: 15px">Total Penjualan</p>
                            <h5>Rp {{number_format($totalpenjualan,0,',','.')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-1 bg-primary">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-lg mb-2">
                <div class="card-body h-100 p-3">
                    <div class="row">
                        <div class="col-4">
                            <h1 class="text-info"><i class="bi bi-bag-check-fill"></i></h1>
                        </div>
                        <div class="col-8">
                            <p class="mb-0" style="font-size: 15px">Pemasukan Lain</p>
                            <h5>Rp {{number_format($totalpemasukan,0,',','.')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-1 bg-info">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-lg mb-2">
                <div class="card-body h-100 p-3">
                    <div class="row">
                        <div class="col-4">
                            <h1 class="text-danger"><i class="bi bi-bag-dash-fill"></i></h1>
                        </div>
                        <div class="col-8">
                            <p class="mb-0" style="font-size: 15px">Total Pengeluaran</p>
                            <h5>Rp {{number_format($totalpengeluaran,0,',','.')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-1 bg-danger">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-7">
            <div class="card shadow-lg p-3 mb-3">
                <h4>Penjualan 30 Hari Terakhir</h4>
                <div>
                    <canvas class="w-100" id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow-lg p-3">
                <h4>Penjualan Terakhir</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nota</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $item)
                                <tr>
                                    <td>{{$item -> nota}}</td>
                                    <td>Rp {{number_format($item -> total, 0, '','.')}}</td>
                                    <td>{{date_format($item->created_at, 'd-M-Y')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'line',
                data: {
                labels: [
                    <?php foreach ($dataset as $label) :?>
                        '{{$label->bulan}}',
                    <?php endforeach;?>
                ],
                datasets: [{
                    label: 'Total Penjualan Perhari',
                    data: [
                        @foreach($dataset as $value)
                            '{{$value -> total}}',
                        @endforeach
                    ],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });
        </script>
    @endpush
</div>
