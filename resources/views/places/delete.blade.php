<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Places") }}
        </h2>
    </x-slot>

    <x-form name="delete-place" title="{{ __('Delete') }} {{ $place->name }}" action="{{ route('place.destroy', $place->id) }}">
        @csrf
        <h3 class="text-gray-900 dark:text-gray-100">Confirm you wish to delete {{ $place->name }}</h3>
        <x-danger-button class="mt-4" form="delete-place" :text="__('Delete Place')" />
    </x-form>
</x-app-layout>