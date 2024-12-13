<x-guest-layout class="bg-light-green">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('名前')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- ここからフォームの続きは変更ありません -->
        <!-- Farm Name -->
        <div class="mt-4">
            <x-input-label for="farm_name" :value="__('農園名')" />
            <x-text-input id="farm_name" class="block mt-1 w-full" type="text" name="farm_name" :value="old('farm_name')" required />
            <x-input-error :messages="$errors->get('farm_name')" class="mt-2" />
        </div>

        <!-- Farm Address -->
        <div class="mt-4">
            <x-input-label for="farm_address" :value="__('農園住所')" />
            <x-text-input id="farm_address" class="block mt-1 w-full" type="text" name="farm_address" :value="old('farm_address')" required />
            <x-input-error :messages="$errors->get('farm_address')" class="mt-2" />
        </div>

        <!-- Icon -->
        <div class="mt-4">
            <x-input-label for="icon" :value="__('プロフィールアイコン')" />
            <input id="icon" class="block mt-1 w-full" type="file" name="icon" required />
            <x-input-error :messages="$errors->get('icon')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード再確認')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('アカウント登録済みですか？') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('登録する') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
