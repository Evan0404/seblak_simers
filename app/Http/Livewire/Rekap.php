<?php

namespace App\Http\Livewire;

use App\Models\transaksi;
use App\Models\kasir;
use App\Models\pengeluaran;
use App\Models\pemasukan_lain;
use Livewire\Component;

class Rekap extends Component
{
    public function render()
    {
        $data = [
            'dataset' => transaksi::select(transaksi::raw('SUM(total) as total'), transaksi::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
            'dataset2' => pengeluaran::select(pengeluaran::raw('SUM(pengeluaran) as total'), pengeluaran::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
            'dataset3' => pemasukan_lain::select(pemasukan_lain::raw('SUM(pemasukan) as total'), pemasukan_lain::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
            'transaksi' => transaksi::latest()->get()
        ];
        return view('livewire.rekap', $data)->extends('.layouts.template')->section('content');
    }

    public function delete($nota)
    {
        transaksi::where('nota' , $nota)->delete();
        kasir::where('nota', $nota )->delete();
    }
}
