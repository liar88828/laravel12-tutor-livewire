<div class='flex gap-2 sm:gap-4 flex-col'>
    <div class='flex justify-between items-end'>
        {{--        <form class="join" wire:submit='render'>--}}
        <input type="search" class="input sm:input-md input-sm"
               placeholder="Search..."
               wire:model.live.debounce.1000ms="search"/>
        {{--            <span wire:text="search"></span>--}}
        {{--            <button type='submit' class='btn join-item'>Search</button>--}}
        {{--        </form>--}}

        <a href='{{ route('product.create') }}' class='btn btn-info btn-sm sm:input-md'>Create</a>
    </div>

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table-xs sm:table-sm md:table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <span wire:loading>Saving...</span>
            @foreach ($products as $product)
                <tr wire:key="{{ $product->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->desc}}</td>
                    <td class="flex flex-wrap gap-1 justify-center md:justify-start">
                        <a href="{{route('product.update',$product->id)}}"
                           class='btn btn-xs sm:btn-sm btn-warning'>Update</a>
                        <button wire:confirm="Are you sure you want to delete this post?"
                                wire:click="onDelete({{$product->id}})"
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
                    {{ $products->links() }}
                </td>
            </tr>
            </tfoot>
        </table>

    </div>

</div>
