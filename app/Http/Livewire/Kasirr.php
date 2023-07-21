<?php

namespace App\Http\Livewire;

use App\Models\kasir;
use App\Models\transaksi;
use App\Models\menu;
use Livewire\Component;

class Kasirr extends Component
{
    public $formStatus;
    
    public $idmenu;
    public $idkasir;
    public $menu;
    public $harga;
    public $jumlah;
    public $sub;
    public $nota;
    public $total;

    public function render()
    {
        $getNota = transaksi::select('id_transaksi')->latest()->first();
        if ($getNota == '') {
            $this->nota = '1TRNSKS';
        }else{
            $this->nota =  $getNota['id_transaksi']+1 . 'TRNSKS';
        }

        $data = [
            'getmenu' => menu::orderBy('created_at', 'desc')->get(),
            'kasir' => kasir::where('status', 'keranjang')->orderBy('id_kasir', 'desc')->get()
        ];
        return view('livewire.kasir', $data)->extends('.layouts.template')->section('content');
    }

    // Add To Cart
        function preadd($id) {
            $getData = menu::where('id_menu', $id)->first();
            $this->menu=$getData['nama_menu'];
            $this->harga=$getData['harga_menu'];
            $this->idmenu=$getData['id_menu'];

        }
        function getsub() {
            $this->sub = $this->harga * $this -> jumlah;
        }
        function add() {
            
            kasir::create([
                'nota' => $this->nota,
                'nama_menu' => $this->menu,
                'harga' => $this->harga,
                'jumlah' => $this->jumlah,
                'total' => $this->sub,
                'status' => 'keranjang'
            ]);
            $this->total= kasir::where('nota', $this->nota)->sum('total');
            $this->menu = '';
            $this->harga = '';
            $this->jumlah = '';
            $this->sub = '';
        }

    // End Add To Cart

    // Update Cart

        function preupdate($id) {
            $getKasir = kasir::where('id_kasir', $id)->first();
            $this->menu = $getKasir['nama_menu'];
            $this->harga = $getKasir['harga'];
            $this->jumlah = $getKasir['jumlah'];
            $this->sub = $getKasir['total'];
            $this->formStatus = 'updateCart';
            $this->idkasir = $getKasir['id_kasir'];
        }

        function cancelupdate() {
            $this->menu = '';
            $this->harga = '';
            $this->jumlah = '';
            $this->sub = '';
            $this->formStatus= '';
            $this->idkasir= '';
        }

        function updatekasir($kasir) {
            kasir::where('id_kasir', $kasir)->update([
                'nama_menu' => $this->menu,
                'harga' => $this->harga,
                'jumlah' => $this->jumlah,
                'total' => $this->sub,
                'status' => 'keranjang'
            ]);
            $this->menu = '';
            $this->harga = '';
            $this->jumlah = '';
            $this->sub = '';
            $this->formStatus= '';
            $this->idkasir= '';
        }

    // End Upadte Cart

    // Delete cart
        function delete($kasir) {
            kasir::where('id_kasir', $kasir)->delete();
        }
    // End Delete Cart

    // Transaksi
        function transaksi() {
            kasir::where('nota', $this->nota)->update([
                'status' => 'transaksi'
            ]);
            transaksi::create([
                'nota' => $this -> nota,
                'total' => $this -> total
            ]);
            $this -> total ='';
        }
    // End Transaksi
}
