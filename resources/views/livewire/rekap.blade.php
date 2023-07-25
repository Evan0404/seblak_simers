 <div>
    <h2>Rekap Penghasilan</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-2">
                <h4>Rekap Penjualan per-Bulan</h4>
                <div>
                    <canvas class="w-100" id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-2">
                <h4>Rekap Pengeluaran per-Bulan</h4>
                <div>
                    <canvas class="w-100" id="myChart2"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-2">
                <h4>Daftar Pembelian</h4>
                <p class="mb-0">Cari Berdasarkan Tanggal</p>
                <form method="post">
                    <div class="row">
                       <div iv class="col-4">
                            <p class="mb-0">Dari</p>
                            <input type="date" wire:model="daribulan" class="form-control">
                        </div>
                        <div iv class="col-4">
                            <p class="mb-0">Hingga</p>
                            <input type="date" wire:model="hinggabulan" class="form-control">
                        </div>
                        <div class="col-2">
                            <br>
                            <button class="btn btn-success"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
                <div style="max-height: 800px; overflow:scroll;" class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Nota</td>
                                <td>Total</td>
                                <td>Tanggal</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                                <tr>
                                    <td>{{$item -> nota}}</td>
                                    <td>Rp {{number_format($item -> total, 0,'','.')}}</td>
                                    <td>{{date_format($item->created_at, 'd-M-Y')}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary" wire:click="showdetail('{{$item->nota}}')"><i class="bi bi-eye"></i></button>
                                            <a href="/rekap/{{$item ->id_transaksi}}" type="button" class="btn btn-warning"><i class="bi bi-printer"></i></a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del{{$item ->id_transaksi}}"><i class="bi bi-trash3"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal Hapus-->
                                <div class="modal fade" id="del{{$item ->id_transaksi}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Transaksi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        Nota yang di hapus tidak akan bisa di kembalikan, apakah anda yakin ingin menghapus nota ini ?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form method="post"  wire:submit.prevent="delete('{{$item->nota}}')">
                                            <button class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <center>
                        {{ $transaksi->links() }}
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @if ($nota != '')
                <div class="card shadow-lg p-3 mb-2">
                    <h4>Detail Nota {{$nota}}</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nota</th>
                                    <th>Menu</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kasir as $item)
                                    <tr>
                                        <td>{{$item -> nota}}</td>
                                        <td>{{$item -> nama_menu}}</td>
                                        <td>Rp {{number_format($item->harga, 0,'','.')}}</td>
                                        <td>{{$item -> jumlah}}</td>
                                        <td>Rp {{number_format($item->total, 0,'','.')}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4"><b>Total</b></td>
                                    @foreach ($totalkasir as $item)
                                        <td><b>Rp {{number_format($item -> total, 0, '', '.')}}</b></td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                
            @endif
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
                    label: 'Total Penjualan Per Bulan',
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

            const ctxx = document.getElementById('myChart2');

            new Chart(ctxx, {
                type: 'line',
                data: {
                labels: [
                    <?php foreach ($dataset2 as $label) :?>
                        '{{$label->bulan}}',
                    <?php endforeach;?>
                ],
                datasets: [{
                    label: 'Total Pengeluaran Per Bulan',
                    data: [
                        @foreach($dataset2 as $value)
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
