<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Places") }}
        </h2>
    </x-slot>

    <x-form title="Add Place" tagline="Create your place!" action="{{ route('place.store') }}" name="create-place">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="notes" :value="__('Notes')" />
            <x-text-area-input id="notes" name="notes" type="text" class="mt-1 block w-full" :value="old('notes')" autofocus autocomplete="notes" />
            <x-input-error class="mt-2" :messages="$errors->get('notes')" />
        </div>
        <x-star-rating is-input="true" />
        <div>
            <x-input-label for="images[]" :value="__('Image')" />
            <x-file-input id="images" name="images[]" type="file" accept="image/*" class="mt-1 block w-full" :value="old('image')" autofocus autocomplete="images" multiple />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        @include('places.partials.google-maps')
        <div class="flex items-center gap-4">
            <x-primary-button form="create-place">{{ __('Save') }}</x-primary-button>
        </div>
        
    </x-forms.form>

</x-app-layout>
