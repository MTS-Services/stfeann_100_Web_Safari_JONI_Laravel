<?php

namespace App\Http\Controllers\Backend\Admin\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\AboutRequest;
use App\Http\Traits\AuditRelationTraits;
use App\Models\About;
use App\Services\About\AboutService;
use Illuminate\Http\RedirectResponse;

class AboutController extends Controller
{
    use AuditRelationTraits;

    protected AboutService $aboutService;
    protected function redirectIndex(): RedirectResponse
    {
        return redirect()->route('about.index');
    }

    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }
    public function index()
    {
        $data['about'] = About::first();
        return view('backend.admin.about.index', $data);
    }

    public function storeOrUpdate(AboutRequest $request)
    {
        try {
            $validated = $request->validated();
            $file = $request->hasFile('image') ? $request->file('image') : null;

            // Use the new method to create or update
            $this->aboutService->createOrUpdateAbout($validated, $file, 'title');

            session()->flash('success', 'About created or updated successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Operation failed!');
            throw $e;
        }

        return $this->redirectIndex();
    }
}
