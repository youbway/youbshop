<div>
    <h3 class="mt-2">Images:</h3>
    <span wire:click="add" class="btn btn-primary m-4">add</span>
    @if($count >= 1)
        <span wire:click="remove" class="btn btn-danger m-4">remove</span>
    @endif

    @for ($i = 0 ; $i < $count ; $i++)

        <div class="my-4" wire:key="item-{{ $i }}">
            <input wire:key="item-{{ $i }}-si" type="file" name="image[]" class="form-control" id=file" placeholder="Image"  >
        </div>


    @endfor
</div>
