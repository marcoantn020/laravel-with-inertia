<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UploadController extends Controller
{
    public function index()
    {
        return inertia('Uploads/Index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'avatar' => [
                'required',
                File::image()
                ->min(20)
                ->max(12 * 1024)
                ->dimensions(Rule::dimensions()->maxHeight(1000)->maxWidth(2000))
            ]
        ]);

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->store('image', 'public');
        }

        return redirect()
            ->route('upload.index')
            ->with('success','Upload feito com sucesso.');
    }
}
