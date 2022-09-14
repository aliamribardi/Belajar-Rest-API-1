<?php

namespace App\Http\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        parent::__construct($post);
        $this->post = $post;
    }

    public function indexPost()
    {
        $result = $this->post->all();
        return $result;
    }

    public function storePost($request)
    {
        return DB::transaction(function () use ($request) {
            $save = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            $result = $this->store($save);
            return $result;
        });
    }

    public function updatePost($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            // $update = [
            //     'name' => $request->name,
            //     'email' => $request->email,
            // ];
            $result = $this->update($request, $id);

            $dataResult = $this->post->find($id);
            // dd($dataResult);
            return $dataResult;
        });
    }
}