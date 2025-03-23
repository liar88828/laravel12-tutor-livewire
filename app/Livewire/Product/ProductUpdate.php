<?php

namespace App\Livewire\Product;

use App\Models\Products;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductUpdate extends Component
{
    public int $id;
    #[Validate('required')]
    public string $name;
    #[Validate('required')]
    public int $qty;
    #[Validate('required')]
    public int $price;
    #[Validate('required')]
    public string $desc;


    public function mount($id):void
    {

        $this->id = $id;
        $productDB = Products::query()->findOrFail($id);
        $this->name = $productDB->name;
        $this->price = $productDB->price;
        $this->qty = $productDB->qty;
        $this->desc = $productDB->desc;
    }

    public function onUpdate(): null
    {
        $this->validate();
        $productDB = Products::query()->findOrFail($this->id);
        $productDB->update([
            'name' => $this->name,
            'qty' => $this->qty,
            'price' => $this->price,
            'desc' => $this->desc,
        ]);

        session()->flash('message', 'Product updated successfully!');
        return $this->redirect('/product');
    }


    public function render():View
    {
        return view('livewire.product.product-update', [
//            "product" => $this->product
        ]);
    }
}
