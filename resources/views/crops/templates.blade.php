@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">テンプレート選択</h1>
        <p class="text-lg text-gray-600">{{ $crop->product_name }}</p>
    </div>

    <form action="{{ route('crops.templates.update', $crop->id) }}" method="POST" class="grid grid-cols-2 gap-8">
        @csrf
        <!-- 左カラム: テンプレート選択 -->
        <div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
                <div class="p-6">
                    <!-- デフォルトテンプレート -->
                    <div class="template-option">
                        <input type="radio" name="template_id" id="default" value="" 
                               data-preview-url="{{ route('crops.preview',['id' => $crop->id, 'template' => 'default']) }}"
                               {{ is_null($crop->template_id) ? 'checked' : '' }}
                               class="sr-only peer">
                        <label for="default" class="template-label">
                            <div>
                                <p class="font-medium">デフォルトテンプレート</p>
                                <p class="text-sm text-gray-500">基本的なレイアウト</p>
                            </div>
                            <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </label>
                    </div>

                    <!-- 他のテンプレート -->
                    @foreach ($templates as $template)
                    <div class="template-option">
                        <input type="radio" name="template_id" id="template_{{ $template->id }}" 
                               value="{{ $template->id }}"
                               data-preview-url="{{ route('crops.preview', ['id' => $crop->id, 'template' => $template->blade_file]) }}"
                               {{ $crop->template_id == $template->id ? 'checked' : '' }}
                               class="sr-only peer">
                        <label for="template_{{ $template->id }}" class="template-label">
                            <div>
                                <p class="font-medium">{{ $template->name }}</p>
                                <p class="text-sm text-gray-500">カスタムテンプレート</p>
                            </div>
                            <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn-success items-center set-template-button">
                このテンプレートを使用する
            </button>
        </div>
        <!-- 右カラム: プレビュー -->
        <div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium mb-2">プレビュー</h3>
                        <select id="resize-options" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="small">スマートフォン (小)</option>
                            <option value="medium" selected>スマートフォン (中)</option>
                            <option value="large">スマートフォン (大)</option>
                        </select>
                    </div>

                    <div class="bg-gray-100 rounded-xl p-2">
                        <iframe 
                            id="template-preview-iframe"
                            src="{{ route('crops.preview', ['id' => $crop->id, 'template' => 'default']) }}"
                            class="preview-frame"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const radioButtons = document.querySelectorAll('input[name="template_id"]');
    const previewIframe = document.getElementById('template-preview-iframe');
    const resizeOptions = document.getElementById('resize-options');

    // テンプレート選択時のプレビュー更新
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function () {
            const previewUrl = this.dataset.previewUrl;
            if (previewUrl) {
                previewIframe.src = previewUrl;
            }
        });
    });

    // プレビューサイズの切り替え
    resizeOptions.addEventListener('change', function () {
        const value = this.value;
        const sizes = {
            small: { width: '320px', height: '568px' },
            medium: { width: '375px', height: '667px' },
            large: { width: '414px', height: '896px' }
        };

        if (sizes[value]) {
            previewIframe.style.width = sizes[value].width;
            previewIframe.style.height = sizes[value].height;
        }
    });
});
</script>

<style>
/* テンプレート選択のスタイル */
.template-option {
    margin-bottom: 0.5rem;
}

.template-label {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 0.2s;
}

.template-label:hover {
    background-color: #f9fafb;
}

.check-icon {
    opacity: 0;
    color: #2563eb;
    transition: opacity 0.2s;
}

input:checked + .template-label {
    border-color: #2563eb;
    background-color: #eff6ff;
}

input:checked + .template-label .check-icon {
    opacity: 1;
}

/* プレビューフレームのスタイル */
.preview-frame {
    width: 375px;
    height: 667px;
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    margin: 0 auto;
    display: block;
    transition: all 0.3s ease;
}

/* レスポンシブデザイン */
@media (max-width: 768px) {
    .preview-frame {
        width: 320px;
        height: 568px;
    }
    .container{
        flex-direction: column;
    }

    .container > div{
        max-width: 100%;
    }
}

@media (min-width: 601px) and (max-width: 1024px) {
    .preview-frame {
        width: 375px;
        height: 667px;
    }
}

/* プレビューサイズ切り替えのスクリプト用スタイル */
select#resize-options {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
}

/* アクセシビリティ対応 */
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
}

.container{
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    
    gap: 2rem;
}

.container > div{
    flex: 1;
    max-width: 50%;
}

.set-template-button{
    margin-bottom: 1rem;
}
</style>