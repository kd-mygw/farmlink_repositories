<div class="flex">
    <!-- Profile Icon -->
    <div class="profile-icon-container">
        @if ($user->icon)
            <label for="icon" class="cursor-pointer">
                <img src="{{ asset('storage/' . $user->icon) }}" alt="Profile Icon">
                <div class="edit-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828L18 9.828V7h-2.828zM4 20h16" />
                    </svg>
                </div>
            </label>
            <input id="icon" name="icon" type="file" class="hidden" onchange="handleIconChange(this)">
        @else
            <!-- No Icon -->
            <label for="icon" class="cursor-pointer">
                <div class="w-32 h-32 rounded-full bg-gray-300 flex items-center justify-center text-gray-500 text-xl shadow-lg">
                    {{ __('No Icon') }}
                </div>
            </label>
            <input id="icon" name="icon" type="file" class="hidden" onchange="handleIconChange(this)">
        @endif
    </div>

    <!-- User Information -->
    <div class="text-center mt-6">
        <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
        <p class="text-sm text-gray-600">{{ $user->email }}</p>
    </div>

    <!-- Profile Form -->
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Name -->
        <label for="name">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>

        <!-- Email -->
        <label for="email">{{ __('Email') }}</label>
        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>

        <!-- Farm Name -->
        <label for="farm_name">{{ __('Farm Name') }}</label>
        <input id="farm_name" name="farm_name" type="text" value="{{ old('farm_name', $user->farm_name) }}" required>

        <!-- Farm Address -->
        <label for="farm_address">{{ __('Farm Address') }}</label>
        <input id="farm_address" name="farm_address" type="text" value="{{ old('farm_address', $user->farm_address) }}" required>

        <!-- Save Button -->
        <button type="submit" class="save-button">{{ __('Save Changes') }}</button>
    </form>
</div>

<script>
function handleIconChange(input) {
    const file = input.files[0];
    if (!file) return;

    // プレビュー表示
    const reader = new FileReader();
    reader.onload = function (e) {
        const img = document.querySelector('label[for="icon"] img');
        if (img) {
            img.src = e.target.result;
        } else {
            // アイコンが設定されていない場合
            const placeholder = document.querySelector('label[for="icon"] .w-32');
            placeholder.innerHTML = `<img src="${e.target.result}" alt="Profile Icon" class="w-32 h-32 rounded-full object-cover">`;
        }
    };
    reader.readAsDataURL(file);

    // サーバーに画像を送信
    const formData = new FormData();
    formData.append('icon', file);
    formData.append('_token', document.querySelector('input[name="_token"]').value); // CSRFトークン

    fetch('{{ route('profile.upload-icon') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Icon uploaded successfully:', data.path);
            } else {
                console.error('Icon upload failed:', data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
</script>
