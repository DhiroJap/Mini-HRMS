@props(['label', 'desc'])

<div class="space-y-2">
    <label for="{{ $attributes['id'] }}" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">{{ $label }}</label>
    <input {{ $attributes->merge(['class' => 'flex h-10 w-full rounded-md border border-[#E2E8F0] bg-[#FFFFFF] px-3 py-2 text-sm ring-offset-[#FFFFFF] file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-[#595960] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#020817} focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50']) }}>
    <p class="text-sm text-[#595960]">{{ $desc }}</p>
</div>