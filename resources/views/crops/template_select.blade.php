@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>テンプレート選択: {{ $crop->product_name }}</h1>

        <form action="{{ route('crops.templates.update', $crop->id) }}" method="POST">
          @csrf
          <div class="template-selection">
              @foreach ($templates as $template)
                  <div class="template-option">
                      <label>
                          <input type="radio" name="template_id" value="{{ $template->id }}" 
                                data-preview-url="{{ route('crops.preview', $template->blade_file) }}">
                          {{ $template->name }}
                      </label>
                  </div>
              @endforeach
          </div>

          <!-- プレビュー表示領域 -->
          <div class="template-preview">
              <h3>プレビュー</h3>
              <iframe id="template-preview-iframe" src="{{ route('crops.preview', $templates->first()->blade_file) }}" style="width: 100%; height: 400px; border: 1px solid #ccc;"></iframe>
          </div>

          <button type="submit" class="btn btn-primary mt-3">保存</button>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const radioButtons = document.querySelectorAll('input[name="template_id"]');
        const previewIframe = document.getElementById('template-preview-iframe');

        // ラジオボタンの変更イベントにリスナーを追加
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function () {
                const previewUrl = this.dataset.previewUrl; // 選択されたテンプレートのプレビューURL
                previewIframe.src = previewUrl; // プレビューを切り替え
            });
        });
    });
</script>

<style>
  .template-selection {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.template-option {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
}

.template-option:hover {
    background-color: #f9f9f9;
}

.template-preview {
    margin-top: 20px;
    text-align: center;
}

.template-preview img {
    max-width: 100%;
    max-height: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

</style>