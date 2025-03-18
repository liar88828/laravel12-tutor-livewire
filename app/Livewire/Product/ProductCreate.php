<?php

namespace App\Livewire\Product;

use App\Models\Products;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductCreate extends Component
{
    #[Validate('required')]
    public string $name;
    #[Validate('required')]
    public int $qty;
    #[Validate('required')]
    public string $desc;

    public function onCreate(): null
    {
        $this->validate();

        Products::query()->create(
            $this->only(['name', 'qty', 'desc'])
        );
        session()->flash('message', 'Product create successfully!');
        return $this->redirect('/product');
    }

    public function render():View
    {
        return view('livewire.product.product-create');
    }
}
