@extends('layouts.template')
@section('content')
    <div>
        <h2>Kasir</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-lg p-3">
                    <center>
                        <h4>Kasir</h4>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" readonly id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Menu</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control"  id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Harga</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control"  id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Jumlah</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control"  id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Sub Total</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary w-100 h-100">Tambah</button>
                            </div>
                        </div>
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
                                                    <th>Total</th>
                                                    <th>Act</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
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
                    <div class="row p-3">
                        <div class="col-md-12 mb-2">
                            <input type="text" class="form-control w-100" readonly>
                        </div>
                        <div class="col-md-6">
                            <button class="btn w-100 btn-secondary">Kosongkan</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn w-100 btn-primary">Transaksi</button>
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
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
@endsection
