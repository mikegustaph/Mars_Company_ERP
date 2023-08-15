<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function template()
    {
        $templates = Template::all();
        $files     = Storage::files('public/uploads');
        foreach($files as $file)
        return view('template.template', compact('templates', 'file'));
    }

    public function store(Request $request)
    {

        $filepdf = $request->file('file');
        $fileName = time().'.'.$filepdf->getClientOriginalExtension();
        $filepdf->storeAs('public/uploads', $fileName);

        $template = new Template();

        $template->name        =  $request->name;
        $template->description =  $request->description;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/files', $fileName);
            $template->file = $fileName;
        }

        $template->save();
        return redirect()->route('template');
    }

}
