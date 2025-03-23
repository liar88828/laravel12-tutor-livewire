<?php

namespace App\Livewire\Customer;

use App\Models\Customers;
use Illuminate\View\View;
use Livewire\Component;

class CustomerPage extends Component
{

    public string $search = '';


    public function onDelete($id)
    {
        Customers::destroy($id);
        session()->flash('message', 'Customer Deleted Successfully');
//        return redirect()->back()->with('message', 'Customer Deleted Successfully');
        //route('customer.page');
    }

    public function render(): View
    {
        return view('livewire.customer.customer-page',
        [
            'customers' => Customers::query()->where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
