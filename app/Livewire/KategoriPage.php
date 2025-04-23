<?php

namespace App\Livewire;

use App\Models\Kategori;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kategori - Latihan Toko')]
class KategoriPage extends Component
{
    public function render()
    {
        $kategori = Kategori::where('is_active', true)->get();
        return view('livewire.kategori-page', [
            'kategori' => $kategori
        ]);
    }
}
