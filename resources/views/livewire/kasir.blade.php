<div>
    <h2>Kasir</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg p-3">
                <center>
                    <h4>Kasir</h4>
                    @if ($formStatus == 'updateCart')
                    <form method="post" wire:submit.prevent="updatekasir({{$idkasir}})">
                    @else
                    <form method="post" wire:submit.prevent="add">
                    @endif
                        <div class="form-floating mb-2">
                            <input wire:model="menu" type="text" class="form-control" readonly id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Menu</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <input wire:model="harga" type="number" class="form-control"  id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Harga</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <input wire:model="jumlah" type="number" class="form-control"  id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Jumlah</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <input wire:model="sub" wire:click="getsub()" type="number" class="form-control"  id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Sub Total</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($formStatus == 'updateCart')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn mb-2 btn-success w-100 h-100">Update</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" wire:click="cancelupdate()" class="btn mb-2 btn-secondary w-100 h-100">Batal</button>
                                        </div>
                                    </div>
                                @else
                                    <button class="btn mb-2 btn-primary w-100 h-100">Tambah</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </center>
            </div>
            <br>
            <div class="card shadow-lg p-0">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-light text-dark"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4>Keranjang</h4>

                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Sub Total</th>
                                                <th>Act</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kasir as $item)
                                                <tr>
                                                    <td>{{$item->nama_menu}}</td>
                                                    <td>Rp. {{number_format($item -> harga, 0,',', '.')}},00</td>
                                                    <td>{{$item->jumlah}}</td>
                                                    <td>Rp. {{number_format($item -> total, 0,',', '.')}},00    </td>
                                                    <td>
                                                        <button class="btn mb-2 btn-success" wire:click="preupdate({{$item->id_kasir}})"><i class="bi bi-pencil-square"></i></button>
                                                        <button class="btn mb-2 btn-danger" wire:click="delete({{$item->id_kasir}})"><i class="bi bi-trash3-fill"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6 mb-2">
                        <input wire:model="nota" type="text" class="form-control w-100" readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input wire:model="total" type="text" class="form-control w-100">
                    </div>
                    <div class="col-md-6">
                        <button class="btn w-100 btn-secondary">Kosongkan</button>
                    </div>
                    <div class="col-md-6">
                        <button data-bs-toggle="modal" data-bs-target="#transaksi" class="btn w-100 btn-primary">Transaksi</button>
                        <!-- Modal -->
                        <div class="modal fade" id="transaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Lakukan Transaksi</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin melakukan transaksi ?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" wire:click="transaksi()">Transaksi</button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg p-3">
                <h4>Menu</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getmenu as $item)
                                <tr>
                                    <td>{{$item -> nama_menu }}</td>
                                    <td>Rp. {{number_format($item -> harga_menu, 0,',', '.')}},00</td>
                                    <td><button class="btn mb-2 btn-success" wire:click="preadd({{$item->id_menu}})"><i class="bi bi-bag-plus-fill"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
