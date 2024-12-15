<button {{ $attributes->merge(['type' => 'submit', 'class' => 'save-button']) }}>
    {{ $slot }}
</button>
