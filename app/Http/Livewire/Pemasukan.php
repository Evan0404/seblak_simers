<?php

namespace App\Http\Livewire;

use App\Models\pemasukan_lain;
use Livewire\Component;


class Pemasukan extends Component
{
    public $nama;
    public $ket;
    public $jumlah;
    public $formStatus;
    public $idpemasukan;

    public function render()
    {
        $data = [
            'pemasukan' => pemasukan_lain::orderBy('created_at', 'desc')->get()
        ];
        return view('livewire.pemasukan', $data)->extends('.layouts.template')->section('content');
    }

    function add() {
        pemasukan_lain::create([
            'nama_pemasukan'=> $this->nama,
            'keterangan_pemasukan'=> $this -> ket,
            'pemasukan' => $this->jumlah
        ]);
        $this->nama = '';
        $this->ket = '';
        $this->jumlah = '';
    }

    function preupdate($id) {
        $dataUpdate = pemasukan_lain::where('id_pemasukan', $id)->first();
        $this->nama = $dataUpdate['nama_pemasukan'];
        $this->ket = $dataUpdate['keterangan_pemasukan'];
        $this->jumlah = $dataUpdate['pemasukan'];
        $this -> formStatus = 'update';
        $this -> idpemasukan =$id;
    }

    function update($id) {
        pemasukan_lain::where('id_pemasukan', $id)->update([
            'nama_pemasukan'=> $this->nama,
            'keterangan_pemasukan'=> $this -> ket,
            'pemasukan' => $this->jumlah
        ]);
        $this->nama = '';
        $this->ket = '';
        $this->jumlah = '';
        $this->formStatus = '';
        $this->idpemasukan = '';
    }
    
    public function cancelupdate()
    {
        $this->nama = '';
        $this->ket = '';
        $this->jumlah = '';
        $this->formStatus = '';
        $this->idpemasukan = '';
    }

    function del($id) {
        pemasukan_lain::where('id_pemasukan', $id)->delete();
    }
}
