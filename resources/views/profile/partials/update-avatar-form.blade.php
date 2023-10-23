<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Avatar') }}
        </h2>

        <img width="170px" class="mt-2 mb-2 rounded-full" src="{{ "/storage/$user->avatar" }}" alt="user-avatar">

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your avatar.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'avatar-updated')
                <p class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Avatar updated.') }}</p>
            @endif
        </div>
    </form>
</section>
