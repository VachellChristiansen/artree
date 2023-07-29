<div class="mb-3">
    <label class="text-xl font-semibold" for="text-{{ $name }}">{{ $label }}</label><br>
    <textarea class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400"
    id="text-{{ $name }}" 
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    value="{{ $value }}"
    cols="{{ $cols }}"
    rows="{{ $rows }}"
    {{ $required=="true" ? "required" : " " }}
    {{ $readonly=="true" ? "readonly" : " " }}
    {{ $disabled=="true" ? "disabled" : " " }}
    ></textarea><br>
    @if($note!="")
        <span class="text-sm font-medium text-gray-400 opacity-80">{{ $note }}</span>
    @endif
</div>