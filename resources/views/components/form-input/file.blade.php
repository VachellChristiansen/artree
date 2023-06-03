<div class="mb-3">
    <label class="text-xl font-semibold" for="file-{{ $name }}">{{ $label }}</label><br>
    <input class="w-full px-3 py-1 border-2 rounded-md focus:outline-blue-400" type="file"
    id="file-{{ $name }}" 
    name="{{ $name }}" 
    {{ $required=="true" ? "required" : " " }}
    {{ $disabled=="true" ? "disabled" : " " }}
    ><br>
    @if($note!="")
        <span class="text-sm font-medium text-gray-400 opacity-80">{{ $note }}</span>
    @endif
</div>