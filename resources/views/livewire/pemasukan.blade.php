<div>
    <h2>Pemasukan (Dana Masuk)</h2>
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
                <h4>Form pemasukan</h4>
                <hr>
                @if ($formStatus == '')
                    <form method="post" wire:submit.prevent="add">
                @else
                    <form method="post" wire:submit.prevent="update({{$idpemasukan}})">
                @endif
                    <div class="form-floating mb-2">
                        <input type="text" wire:model="nama" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Subjek pemasukan</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea type="text" wire:model="ket" class="form-control" style="min-height: 150px;" id="floatingInput" placeholder="name@example.com"></textarea>
                        <label for="floatingInput">Keterangan pemasukan</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="number" wire:model="jumlah" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Nominal</label>
                    </div>
                    @if ($formStatus == '')
                        <button class="btn btn-primary w-100">Konfirmasi Pemasukan</button>
                     @else
                     <div class="row">
                        <div class="col-md-6">
                            <button type="button" wire:click="cancelupdate()"  class="btn btn-secondary w-100">Batal</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success w-100">Update Pemasukan</button>
                        </div>
                     </div>
                     @endif
                    </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-lg p-2">
                <h4>Daftar Pemasukan</h4>
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
                            @foreach ($pemasukan as $item)
                                <tr>
                                    <td>{{$item -> nama_pemasukan}}</td>
                                    <td>{{$item -> keterangan_pemasukan}}</td>
                                    <td>{{number_format($item -> pemasukan, 0, ',','.')}}</td>
                                    <td>{{date_format($item -> created_at, 'd-M-Y')}}</td>
                                    <td>
                                        <button wire:click="preupdate({{$item->id_pemasukan}})" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                        <button data-bs-toggle="modal" data-bs-target="#del{{$item -> id_pemasukan}}"  class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="del{{$item -> id_pemasukan}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus pemasukan</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Pemasukan yang dihapus tidak akan bisa dikembalikan, apakah anda yakin ingin menghapus data ini ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" wire:click="del({{$item->id_pemasukan}})" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
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