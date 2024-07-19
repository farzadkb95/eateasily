<?php

namespace App\Http\Controllers;

class FrontRouteController extends Controller
{
    public function default()
    {
        return view('default', [
            '_serverMeta' => [
                'title' => 'eat easily | ایت ایزیلی',
                'info' => 'ایت ایزیلی: آزمون لاغری حرفه ای، مشاوره تغذیه و لاغری شما',
                'keys' => 'آزمون لاغری، مشاوره لاغری، اپ لاغری، مشاوره تغذیه، آزمون جامع تغذیه',
                'image' => url('header.png'),
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
