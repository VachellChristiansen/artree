<div class="mb-3">
    <span class="text-xl font-semibold">{{ $label }}</span><br>
    @php
        $i = 1;
    @endphp
    @foreach($radioOptions as $option => $check)
    <input class="mr-3 scale-[1.5]" type="radio" 
    id="radio-{{ $name }}-{{ $i }}" 
    name="{{ $name }}" 
    value="{{ $option }}"
    {{ $check == 'Checked' ? " checked" : "" }}
    {{ $required=="true" ? "required" : " " }}
    {{ $readonly=="true" ? "readonly" : " " }}
    {{ $disabled=="true" ? "disabled" : " " }}
    >
    <label class="text-xl font-semibold" for="radio-{{ $name }}-{{ $i }}">{{ $option }}</label><br>
    @php
        $i++;
    @endphp
    @endforeach
    @if($note!="")
        <span class="text-sm font-medium text-gray-400 opacity-80">{{ $note }}</span>
    @endif
</div>