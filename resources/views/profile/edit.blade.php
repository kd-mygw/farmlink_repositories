@extends('layouts.app')

@section('content')
    <div class="profile-background py-12 flex flex-col justify-center items-center">
        <div class="max-w-4xl w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- プロフィール情報更新 -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-center">
                <div class="max-w-xl w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- パスワード更新 -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-center">
                <div class="max-w-xl w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- アカウント削除 -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-center">
                <div class="max-w-xl w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection