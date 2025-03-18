<?php

namespace App\Livewire\Product;

use App\Models\Products;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductUpdate extends Component
{
    public int $id;
//    public Products $product;

    #[Validate('required')]
    public string $name;
    #[Validate('required')]
    public int $qty;
    #[Validate('required')]
    public string $desc;


    public function mount($id)
    {

        $this->id = $id;
        $productDB = Products::findOrFail($id);
        $this->name = $productDB->name;
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
            'desc' => $this->desc,
        ]);

        session()->flash('message', 'Product updated successfully!');
        return $this->redirect('/product');
    }


    public function render()
    {
        return view('livewire.product.product-update', [
//            "product" => $this->product
        ]);
    }
}
