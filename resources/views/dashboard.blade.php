<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome to your {{ __('Dashboard') }} <span class="text-indigo-500 font-bold">{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        
    </div>
</x-app-layout>
