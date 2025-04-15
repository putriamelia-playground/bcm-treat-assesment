<x-filament-widgets::widget>
    <x-filament::section>

        {{-- <x-slot name="heading"> --}}
        Kode Assessment {{ auth()->user()->current_assessment_code }}
        {{-- </x-slot> --}}

        {{-- <h1>Nama Perusahaan: {{ $widgetData["company_name"] }}</h1>
        <h1>Nama Gedung: {{ $widgetData["building_name"] }}</h1>
        <h1>Tahun Pembangunan: {{ $widgetData["build_year"] }}</h1>
        <h1>Tahun Penggunaan: {{ $widgetData["use_year"] }}</h1> --}}
    </x-filament::section>
</x-filament-widgets::widget>
