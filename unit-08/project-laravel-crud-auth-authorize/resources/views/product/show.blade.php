@extends('layouts.layout')

@section('main')
    <main class="container-fluid mx-md-0">
        <table class="table table-light table-striped text-center">
            <tbody>
            <tr>
                <td class="fw-bold">{{__('Imagen del Producto')}}</td>
                <td><img class="img-fluid" src="{{asset('storage/images/'.$item->photo)}}"></td>
            <tr>
            <tr>
                <td class="fw-bold">{{__('Nombre del Producto')}}</td>
                <td>{{__($prod->name)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('Descripción del Producto')}}</td>
                <td>{{__($prod->description)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('Marca del Producto')}}</td>
                <td>{{__($prod->trademark_name)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('Correo electrónico de la marca')}}</td>
                <td>{{__($prod->trademark_email)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('Tipo del Inventario')}}</td>
                @if($prod->type_stock === 'sanitario')
                    <td>{{__('Sanitario')}}</td>
                @elseif($prod->type_stock === 'no_sanitario')
                    <td>{{__('No Sanitario')}}</td>
                @elseif($prod->type_stock === 'alimentario')
                    <td>{{__('Alimentario')}}</td>
                @endif
            </tr>
            <tr>
                <td class="fw-bold">{{__('Cantidad Minima del Producto')}}</td>
                <td>{{__($prod->minimum_stock)}} {{__($prod->type_product_unit)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('Cantidad Disponible del Producto')}}</td>
                <td>{{__($prod->available_stock)}} {{__($prod->type_product_unit)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('Fecha de Caducidad del Producto')}}</td>
                <td>{{__($prod->date_expiry)}}</td>
            </tr>
            <tr>
                <td class="fw-bold">{{__('Tipo de Producto')}}</td>
                @foreach($prod->type as $item => $value)
                    <td>{{__($value)}}</td>
            @endforeach
            </tr>
            </tbody>
        </table>
    </main>

@endsection
