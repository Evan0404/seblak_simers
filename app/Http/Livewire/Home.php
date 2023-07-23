<?php

namespace App\Http\Livewire;

use App\Models\transaksi;
use App\Models\pengeluaran;
use App\Models\pemasukan_lain;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $data = [
            'totalpenjualan' => transaksi::sum('total'),
            'totalpemasukan' => pemasukan_lain::sum('pemasukan'),
            'totalpengeluaran' => pengeluaran::sum('pengeluaran'),
            'dataset' => transaksi::select(transaksi::raw('SUM(total) as total'), transaksi::raw("DATE_FORMAT(created_at, '%d %M %Y') as bulan"))->groupBy('bulan')->limit(30)->get(),
            'penjualan' => transaksi::limit(5)->get()
        ];
        return view('livewire.home', $data)->extends('.layouts.template')->section('content');
    }
}
