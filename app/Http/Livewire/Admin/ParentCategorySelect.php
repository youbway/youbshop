<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Section;
use Livewire\Component;

class ParentCategorySelect extends Component
{
    public $parentCategories;
    public $parent_id;
    public $section_id;

    public function mount() {
        $this->parentCategories = collect();
    }

    public function updatedSectionId($newId)
    {
        $this->parentCategories = Category::select('id','name')->where('section_id', $newId)->where('parent_id', 0)->where('status', 1)->get();
    }
    public function render()
    {
        $sections = Section::select('id', 'name')->get();
        // dd($this->parentCategories$this->oldParent_id  =  $this->oldParent_id;) ;
        if ($this->section_id) {
            $this->parentCategories = Category::select('id','name')->where('section_id', $this->section_id)->where('parent_id', 0)->where('status', 1)->get();
        }


        return view('livewire.admin.parent-category-select', compact('sections'));
    }
}
