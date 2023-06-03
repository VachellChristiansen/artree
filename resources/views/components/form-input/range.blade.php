<div class="mb-3">
    <label class="text-xl font-semibold" for="range-{{ $name }}">{{ $label }}</label><br>
    @if($showvalue=="true")
        Value: <span id="range-val-{{ $name }}"></span>
    @endif
    <input class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" type="range" onchange="changeVal(this.value);"
    id="range-{{ $name }}" 
    name="{{ $name }}"
    min="{{ $min }}"
    max="{{ $max }}"
    step="{{ $step }}"
    value="{{ $value }}"
    {{ $required=="true" ? "required" : " " }}
    {{ $readonly=="true" ? "readonly" : " " }}
    {{ $disabled=="true" ? "disabled" : " " }}
    ><br>
    @if($note!="")
        <span class="text-sm font-medium text-gray-400 opacity-80">{{ $note }}</span>
    @endif
    <script>
        function changeVal(val) {
            document.getElementById("range-val-{{ $name }}").textContent = val;
        }
    </script>
</div>