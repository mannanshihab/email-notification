<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 flex-1">
            <div class="px-3 py-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
            <h2 class="px-3 py-3">Add Post </h2>
            <form action="{{ route('add-post') }}" method="POST">
                @csrf
                <div class="py-2 px-2">
                    <input name="title" type="text" value="{{old('title')}}" placeholder="Post Title" @error('title') @enderror>
                    @error('title')
                        <span class="text-red-700">{{$message}}</span>
                    @enderror
                </div>
                <div class="py-2 px-2 mb-3">
                    <textarea name="content" id="" cols="30" rows="3"  @error('content') @enderror>
                    {{old('content')}}
                    </textarea>
                    @error('content')
                        <span class="text-red-700">{{$message}}</span>
                    @enderror
                </div>
                <button class="px-1 py-2 ml-2 bg-black text-red  text-white rounded" type="submit">POST</button>
            </form>
            
            <h2 class="px-3 py-3">All Post </h2>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    @foreach ($posts as $post )
                        <li>{{$post->title}} 
                            <a class="text-green-800" 
                            href="{{ route('edit', $post->id) }}">edit</a> 
                            
                        
                            <form action="{{ route('delete', $post->id) }}"    method="POST">
                                @csrf
                            <button>Delete</button>
                            </form>
                        </li>
                    @endforeach
                </div>
            </div>
                
            </div>
        </div>
    </div>
    <div class="py-12 px-6">
       
    </div>
</x-app-layout>