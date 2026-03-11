<div class="flex flex-col items-center gap-2 mt-6">
    @foreach($keygroups as $keys)
        <div class="flex gap-2">
            @foreach ($keys as $key)
                <button
                    type="submit"
                    name="guess"
                    value="{{ $key }}"
                    @disabled(is_array($disabledKeys) ? in_array($key,$disabledKeys) : $disabledKeys)
                    class="w-12 h-12 border border-gray-400 rounded-md 
                           bg-white text-lg font-semibold 
                           hover:bg-gray-100 active:bg-gray-200 
                           disabled:bg-gray-300 disabled:text-gray-500
                           disabled:border-gray-300
                           transition"
                >
                    {{ $key }}
                </button>
            @endforeach
        </div>
    @endforeach    
</div>