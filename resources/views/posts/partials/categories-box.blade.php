<div >
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($categories as $category)
         <x-badge
         wire:navigate href="{{ route('posts.index',['category'=> $category->slug]) }}" :textColor="$category->text_Color" bgColor="$category->bg_Color">
            {{$category->title}}
        </x-badge>
        @endforeach
    </div>
</div>
