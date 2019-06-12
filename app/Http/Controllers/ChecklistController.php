<?php

namespace MVS\Http\Controllers;

use Illuminate\Http\Request;
use MVS\Http\Controllers\Controller;
use MVS\Checklist;
use MVS\Kunden;

class ChecklistController extends Controller
{
    public function index()
    {
      $checklists = Checklist::latest()->get();
      return view('admin.checklist.index')->with(compact('checklists'));
    }
    public function store(Request $request)
    {
      $this->validate($request, [
          'body' => 'required|max:190',
      ]);
      Checklist::create([
        'body'=>$request->body,
        'is_active'=>1,
      ]);
      return redirect()->route('checklist');
    }
    public function update(Request $request)
    {
      $this->validate($request, [
          'body' => 'required|max:190',
      ]);
      $checklist = Checklist::find($request->data_id);
      if($checklist) {
        $checklist->update([
          'body'=>$request->body,
        ]);
      }
      return redirect()->route('checklist');
    }

    public function delete(Request $request)
    {
      $checklist = Checklist::find($request->data_id);
      if($checklist) {
        $checklist->delete();
        return response()->json(['success'=>true]);
      }
      return response()->json(['success'=>false]);
    }

    public function kundenChecklist(Request $request)
    {
      $checklist = Checklist::find($request->data_id);
      $kunden = Kunden::find($request->kunden_id);
      if($checklist && $kunden) {
        if($request->action == 1) {
          $kunden->checklists()->detach($checklist);
          return response()->json(['success'=>true]);
        } else {
          $kunden->checklists()->attach($checklist);
          return response()->json(['success'=>true]);
        }
      }
      return response()->json(['success'=>false]);
    }
}
