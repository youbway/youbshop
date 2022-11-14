<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $items = Section::all();
        return view ('admin.sections.index',compact('items'));
    }

    public function updateSectionStatus(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->status;
            if ($status == "active") {
                $status = 0;
            }
            if ($status == "inactive") {
                $status = 1;
            }

            $item = Section::findOrFail($request->item_id);
            $item->update(["status" => $status]);

            return response()->json(["status" => $status, "item_id" => $request->item_id]);
        }
    }

    public function edit($id)
    {
        $item = Section::findOrFail($id);
        return view('admin.sections.edit', compact('item'));
    }

    public function update($id , Request $request)
    {
        $item = Section::findOrFail($id);
        $request->validate(Section::rules());
        if ($request->status) {
            $request->status = 1;
        } else {
            $request->merge(['status' => 0]);
        }
        $item->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->route('admin.sections')->with('success' , 'Section Added Successfully');
    }

    public function delete($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();
        return redirect()->back()->with(['success' => 'The section has been deleted successfully']);
    }

    public function add()
    {
        return view('admin.sections.add');
    }

    public function store(Request $request)
    {
        $request->validate(Section::rules());
        if ($request->status) {
            $request->status = 1;
        } else {
            $request->merge(['status' => 0]);
        }
        Section::insert([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->back()->with('success' , 'Section Added Successfully');
    }
}
