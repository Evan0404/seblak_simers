
    <div>
        <h2>Menu</h2>
        <div class="row">
            @if (session()->has('add'))
              <div class="alert alert-primary" role="alert">
                {{ session('add') }}
              </div>
            @elseif(session()->has('up'))
              <div class="alert alert-success" role="alert">
                {{ session('up') }}
              </div>
            @elseif(session()->has('del'))
              <div class="alert alert-danger" role="alert">
                {{ session('del') }}
              </div>
            @endif
            

            <div class="col-md-6">
                <div class="card shadow-lg p-3 mb-3">
                    <h4>Form Menu</h4>
                    @if ($updatestatus == 1)
                        <form method="post" wire:submit.prevent="goupdate({{$idmenu}})">
                    @else
                        <form method="post" wire:submit.prevent="add">
                    @endif
                        <div class="form-floating mb-2">
                            <input type="text" wire:model="nama" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Nama Menu</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" wire:model="harga" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Harga Menu</label>
                        </div>
                        @if ($updatestatus ==1)
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" wire:click="formEmpty()"  class="btn btn-secondary w-100" >Batal</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success w-100" >Update </button>
                                </div>
                            </div>
                        
                        @else
                        <button class="btn btn-primary w-100" >Tambah</button>
                            
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg p-3">
                    <h4>Daftar Menu</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Harga Menu</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu as $item)
                                    <tr>
                                        <td>{{$item -> nama_menu}}</td>
                                        <td>Rp. {{number_format($item -> harga_menu, 0,',', '.')}}</td>
                                        <td>
                                            <button class="btn btn-success" wire:click="update({{$item -> id_menu}})"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del{{$item->id_menu}}"><i class="bi bi-trash3"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="del{{$item->id_menu}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Menu</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              Apakah Anda Yakin Ingin Menghapus Menu ini ?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal" wire:click="delete({{$item->id_menu}})">Hapus</button>
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

