{{-- default slot variable --}}
<x-layout>
    @include('layout._posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts" />
        @else
            <h1 class="text-center text-4xl">No Posts Yet. Please Check Back Later.</h1>
        @endif

    </main>
</x-layout>


