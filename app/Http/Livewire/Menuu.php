<?php

namespace App\Http\Livewire;
use App\Models\menu;
use Livewire\Component;

class Menuu extends Component
{
    public $nama;
    public $idmenu;
    public $harga;
    public $updatestatus=0;
    public $status;


    public function render()
    {
        $data = [
            'no' => 1,
            'menu' => menu::orderBy('created_at', 'desc')->get()
        ];
        return view('livewire.menu', $data)->extends('layouts.template')->section('content');
    }

    public function add()
    {
        menu::create([
            'nama_menu' => $this->nama,
            'harga_menu' => $this->harga
        ]);
        session()->flash('add', 'Berhasil Menambah Menu');
        $this->nama ='';
        $this->harga ='';
    }
    
    function update($id){
        $row = menu::where('id_menu', $id)->first();
        $this->nama = $row->nama_menu;
        $this->harga =$row->harga_menu;
        $this->idmenu =$row->id_menu;
        $this -> updatestatus=1;
        
    }
    
    function goupdate($id){
        menu::where('id_menu', $id)->update([
            'nama_menu' => $this->nama,
            'harga_menu' => $this->harga
        ]);
        $this->idmenu = 0;
        $this -> updatestatus=0;
        $this->nama ='';
        $this->harga ='';
        session()->flash('up', 'Berhasil Mengubah Menu');

    }

    function delete($id) {
        menu::where('id_menu', $id)->delete();
        session()->flash('del', 'Berhasil Menghapus Menu');

    }

    function formEmpty() {
        $this->nama ='';
        $this->harga ='';
        $this->idmenu = 0;
        $this -> updatestatus=0;
    }

}
