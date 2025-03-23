<div>
    <form class="grid gap-2" wire:submit="onCreate">

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Name</legend>
            <input wire:model="name" type="text" class="input w-full {{$errors->has('name') ?'input-error':""}}"
                   placeholder="Please add Name"/>
            @error('name') <span class="fieldset-label text-error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Phone</legend>
            <input wire:model="phone" type="tel" class="input w-full {{$errors->has('phone') ?'input-error':""}}"
                   placeholder="Please add Phone"/>
            @error('phone') <span class="fieldset-label text-error">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Address</legend>
            <textarea wire:model="address" class="textarea w-full {{$errors->has('address') ?'input-error':""}}"
                      placeholder="Please add address"></textarea>
            @error('address') <span class="fieldset-label text-error">{{ $message }}</span> @enderror
        </fieldset>

        <button class="btn btn-block btn-info ">Submit</button>
        <span wire:loading>Saving...</span>
    </form>

</div>
