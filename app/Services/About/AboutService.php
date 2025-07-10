<?php

namespace App\Services\About;

use App\Http\Traits\FileManagementTrait;
use App\Models\About;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class AboutService
{
    use FileManagementTrait;

    public function getAbouts($orderBy = 'sort_order', $order = 'asc')
    {
        return About::orderBy($orderBy, $order)->latest();
    }
    public function getAbout(string $encryptedId): About|Collection
    {
        return About::findOrFail(decrypt($encryptedId));
    }
    public function getDeletedAbout(string $encryptedId): About|Collection
    {
        return About::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createAbout(array $data, $file = null): About
    {
        return DB::transaction(function () use ($data, $file) {
            if ($file) {
                $data['image'] = $this->handleFileUpload($file, 'abouts', $data['name'] ?? 'about');
            }
            $data['status'] = About::STATUS_ACTIVE;
            $data['created_by'] = admin()->id;
            $about = About::create($data);
            return $about;
        });
    }

    public function updateAbout(About $about, array $data, $file = null): About
    {
        return DB::transaction(function () use ($about, $data, $file) {
            if ($file) {
                $data['image'] = $this->handleFileUpload($file, 'abouts', $data['name'] ?? 'about');
                $this->fileDelete($about->image);
            }
            $data['updated_by'] = admin()->id;
            $about->update($data);
            return $about;
        });
    }

    public function delete(About $about): void
    {
        $about->update(['deleted_by' => admin()->id]);
        $about->delete();
    }

    public function restore(string $encryptedId): void
    {
        $about = $this->getDeletedAbout($encryptedId);
        $about->update(['updated_by' => admin()->id]);
        $about->restore();
    }

    public function permanentDelete(string $encryptedId): void
    {
        $about = $this->getDeletedAbout($encryptedId);
          if ($about->image) {
            $this->fileDelete($about->image);
        }
        $about->forceDelete();
    }

    public function toggleStatus(About $about): void
    {
        $about->update([
            'status' => !$about->status,
            'updated_by' => admin()->id
        ]);
    }
}

