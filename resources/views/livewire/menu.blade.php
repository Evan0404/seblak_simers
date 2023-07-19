
    <div>
        <h2>Menu</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-lg p-3">
                    <h4>Form Menu</h4>
                    <form method="post" wire:submit.prevent="add">
                        <div class="form-floating mb-2">
                            <input type="text" wire:model="nama" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Nama Menu</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" wire:model="harga" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Harga Menu</label>
                        </div>
                        <button class="btn btn-primary w-100" >Tambah</button>
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
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

