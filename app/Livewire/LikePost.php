<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    public function mount($post)
    {
    
        $this->likes = $post->likes->count();
        $this->isLiked = $post->checkLike(Auth::user());
    }

    public function like(){
      
        if($this -> post -> checkLike (Auth::user())){
            $this->post->likes()->where('post_id', $this->  post->id)->delete();
            $this->isLiked = false;
            $this->likes--;

            
        }else{
                   //si utuliza el model directamente
        $this->post->likes()->create([
            'user_id' => Auth::user()->id
        ]);
        $this->isLiked = true;
        $this->likes++;


        }
    }

  
    public function render()
    {
        return view('livewire.like-post', [
            'post' => $this->post // Pasamos el post a la vista del componente
        ]);
    }
}
