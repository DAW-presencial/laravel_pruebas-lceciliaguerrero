@extends('layouts.layout')

@section('main')
    <main class="container-fluid mx-md-0">
        <table class="table table-light table-striped text-center">
            <tbody>
            <tr>
                <td class="fw-bold">{{__('productos.Imagen del Producto')}}</td>
                <td><img class="img-fluid" src="/storage/descargas/{{$prod->photo}}" alt="{{$prod->name}}"></td>
            <tr>
            <tr>
                <td class="fw-bold">{{__('productos.Nombre del Producto')}}</td>
                <td>{{__('productos.'.$prod->name)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('productos.Marca del Producto')}}</td>
                <td>{{__('productos.'.$prod->trademark_name)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('productos.Correo electrónico de la marca')}}</td>
                <td>{{__('productos.'.$prod->trademark_email)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('productos.Tipo del Inventario')}}</td>
                @if($prod->type_stock === 'sanitario')
                    <td>{{__('productos.Sanitario')}}</td>
                @elseif($prod->type_stock === 'no_sanitario')
                    <td>{{__('productos.No Sanitario')}}</td>
                @elseif($prod->type_stock === 'alimentario')
                    <td>{{__('productos.Alimentario')}}</td>
                @endif
            </tr>
            <tr>
                <td class="fw-bold">{{__('productos.Cantidad Minima del Producto')}}</td>
                <td>{{__('productos.'.$prod->minimum_stock)}} {{__('productos.'.$prod->type_product_unit)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('productos.Cantidad Disponible del Producto')}}</td>
                <td>{{__('productos.'.$prod->available_stock)}} {{__('productos.'.$prod->type_product_unit)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('productos.Fecha de Caducidad del Producto')}}</td>
                <td>{{__('productos.'.$prod->date_expiry)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('productos.Tipo de Producto')}}</td>
                @foreach($prod->type as $item => $value)
                    <td>{{__('productos.'.$value)}}</td>
            @endforeach
            </tr>
            </tbody>
        </table>
    </main>

@endsection
