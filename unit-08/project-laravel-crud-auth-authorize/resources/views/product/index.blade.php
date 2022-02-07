@extends('layouts.layout')

@section('main')
    <main class="container-fluid py-md-4">
        <div>
            <h1>{{__('productos.'.'List of products')}}</h1>
        </div>
        <div class="my-md-4">
            @if(session()->get('mensaje') && session()->get('info'))
                <div class="my-md-2">
                    <div class="alert alert-success">
                        {{__(session()->get('mensaje'))}}
                    </div>
                </div>
                <div class="my-md-2">
                    <div class="alert alert-primary">
                        {{ __(session()->get('info')) }}
                    </div>
                </div>
            @elseif(session()->get('mensaje'))
                <div class="my-md-2">
                    <div class="alert alert-success">
                        {{ __(session()->get('mensaje')) }}
                    </div>
                </div>
            @elseif(session()->get('info'))
                <div class="my-md-2">
                    <div class="alert alert-primary">
                        {{__(session()->get('info')) }}
                    </div>
                </div>
            @endif
        </div>

        <div>
            <form action="{{ route('product.create') }}" method="get">
                @csrf
                @method('CREATE')
                <input class="btn btn-success" type="submit" name="create" value="{{__('Nuevo Producto')}}">
            </form>
            {{--<a href="{{ route('product.create')}}"><input type="submit" value="{{}}"></a>--}}
        </div>
        <div>
            <table class="table table-auto table-light table-striped text-center">
                <thead>
                <tr>
                    <th>{{__('Imagen del Producto')}}</th>
                    <th>{{__('Nombre del Producto')}}</th>
                    <th>{{__('Marca del Producto')}}</th>
                    <th>{{__('Tipo del Producto')}}</th>
                    <th>{{__('Cantidad Minima del Producto')}}</th>
                    <th>{{__('Cantidad Disponible del Producto')}}</th>
                    <th>{{__('Fecha de Caducidad del Producto')}}</th>
                    <th colspan=3>{{__('Acciones')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prod as $item)
                    <tr>
                        <td><img class="img-fluid" src="/storage/images/{{$item->photo}}"
                                 alt="{{__($item->name)}}"></td>
                        <td>{{__($item->name)}}</td>
                        <td>{{__($item->trademark_name)}}</td>
                        @if($item->type_stock === 'sanitario')
                            <td>{{__('Sanitario')}}</td>
                        @elseif($item->type_stock === 'no_sanitario')
                            <td>{{__('No Sanitario')}}</td>
                        @elseif($item->type_stock === 'alimentario')
                            <td>{{__('Alimentario')}}</td>
                        @endif
                        <td>{{__($item->available_stock)}} {{__($item->type_product_unit)}}</td>
                        <td>{{__($item->minimum_stock)}} {{__($item->type_product_unit)}}</td>
                        <td>{{__($item->date_expiry)}}</td>
                        <td>
                            <form action="{{ route('product.show', $item->id) }}" method="get">
                                @csrf
                                <input type="submit" name="show" value="{{__('Mostrar')}}">
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('product.edit', $item->id) }}">
                                @csrf
                                @method('UPDATE')
                                <input type="submit" name="edit" value="{{__('Editar')}}">
                            </form>
                            {{--@can('update-product', 'update') @endcan --}}
                        </td>
                        <td>
                            <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="delete" value="{{('Eliminar')}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection

