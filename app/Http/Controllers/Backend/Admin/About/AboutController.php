<?php

namespace App\Http\Controllers\Backend\Admin\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\AboutRequest;
use App\Http\Traits\AuditRelationTraits;
use App\Services\About\AboutService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    use AuditRelationTraits;

    protected function redirectIndex(): RedirectResponse
    {
        return redirect()->route('about.index');
    }

    protected function redirectTrashed(): RedirectResponse
    {
        return redirect()->route('about.trash');
    }

    protected AboutService $aboutService;

    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = $this->aboutService->getAbouts();
            return DataTables::eloquent($query)
                ->editColumn('status', fn($about) => "<span class='badge badge-soft {$about->status_color}'>{$about->status_label}</span>")
                ->editColumn('created_by', fn($about) => $this->creater_name($about))
                ->editColumn('created_at', fn($about) => $about->created_at_formatted)
                ->editColumn('action', fn($about) => view('components.admin.action-buttons', ['menuItems' => $this->menuItems($about)])->render())
                ->rawColumns(['status', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.about.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
            ],
            [
                'routeName' => 'about.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
            ],
            [
                'routeName' => 'about.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
            ],

            [
                'routeName' => 'about.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
            ]

        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        try {
            $validated = $request->validated();
            $file = $request->validated('image') && $request->hasFile('image') ? $request->file('image') : null;
            $this->aboutService->createAbout($validated, $file);
            session()->flash('success', 'About created successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'About create failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $data = $this->aboutService->getAbout($id);
        $data['creater_name'] = $this->creater_name($data);
        $data['updater_name'] = $this->updater_name($data);
        return response()->json($data);
    }

    public function status(string $id)
    {
        $about = $this->aboutService->getAbout($id);
        $this->aboutService->toggleStatus($about);
        session()->flash('success', 'About status updated successfully!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['about'] = $this->aboutService->getAbout($id);
        return view('backend.admin.about.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, string $id)
    {
        try {
            $about = $this->aboutService->getAbout($id);

            $validated = $request->validated();
            $file = $request->validated('image') && $request->hasFile('image') ? $request->file('image') : null;
            $this->aboutService->updateAbout($about, $validated, $file);
            session()->flash('success', 'About updated successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'About update failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $about = $this->aboutService->getAbout($id);
            $this->aboutService->delete($about);
            session()->flash('success', 'About deleted successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'About delete failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    public function trash(Request $request)
    {
        if ($request->ajax()) {
            $query = $this->aboutService->getAbouts()->onlyTrashed();

            return DataTables::eloquent($query)
                ->editColumn('deleted_by', fn($about) => $this->deleter_name($about))
                ->editColumn('deleted_at', fn($about) => $about->deleted_at_formatted)
                ->editColumn('action', fn($about) => view('components.admin.action-buttons', [
                    'menuItems' => $this->trashedMenuItems($about),
                ])->render())
                ->rawColumns(['deleted_by', 'deleted_at', 'action'])
                ->make(true);
        }

        return view('backend.admin.about.trash');
    }


    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'about.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
            ],
            [
                'routeName' => 'about.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
            ]

        ];
    }

    public function restore(string $id)
    {
        try {
            $this->aboutService->restore($id);
            session()->flash('success', "About restored successfully");
        } catch (\Throwable $e) {
            session()->flash('About restore failed');
            throw $e;
        }
        return $this->redirectTrashed();
    }

    public function permanentDelete(string $id)
    {
        try {
            $this->aboutService->permanentDelete($id);
            session()->flash('success', "About permanently deleted successfully");
        } catch (\Throwable $e) {
            session()->flash('About permanent delete failed');
            throw $e;
        }
        return $this->redirectTrashed();
    }
}
