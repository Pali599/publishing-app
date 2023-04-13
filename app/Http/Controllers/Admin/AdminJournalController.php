<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JournalFormRequest;
use App\Http\Requests\Admin\EditJournalFormRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Journal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Stringable;

class AdminJournalController extends Controller
{
    public function index()
    {
        $journal = Journal::all();
        return view('admin.journals.index', compact('journal'));
    }
    
    public function create()
    {
        return view('admin.journals.create');
    }

    public function store(JournalFormRequest $request)
    {
        $data = $request->validated();
        $journal = new Journal;
        $journal->title = $data['title'];
        $journal->version = $data['version'];

        if ($request->hasFile('file')) {

            Log::info('Request has a file.');

            $oldFile = $journal->file;
            Log::info("old file is {$oldFile}");
            if ($oldFile) {
                File::delete('uploads/journal/' . $oldFile);
            }
    
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueId = (string) Str::uuid();
            $filename = $originalName . '_' . $uniqueId . '.' . $extension;
            $file->move('uploads/journal/', $filename);

            Log::info("File moved to: uploads/journal/{$filename}");
            $journal->file = $filename;
        }
        
        $journal->created_by = Auth::user()->id;

        $journal->save();

        return redirect('admin/journals')->with('message','Journal Added Successfully');
    }

    public function edit($journal_id)
    {
        $journal = Journal::find($journal_id);
        $user = User::all();

        return view('admin.journals.edit', compact('user','journal'));
    }

    public function update(EditJournalFormRequest $request, $journal_id)
    {
        Log::info('Update method called.');
        $data = $request->validated();

        $journal = Journal::find($journal_id);
        $journal->title = $data['title'];
        $journal->version = $data['version'];

        if ($request->hasFile('file')) {

            Log::info('Request has a file.');

            $oldFile = $journal->file;
            Log::info("old file is {$oldFile}");
            if ($oldFile) {
                File::delete('uploads/journal/' . $oldFile);
            }
    
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueId = (string) Str::uuid();
            $filename = $originalName . '_' . $uniqueId . '.' . $extension;
            $file->move('uploads/journal/', $filename);

            Log::info("File moved to: uploads/journal/{$filename}");
            $journal->file = $filename;
        } 

        $journal->published = $request->published == true ? 'yes':'no';

        $journal->update();

        return redirect('admin/journals')->with('message','Journal updated Successfully');
    }

    public function delete($journal_id)
    {
        $journal = Journal::find($journal_id);
        if($journal)
        {
            $journal->delete();
            return redirect('admin/journals')->with('message','Journal deleted Successfully');
        }
        else
        {
            return redirect('admin/journals')->with('message','No journal ID found');
        }
    }

}
