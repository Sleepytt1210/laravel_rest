<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Update the user's avatar.
     */
    public function update(UpdateAvatarRequest $request): RedirectResponse
    {
        $file = $request->file('avatar'); # To get the file data from the 'avatar' input field
        $path = $file->store('avatars', 'public'); # Success storage of this file will return the relative path
        
        if($oldAvatar = $request->user()->avatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar'=> $path]);
        
        return redirect(route('profile.edit'))->with('status', 'avatar-updated');
    }
}
