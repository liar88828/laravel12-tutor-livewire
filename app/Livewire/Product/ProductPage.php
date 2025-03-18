<?php

namespace App\Livewire\Product;

use App\Models\Products;
use Illuminate\View\View;
use Livewire\Component;

class ProductPage extends Component
{
    public $search = '';

    public function onDelete($id)
    {
        Products::destroy($id);
        session()->flash('message', 'Product deleted successfully!');

    }


//    public function onSearch(): View
//    {
//        return view(
//            'livewire.product.product-page', [
//                'products' => Products::query()->where('name', 'like', "%$this->search%")->paginate(10)]
//        );
//    }

    public function render(): View
    {
        return view(
            'livewire.product.product-page', [
                'products' => Products::query()->where('name', 'like', "%$this->search%")->paginate(10)]
        );
    }
}
