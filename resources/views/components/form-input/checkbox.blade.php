<div class="mb-3">
    <label class="text-xl font-semibold" for="{{ $label }}">{{ $label }}</label><br>
    @php
    $i = 1;
    @endphp
    @foreach($checkboxOptions as $option => $check)
    <input class="mr-3 scale-[1.5]" type="checkbox" 
    id="checkbox-{{ $name }}{{ $i }}" 
    name="{{ $name }}{{ $i }}" 
    value="{{ $option }}"
    {{ $check == 'Checked' ? " checked" : "" }}
    {{ $required=="true" ? "required" : " " }}
    {{ $readonly=="true" ? "readonly" : " " }}
    {{ $disabled=="true" ? "disabled" : " " }}
    >
    <label class="text-xl font-semibold" for="checkbox-{{ $name }}{{ $i }}">{{ $option }}</label><br>
    @php
    $i++;
    @endphp
    @endforeach
    @if($note!="")
        <span class="text-sm font-medium text-gray-400 opacity-80">{{ $note }}</span>
    @endif
</div>