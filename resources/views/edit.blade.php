<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-3 py-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="px-3 py-3">Edit Post </h2>
                <form action="{{ route('update', $post->id) }}" method="POST">
                    @csrf
                    <div class="py-2 px-2">
                        <input name="title" type="text"placeholder="Post Title" value="{{$post->title}}">
                    </div>
                    <div class="py-2 px-2 mb-3">
                       <textarea name="content" id="" cols="30" rows="3">
                            {{$post->content}}
                       </textarea> 
                    </div>
                    <button class="px-1 py-2 ml-2 bg-black text-red  text-white rounded" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>