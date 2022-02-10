@extends('layouts.layout')

@section('main')
    <main class="container-fluid mx-md-0">
        <div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                                    <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                                    <span>{{__('productos.'.$error)}}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form method="post" action="{{ route('product.update', $pos) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="name" class="form-label">{{__('Titulo')}}</label>
                    <input id="name" class="form-control" type="text" name="titulo" value="{{old('titulo', $pos->titulo)}}"
                           placeholder="{{__('escribe el titulo')}}">{{-- minlength="2" maxlength="40"--}}
                </div>
                @if($errors->first('titulo') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__('productos.'.$errors->first('titulo'))}}</span>
                    </div>
                @endif
            </div>

            <div class="my-md-4">
                <div class="my-md-2 form-floating">
                    <textarea id="description" class="form-control" type="text" name="extracto"
                              placeholder="{{__('Escribe el extracto.')}}">{{old('extracto',$pos->extracto)}}</textarea>
                    <label for="description"
                           class="form-label">{{__('Extracto')}}</label>{{-- minlength="2" maxlength="180"--}}
                </div>
                @if($errors->first('extracto') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__('productos.'.$errors->first('extracto'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2 form-floating">
                    <textarea id="description2" class="form-control" type="text" name="contenido"
                              placeholder="{{__('Escribe el contenido.')}}">{{old('contenido',$pos->contenido)}}</textarea>
                    <label for="description2"
                           class="form-label">{{__('contenido')}}</label>{{-- minlength="2" maxlength="180"--}}
                </div>
                @if($errors->first('contenido') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__('productos.'.$errors->first('contenido'))}}</span>
                    </div>
                @endif
            </div>

            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="type_product_unit" class="form-label">{{__('acceso')}}</label>
                    <select id="type_product_unit" class="form-select" size="4" name='acceso'
                            aria-label="form-select size 4">
                        <option value="publico" @if (old('acceso', $pos->acceso) === 'publico') selected @endif>{{__('publico')}}</option>
                        <option value="privado" @if (old('acceso', $pos->acceso) === 'privado') selected @endif>{{__('privado')}}</option>
                    </select>
                </div>
                @if($errors->first('acceso') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__('productos.'.$errors->first('acceso'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="date_expiry"
                           class="form-label">{{__('fecha')}}</label>
                    <input id="date_expiry" class="form-control" type="date" name="fecha"
                           value="{{old('fecha', $pos->fecha)}}" required>{{--  --}}
                </div>
                @if($errors->first('fecha') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__('productos.'.$errors->first('fecha'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <div class="my-md-2">
                        <h4>{{__('caducable y o comentable')}}</h4>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="type_1" class="form-check-input" type="checkbox" name="caducable_comentable[]" value="caducable"
                               @if (is_array(old('caducable_comentable')) && in_array('caducable', old('caducable_comentable'))) checked @endif>
                        <label class="form-check-label" for="type_1">{{__('caducable')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="type_2" class="form-check-input" type="checkbox" name="caducable_comentable[]" value="comentable"
                               @if (is_array(old('caducable_comentable')) && in_array('comentable', old('caducable_comentable'))) checked @endif>
                        <label class="form-check-label" for="type_2">{{__('comentable')}}</label>
                    </div>
                </div>
                @if($errors->first('caducable_comentable') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__('productos.'.$errors->first('caducable_comentable'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <input type="submit" class="btn btn-dark" value="{{__('productos.Actualizar producto')}}">
            </div>
        </form>
    </main>
@endsection
