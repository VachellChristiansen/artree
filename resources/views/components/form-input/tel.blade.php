<div class="mb-3">
    <label class="text-xl font-semibold" for="tel-{{ $name }}">{{ $label }}</label><br>
    <input class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" type="tel"
    id="tel-{{ $name }}" 
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    value="{{ $value }}"
    {{ $pattern ? "pattern:".$pattern : " " }}
    {{ $required=="true" ? "required" : " " }}
    {{ $readonly=="true" ? "readonly" : " " }}
    {{ $disabled=="true" ? "disabled" : " " }}
    ><br>
    @if($note!="")
        <span class="text-sm font-medium text-gray-400 opacity-80">{{ $note }}</span>
    @endif
</div>