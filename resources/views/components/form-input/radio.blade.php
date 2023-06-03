<div class="mb-3">
    <label class="text-xl font-semibold" for="{{ $label }}">{{ $label }}</label><br>
    @foreach($radioOptions as $option => $check)
    <input class="mr-3 scale-[1.5]" type="radio" 
    id="radio-{{ $name }}" 
    name="{{ $name }}" 
    value="{{ $option }}"
    {{ $check == 'Checked' ? " checked" : "" }}
    {{ $required=="true" ? "required" : " " }}
    {{ $readonly=="true" ? "readonly" : " " }}
    {{ $disabled=="true" ? "disabled" : " " }}
    >
    <label class="text-xl font-semibold" for="radio-{{ $name }}">{{ $option }}</label><br>
    @endforeach
    @if($note!="")
        <span class="text-sm font-medium text-gray-400 opacity-80">{{ $note }}</span>
    @endif
</div>