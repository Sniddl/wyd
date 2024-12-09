<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Livewire\Layouts\Page;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chain extends Page
{
    use InteractsWithFeed;

    public function mount()
    {
        $this->back = route('post', $this->post);
    }

    public function render()
    {
        return view('livewire.page.chain');
    }

    public function getChain()
    {
        $query = DB::table('posts')
            ->where('id', $this->post->id)
            ->unionAll(
                DB::table('posts as p')
                    ->select('p.*')
                    ->join('parent_chain as pc', 'p.id', '=', 'pc.post_id')
            );

        return DB::table('parent_chain')
            ->withRecursiveExpression('parent_chain', $query)
            ->orderBy('depth', 'asc')
            ->paginate()
            ->map(function ($post) {
                $post = (new Post)->forceFill((array)$post);
                $post->loadMissing('post');
                return $post;
            });
    }

    public function getPosts()
    {
        return $this->post->replies()->with('post')->withCount('replies')->paginate();
    }
}
