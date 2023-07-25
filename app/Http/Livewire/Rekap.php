<?php

namespace App\Http\Livewire;

use App\Models\transaksi;
use App\Models\kasir;
use App\Models\pengeluaran;
use App\Models\pemasukan_lain;
use Livewire\Component;
use Livewire\WithPagination;

class Rekap extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $daribulan;
    public $hinggabulan;
    public $nota ='';
    public function render()
    {
        if($this -> daribulan != '' && $this -> hinggabulan != ''){
            $data = [
                'dataset' => transaksi::select(transaksi::raw('SUM(total) as total'), transaksi::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
                'dataset2' => pengeluaran::select(pengeluaran::raw('SUM(pengeluaran) as total'), pengeluaran::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
                'dataset3' => pemasukan_lain::select(pemasukan_lain::raw('SUM(pemasukan) as total'), pemasukan_lain::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
                'transaksi' => transaksi::where('created_at', '>=', $this->daribulan)->where('created_at', '<=', $this->hinggabulan)->latest()->paginate(20),
                'kasir' => kasir::where('nota', $this->nota)->latest()->get(),
                'totalkasir' => transaksi::where('nota', $this->nota)->get()
            ];
        }else{
            $data = [
                'dataset' => transaksi::select(transaksi::raw('SUM(total) as total'), transaksi::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
                'dataset2' => pengeluaran::select(pengeluaran::raw('SUM(pengeluaran) as total'), pengeluaran::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
                'dataset3' => pemasukan_lain::select(pemasukan_lain::raw('SUM(pemasukan) as total'), pemasukan_lain::raw("DATE_FORMAT(created_at, '%M %Y') as bulan"))->groupBy('bulan')->get(),
                'transaksi' => transaksi::latest()->paginate(20),
                'kasir' => kasir::where('nota', $this->nota)->latest()->get(),
                'totalkasir' => transaksi::where('nota', $this->nota)->get()
            ];
        }
        return view('livewire.rekap', $data)->extends('.layouts.template')->section('content');
    }

    public function delete($nota)
    {
        transaksi::where('nota' , $nota)->delete();
        kasir::where('nota', $nota )->delete();
    }

    function showdetail($nota) {
        $this->nota=$nota;
    }
}
