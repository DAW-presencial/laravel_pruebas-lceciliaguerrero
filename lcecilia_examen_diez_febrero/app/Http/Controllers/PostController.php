<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $dateTameNow = Carbon::now()->format('Y-m-d');
        $dateTNow = $dateTameNow;
        $dateNow = $dateTNow.substr($dateTNow, 24);
        /*return dd($dateNow);*/
        $pos = DB::table('posts')->where('fecha', '<=', $dateNow)->orderBy('id', 'desc')->get();
        return view('post.index', compact('pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $userId = auth()->user()->id;
        $pos = [
            'titulo' => $request->titulo,
            'extracto' => $request->extracto,
            'contenido' => $request->contenido,
            'acceso' => $request->acceso,
            'caducable_comentable' => $request->caducable_comentable,
            'fecha' => $request->fecha,
            'id_user' => $userId
        ];
        Post::create($pos);
        return redirect('/post')->with(['mensaje' => 'El post se ha creado correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        $pos = $post;
        return view('post.show', compact('pos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        $pos = $post;
        return view('post.edit', compact('pos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $userId = auth()->user()->id;
        $pos = $post;
        $pos->titulo = $request->titulo;
        $pos->extracto = $request->extracto;
        $pos->contenido = $request->contenido;
        $pos->acceso = $request->acceso;
        $pos->caducable_comentable = $request->caducable_comentable;
        $pos->fecha = $request->fecha;
        $pos->id_user = $userId;

        $pos->save();
        return redirect('/post')->with('mensaje', 'post actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Post $post)
    {
        $pos = $post;
        $pos->delete();
        return redirect('/post')->with('mensaje', 'post eliminado');
    }
}
