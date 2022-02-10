@extends('layouts.layout')

@section('main')
    <main class="container-fluid py-md-4">
        <div>
            <h1>{{__('postLang.'.'POSTS')}}</h1>
        </div>
        <div class="my-md-4">
            @if(session()->get('mensaje') && session()->get('info'))
                <div class="my-md-2">
                    <div class="alert alert-success">
                        {{__('productos.'.session()->get('mensaje'))}}
                    </div>
                </div>
                <div class="my-md-2">
                    <div class="alert alert-primary">
                        {{ __('productos.'.session()->get('info')) }}
                    </div>
                </div>
            @elseif(session()->get('mensaje'))
                <div class="my-md-2">
                    <div class="alert alert-success">
                        {{ __('productos.'.session()->get('mensaje')) }}
                    </div>
                </div>
            @elseif(session()->get('info'))
                <div class="my-md-2">
                    <div class="alert alert-primary">
                        {{__('productos.'.session()->get('info')) }}
                    </div>
                </div>
            @endif
        </div>

        <div>
            <form action="{{ route('post.create') }}" method="get">
                @csrf
                @method('CREATE')
                <input class="btn btn-success" type="submit" name="create" value="{{__('New Product')}}">
            </form>
            {{--<a href="{{ route('product.create')}}"><input type="submit" value="{{}}"></a>--}}
        </div>
        <div>
            <table class="table table-auto table-light table-striped text-center">
                <thead>
                <tr>
                    <th>{{__('titulo')}}</th>
                    <th>{{__('extracto')}}</th>
                    <th>{{__('contenido')}}</th>
                    <th colspan=3>{{__('Acciones')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pos as $item)
                    <tr>
                        <td>{{__('productos.'.$item->titulo)}}</td>
                        <td>{{__('productos.'.$item->extracto)}}</td>
                        @if($item->acceso === 'publico')
                            <td>{{__('publico')}}</td>
                        @elseif($item->acceso === 'privado')
                            <td>{{__('privado')}}</td>
                        @endif
                        <td>
                            <form action="{{ route('post.show', $item->id) }}" method="get">
                                @csrf
                                <input type="submit" name="show" value="{{__('productos.Mostrar')}}">
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('post.edit', $item->id) }}">
                                @csrf
                                @method('UPDATE')
                                <input type="submit" name="edit" value="{{__('productos.Editar')}}">
                            </form>
                            {{--@can('update-product', 'update') @endcan --}}
                        </td>
                        <td>
                            <form action="{{ route('post.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="delete" value="{{('productos.Eliminar')}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection

