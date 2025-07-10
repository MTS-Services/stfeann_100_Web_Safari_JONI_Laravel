<?php

namespace App\Services\About;

use App\Http\Traits\FileManagementTrait;
use App\Models\About;
use Illuminate\Support\Facades\DB;

class AboutService
{
    use FileManagementTrait;
public function createOrUpdateAbout(array $data, $file = null, string $identifier = 'title'): About
{
    return DB::transaction(function () use ($data, $file, $identifier) {
        // Check if an About entry exists by unique identifier (e.g. title)
        $existing = About::where($identifier, $data[$identifier])->first();

        if ($file) {
            $data['image'] = $this->handleFileUpload($file, 'abouts', $data[$identifier] ?? 'about');
        }

        if ($existing) {
            // Update logic
            if ($file && $existing->image) {
                $this->fileDelete($existing->image);
            }
            $data['updated_by'] = admin()->id;
            $existing->update($data);
            return $existing;
        }

        // Create logic
        $data['status'] = About::STATUS_ACTIVE;
        $data['created_by'] = admin()->id;
        return About::create($data);
    });
}
}

