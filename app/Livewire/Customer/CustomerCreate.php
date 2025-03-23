<?php

namespace App\Livewire\Customer;

use App\Models\Customers;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;

class CustomerCreate extends Component
{
    #[Validate('required')]
    public string $name;
    #[Validate('required')]
    public string $address;
    #[Validate('required')]
    public string $phone;


    public function onCreate()
    {
        $test=$this->validate();
       $data= Customers::query()->create(
            $this->only(['name', 'address', 'phone'])
        );

        session()->flash('message', 'Customer created successfully');
        return redirect()->route('customer.page');

    }


    public function render(): View
    {
        return view('livewire.customer.customer-create');
    }
}
