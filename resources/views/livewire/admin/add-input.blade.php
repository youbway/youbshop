<div>

    <h3 class="mt-2">Attributes:</h3>
    <span wire:click="add" class="btn btn-primary m-4">add</span>
    @if($count >= 1)
        <span wire:click="remove" class="btn btn-danger m-4">remove</span>
    @endif

    @for ($i = 0 ; $i < $count ; $i++)

            <div class="my-4" wire:key="item-{{ $i }}">
                <input wire:key="item-{{ $i }}-si" type="text" name="size[]" class="form-control" id="size" placeholder="Size"  >
                <input wire:key="item-{{ $i }}-sku" type="text" name="sku[]" class="form-control" id="sku" placeholder="sku" >
                <input wire:key="item-{{ $i }}-pr" type="text" name="price[]" class="form-control" id="price" placeholder="Price"  >
                <input wire:key="item-{{ $i }}-st" type="text" name="stock[]" class="form-control" id="stock" placeholder="Stock" >
            </div>


    @endfor

</div>
