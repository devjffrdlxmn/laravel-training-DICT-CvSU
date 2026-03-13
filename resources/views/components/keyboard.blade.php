<div class="flex flex-col items-center gap-2 mt-6">
  @foreach($keygroups as $keys)
    <div class="flex flex-wrap justify-center gap-2 w-full max-w-full">
      @foreach ($keys as $key)
        <button
          type="submit"
          name="guess"
          value="{{ $key }}"
          @disabled(is_array($disabledKeys) ? in_array($key,$disabledKeys) : $disabledKeys)
          class="
            w-8 xs:w-9 sm:w-10 md:w-12 lg:w-14
            h-8 xs:h-9 sm:h-10 md:h-12 lg:h-14
            border border-gray-400 rounded-md
            bg-white text-base sm:text-lg font-semibold
            hover:bg-gray-100 active:bg-gray-200
            disabled:bg-gray-300 disabled:text-gray-500
            disabled:border-gray-300
            transition
          "
        >
          {{ $key }}
        </button>
      @endforeach
    </div>
  @endforeach
</div>