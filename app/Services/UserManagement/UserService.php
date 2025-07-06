<?php

namespace App\Services\UserManagement;

use App\Http\Traits\FileManagementTrait;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserService
{
    use FileManagementTrait;

    public function getUsers($orderBy = 'sort_order', $order = 'asc')
    {
        return User::orderBy($orderBy, $order)->latest();
    }
    public function getUser(string $encryptedId): User|Collection
    {
        return User::findOrFail(decrypt($encryptedId));
    }
    public function getDeletedUser(string $encryptedId): User|Collection
    {
        return User::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createUser(array $data, $file = null): User
    {
        return DB::transaction(function () use ($data, $file) {
            if ($file) {
                $data['image'] = $this->handleFileUpload($file, 'users', $data['name']);
            }
            $data['creater_id'] = admin()->id;
            $data['creater_type'] = get_class(admin());
            $user = User::create($data);
            return $user;
        });
    }

    public function updateUser(User $user, array $data, $file = null): User
    {
        return DB::transaction(function () use ($user, $data, $file) {
            if ($file) {
                $data['image'] = $this->handleFileUpload($file, 'users', $data['name']);
                $this->fileDelete($user->image);
            }
            if (isset($data['password'])) {
                $data['password'] = $data['password'] ?? $user->password;
            }
            $data['updater_id'] = admin()->id;
            $data['updater_type'] = get_class(admin());
            $user->update($data);
            return $user;
        });
    }

    public function delete(User $user): void
    {
        $user->update([
            'deleter_id' => admin()->id,
            'deleter_type' => get_class(admin())
        ]);
        $this->fileDelete($user->image);
        $user->delete();
    }

    public function restore(string $encryptedId): void
    {
        $user = $this->getDeletedUser($encryptedId);
        $user->update(['updater_id' => admin()->id, 'updater_type' => get_class(admin())]);
        $user->restore();
    }

    public function permanentDelete(string $encryptedId): void
    {
        $user = $this->getDeletedUser($encryptedId);
         if ($user->image) {
            $this->fileDelete($user->image);
        }
        $user->forceDelete();
    }

    public function toggleStatus(User $user): void
    {
       
        
        $user->update([
            'status' => !$user->status,
            'updater_id' => admin()->id,
            'updater_type' => get_class(admin())
        ]);
    }
}
