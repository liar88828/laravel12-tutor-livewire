<?php

namespace App\Livewire\Customer;

use App\Models\Customers;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CustomerUpdate extends Component
{
    public int $id;
    #[Validate('required')]
    public string $name;
    #[Validate('required')]
    public string $address;
    #[Validate('required')]
    public string $phone;


    public function mount($id): void

    {
        $this->id = $id;
        $customerDB = Customers::query()->findOrFail($id);
        $this->name = $customerDB->name;
        $this->phone = $customerDB->phone;
        $this->address = $customerDB->address;
    }

    public function onUpdate()
    {
        $this->validate();
        $customerDB = Customers::query()->findOrFail($this->id);
        $customerDB->update(
            $this->only('name', 'address', 'phone')
        );
        session()->flash('message', 'Customer Updated Successfully.');
        return redirect()->route('customer.page');
    }

    public function render(): View
    {
        return view('livewire.customer.customer-update');
    }
}
