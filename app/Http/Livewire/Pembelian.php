<?php

namespace App\Http\Livewire;

use App\Models\pengeluaran;
use Livewire\Component;


class Pembelian extends Component
{
    public $nama;
    public $ket;
    public $jumlah;
    public $formStatus;
    public $idpengeluaran;

    public function render()
    {
        $data = [
            'pengeluaran' => pengeluaran::orderBy('created_at', 'desc')->get()
        ];
        return view('livewire.pembelian', $data)->extends('.layouts.template')->section('content');
    }

    function add() {
        pengeluaran::create([
            'nama_pengeluaran'=> $this->nama,
            'keterangan_pengeluaran'=> $this -> ket,
            'pengeluaran' => $this->jumlah
        ]);
        $this->nama = '';
        $this->ket = '';
        $this->jumlah = '';
    }

    function preupdate($id) {
        $dataUpdate = pengeluaran::where('id_pengeluaran', $id)->first();
        $this->nama = $dataUpdate['nama_pengeluaran'];
        $this->ket = $dataUpdate['keterangan_pengeluaran'];
        $this->jumlah = $dataUpdate['pengeluaran'];
        $this -> formStatus = 'update';
        $this -> idpengeluaran =$id;
    }

    function update($id) {
        pengeluaran::where('id_pengeluaran', $id)->update([
            'nama_pengeluaran'=> $this->nama,
            'keterangan_pengeluaran'=> $this -> ket,
            'pengeluaran' => $this->jumlah
        ]);
        $this->nama = '';
        $this->ket = '';
        $this->jumlah = '';
        $this->formStatus = '';
        $this->idpengeluaran = '';
    }

    public function cancelupdate()
    {
        $this->nama = '';
        $this->ket = '';
        $this->jumlah = '';
        $this->formStatus = '';
        $this->idpengeluaran= '';
    }

    function del($id) {
        pengeluaran::where('id_pengeluaran', $id)->delete();
    }
}
