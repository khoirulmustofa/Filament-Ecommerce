<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Produk;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Produk - Latihan Toko')]
class ProdukPage extends Component
{
    use WithPagination;
    use LivewireAlert;


    #[Url]
    public $selected_kategori = [];

    #[Url]
    public $selected_brand = [];

    #[Url]
    public $featured;

    #[Url]
    public $in_stock;

    #[Url]
    public $price_range = 0;

    #[Url]
    public $sort = 'latest';

    // Add cart
    public function addToCart($productId) {
        $total_count = CartManagement::addItemToCart($productId);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Produk ditambahkan ke keranjang', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
    public function render()
    {
        $produk = Produk::where('is_active', true);
        
        if(!empty($this->selected_kategori)){
            $produk->whereIn('kategori_id', $this->selected_kategori);
        }
        if(!empty($this->selected_brand)){
            $produk->whereIn('brand_id', $this->selected_brand);
        }

        if($this->featured){
            $produk->where('is_featured', true);
        }

        if($this->in_stock){
            $produk->where('in_stock', true);
        }

        if($this->price_range){
            $produk->whereBetween('price', [0, $this->price_range]);
        }

        if ($this->sort == 'price') {
            $produk->orderBy('price', 'asc');
        }

        if ($this->sort == 'latest') {
            $produk->orderBy('created_at', 'desc');
        }

        $produk = $produk->paginate(5);

        return view('livewire.produk-page', [
            'produk' => $produk,
            'brand' => Brand::where('is_active', true)->orderBy('name', 'asc')->get(['id', 'name', 'slug']),
            'kategori' => Kategori::where('is_active', true)->orderBy('name', 'asc')->get(['id', 'name', 'slug']),
        ]);
    }
}
