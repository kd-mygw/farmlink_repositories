<section class="w-full max-w-xl mx-auto">
    <div class="flex flex-col justify-center items-center">
        <header class="mb-4 text-center">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('パスワードの変更') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('安全のために、長くて複雑なパスワードを設定してください。') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 w-full">
            @csrf
            @method('put')

            <div>
                <x-input-label for="update_password_current_password" :value="__('１.現在のパスワードを入力してください')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="update_password_password" :value="__('２.新しいパスワードを入力してください')" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('３.新しいパスワードをもう一度入力してください')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4 justify-center">
                <x-primary-button>{{ __('変更') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</section>
