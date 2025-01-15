@extends('layouts.app')

@section('content')
<div class="field-registration-container">
        <h1 class="field-registration-title">新規商品の登録</h1>

        <form action="{{ route('crops.store') }}" method="POST" enctype="multipart/form-data" class="field-registration-form">
            @csrf

            {{-- 1) 作付けを選択する項目を追加 --}}
            <div class="form-group">
                <label for="cropping_select">作付けを選択</label>
                <select class="form-select" id="cropping_select" name="cropping_id">
                    <option value="">作付けを選んでください</option>
                    @foreach($croppings as $cropping)
                        <option value="{{ $cropping->id }}">
                            {{ $cropping->name }} ({{ optional($cropping->item)->crop_name }})
                        </option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500">選択すると以下の品種名・栽培方法が自動で入力されます</p>
            </div>

            {{-- 以下は既存のまま --}}

            <div class="form-group">
                <label for="product_name" class="crop-form-label">商品名</label>
                <input type="text" class="form-input" id="product_name" name="product_name"
                        placeholder="例：新鮮トマト" required>
            </div>

            <div class="form-group">
                <label for="name" class="crop-form-label">品種名</label>
                <input type="text" class="form-input" id="name" name="name" placeholder="例：桃太郎" required>
            </div>

            <div class="form-group">
                <label for="cultivation_method" class="crop-form-label">栽培方法</label>
                <select class="form-select" id="cultivation_method" name="cultivation_method" required>
                    <option value="">栽培方法を選択してください</option>
                    <option value="有機栽培">有機栽培</option>
                    <option value="特別栽培">特別栽培</option>
                    <option value="慣行栽培">慣行栽培</option>
                    <option value="自然栽培">自然栽培</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fertilizer_info" class="crop-form-label">使用した肥料情報</label><br>
                @foreach($pesticides as $pesticide)
                    <label>
                        <input type="checkbox" name="pesticides[]" value="{{ $pesticide->id }}">
                        {{ $pesticide->name ?? '名称不明' }}
                    </label><br>
                @endforeach
            </div>

            <div class="form-group">
                <label for="pesticide_info" class="crop-form-label">使用した農薬情報</label>
                @foreach($fertilizers as $fertilizer)
                    <label>
                        <input type="checkbox" name="fertilizers[]" value="{{ $fertilizer->id }}">
                        {{ $fertilizer->name ?? '名称不明' }}
                    </label><br>
                @endforeach
            </div>

            <div class="form-group">
                <label for="description" class="crop-form-label">アピールポイント（魅力）</label>
                <textarea class="form-input" name="description" id="description" placeholder="商品の魅力や特徴を記述"></textarea>
            </div>

            <div class="form-group">
                <label for="cooking_tips" class="crop-form-label">おすすめの調理法</label>
                <textarea class="form-input" name="cooking_tips" id="cooking_tips" placeholder="例：サラダや煮込み料理"></textarea>
            </div>

            <div class="form-group">
                <label for="images" class="crop-form-label">画像をアップロード</label>
                <input type="file" class="crop-form-control" id="images" name="images[]" multiple>
            </div>

            <div class="form-group">
                <label for="video" class="crop-form-label">動画をアップロード</label>
                <input type="file" class="crop-form-control" id="video" name="video">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-submit">登録</button>
            </div>
        </form>
</div>

{{-- Ajaxのスクリプト --}}
<script>
    document.getElementById('cropping_select').addEventListener('change', function() {
        const croppingId = this.value;
        if (!croppingId) {
            // 未選択なら何もしない
            return;
        }
        // /api/croppings/{id}/info のようなAPIを用意しておく想定
        fetch(`/api/croppings/${croppingId}/info`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // data から 品種名、栽培方法、肥料や農薬などを取得してフォームに反映
                document.getElementById('name').value = data.variety_name || '';
                document.getElementById('cultivation_method').value = data.cultivation_method || '';
                document.getElementById('fertilizer_info').value = data.fertilizer_info || '';
                document.getElementById('pesticide_info').value = data.pesticide_info || '';
            })
            .catch(err => console.error(err));
    });
</script>
@endsection
