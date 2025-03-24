<div>
   
    @if ($posts ->count())
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mt-8">

        @foreach ($posts as $post)
        <div>
            
            <a href="{{ route('posts.show', ['post'=> $post, 'user' => $post-> user]) }}">
                
                <img src="{{  asset('uploads') .'/'. $post->imagen }}" alt="imagen del post" 
                
                {{ $post->titulo }}>
            </a>
        </div>
        @endforeach
    </div>
    
    <div class="mt-10">
        {{ $posts->links() }}
    </div> 

    @else
    <p class="text-center">No hay posts, sigue a alguien para poder mostrar sus posts</p>
        
    @endif










</div>