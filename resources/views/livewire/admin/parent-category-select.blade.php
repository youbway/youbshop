<div>
    <p wire:loading >Chargement de données ...</p>

    <div class="form-group">
        <label for="section">Section</label>
        <select name="section_id" class="form-control" id="section_id" wire:model="section_id" >
            <option value="">...</option>
            @foreach ($sections as $section)
                <option value="{{ $section->id }}" >{{ $section->name }}</option>
            @endforeach
        </select>
    </div>
    @if($parentCategories->count())
        <div class="form-group">
            <label for="parent">Parent Category</label>
            <select name="parent_id" class="form-control" id="parent_id" wire:model="parent_id" >
                <option value="">...</option>
                <option value="0" >Parent Category</option>
                @foreach ($parentCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    @else
        <input type="hidden" name="parent_id"value="0" id="">
    @endif
</div>
