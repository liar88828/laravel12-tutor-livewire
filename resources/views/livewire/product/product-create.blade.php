<div>


    <form class="" wire:submit="onCreate">

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Name</legend>
            <input wire:model="name" type="text" class="input w-full {{$errors->has('name') ?'input-error':""}}"
                   placeholder="Please add Name"/>
            @error('name') <span class="fieldset-label text-error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Qty</legend>
            <input wire:model="qty" type="number" class="input w-full {{$errors->has('qty') ?'input-error':""}}"
                   placeholder="Please add qty"/>
            @error('qty') <span class="fieldset-label text-error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Description</legend>
            <textarea wire:model="desc" class="textarea w-full {{$errors->has('desc') ?'input-error':""}}"
                      placeholder="Please add description"></textarea>
            @error('desc') <span class="fieldset-label text-error">{{ $message }}</span> @enderror
        </fieldset>

        <button class="btn btn-block">Submit</button>
        <span wire:loading>Saving...</span>
    </form>

</div>
