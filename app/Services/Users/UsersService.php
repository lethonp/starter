<?php

namespace App\Services\Users;

use App\Models\Users\User;
use App\Services\Service;
use Illuminate\Http\Request;
use Okipa\LaravelTable\Table;

class UsersService extends Service implements UsersServiceInterface
{
    /** @inheritDoc */
    public function table(): Table
    {
        $table = (new Table)->model(User::class)->routes([
            'index' => ['name' => 'users.index'],
            'create' => ['name' => 'user.create'],
            'edit' => ['name' => 'user.edit'],
            'destroy' => ['name' => 'user.destroy'],
        ])->disableRows(function (User $user) {
            return $user->id === auth()->id();
        })->destroyConfirmationHtmlAttributes(function (User $user) {
            return [
                'data-confirm' => __('notifications.orphan.destroyConfirm', [
                    'entity' => __('Users'),
                    'name' => $user->name,
                ]),
            ];
        });
        $table->column('thumb')->html(function (User $user) {
            return view('components.admin.table.image', ['image' => $user->getFirstMedia('avatars')]);
        });
        $table->column('first_name')->sortable(true)->searchable();
        $table->column('last_name')->sortable()->searchable();
        $table->column('email')->sortable()->searchable();

        return $table;
    }

    /** @inheritDoc */
    public function saveAvatarFromRequest(Request $request, User $user): void
    {
        if ($request->file('avatar')) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        } elseif ($request->method() !== 'PUT' || $request->remove_avatar) {
            $this->setDefaultAvatar($user);
        }
    }

    /** @inheritDoc */
    public function setDefaultAvatar(User $user): void
    {
        $user->addMedia(database_path('seeds/files/users/default-450-450.png'))
            ->preservingOriginal()
            ->toMediaCollection('avatars');
    }
}
