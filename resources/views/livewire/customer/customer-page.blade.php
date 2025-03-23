<div class='flex gap-2 sm:gap-4 flex-col'>
    <div class='flex justify-between items-end'>
        <input type="search" class="input sm:input-md input-sm"
               placeholder="Search..."
               wire:model.live.debounce.1000ms="search"/>
        <a href='{{ route('customer.create') }}' class='btn btn-info btn-sm sm:input-md'>Create</a>
    </div>

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table-xs sm:table-sm md:table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <span wire:loading>Saving...</span>
            @foreach ($customers as $customer)
                <tr wire:key="{{ $customer->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->address}}</td>
                    <td class="flex flex-wrap gap-1 justify-center md:justify-start">
                        <a href="{{route('customer.update',$customer->id)}}"
                           class='btn btn-xs sm:btn-sm btn-warning'>Update</a>
                        <button wire:confirm="Are you sure you want to delete this post?"
                                wire:click="onDelete({{$customer->id}})"
                                type="button" class='btn btn-xs sm:btn-sm btn-error'>
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5">
                    {{ $customers->links() }}
                </td>
            </tr>
            </tfoot>
        </table>

    </div>

</div>
