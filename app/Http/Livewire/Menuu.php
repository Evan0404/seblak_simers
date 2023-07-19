<?php

namespace App\Http\Livewire;
use App\Models\menu;
use Livewire\Component;

class Menuu extends Component
{
    public $nama;
    public $harga;

    public function render()
    {
        return view('livewire.menu')->extends('layouts.template')->section('content');
    }

    public function add()
    {
        menu::create([
            'nama_menu' => $this->nama,
            'harga_menu' => $this->harga
        ]);
        $this->nama ='';
        $this->harga ='';
    }

}
