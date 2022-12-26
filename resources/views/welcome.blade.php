<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
               
            </a>
        </x-slot>
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <h1>Welcome Journey to Laravel & Vue </h1>
            </x-nav-link>
        </div>  
    </x-auth-card>
</x-guest-layout>