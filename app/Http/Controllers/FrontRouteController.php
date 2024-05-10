<?php

namespace App\Http\Controllers;

class FrontRouteController extends Controller
{
    public function default()
    {
        return view('default', [
            '_serverMeta' => [
                'title' => 'my title',
                'info' => 'my info',
                'keys' => 'mey keywords',
                'image' => 'my image',
            ],
        ]);
    }

    // public function post($id)
    // {
    //     $post = Post::where('id', $id)->first();
    //     if (empty($post)) {
    //         return view('default');
    //     }

    //     return view('post', [
    //         '_serverMeta' => [
    //             'title' => $post->name,
    //             'info' => $post->text,
    //             'keys' => $post->tags,
    //             'image' => $post->image,
    //         ],
    //     ]);
    // }
}
