<div>
    <h2>Pembelian (Dana Keluar)</h2>
    <br>
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="card shadow-lg ">
                <div class="card-body p-3">

                </div>
                <div class="card-footer bg-success p-1"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-body p-3">

                </div>
                <div class="card-footer bg-success p-1"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-body p-3">

                </div>
                <div class="card-footer bg-success p-1"></div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-5 mb-2">
            <div class="card shadow-lg p-3">
                <h4>Form Pengeluaran</h4>
                <hr>
                @if ($formStatus == '')
                    <form method="post" wire:submit.prevent="add">
                @else
                    <form method="post" wire:submit.prevent="update({{$idpengeluaran}})">
                @endif
                    <div class="form-floating mb-2">
                        <input type="text" wire:model="nama" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Subjek Pengeluaran</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea type="text" wire:model="ket" class="form-control" style="min-height: 150px;" id="floatingInput" placeholder="name@example.com"></textarea>
                        <label for="floatingInput">Keterangan Pengeluaran</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="number" wire:model="jumlah" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Nominal</label>
                    </div>
                    @if ($formStatus == '')
                        <button class="btn btn-primary w-100">Konfirmasi Pengeluaran</button>
                     @else
                     <div class="row">
                        <div class="col-md-6">
                            <button type="button"  class="btn btn-secondary w-100">Batal</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success w-100">Update Pengeluaran</button>
                        </div>
                     </div>
                     @endif
                    </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-lg p-2">
                <h4>Daftar   Pengeluaran</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subjuct</th>
                                <th>Ket</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengeluaran as $item)
                                <tr>
                                    <td>{{$item -> nama_pengeluaran}}</td>
                                    <td>{{$item -> keterangan_pengeluaran}}</td>
                                    <td>{{number_format($item -> pengeluaran, 0, ',','.')}}</td>
                                    <td>{{date_format($item -> created_at, 'd-M-Y')}}</td>
                                    <td>
                                        <button wire:click="preupdate({{$item->id_pengeluaran}})" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                        <button data-bs-toggle="modal" data-bs-target="#del{{$item -> id_pengeluaran}}"  class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="del{{$item -> id_pengeluaran}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Pengeluaran</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Pengeluaran yang dihapus tidak akan bisa dikembalikan, apakah anda yakin ingin menghapus data ini ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" wire:click="del({{$item->id_pengeluaran}})" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>