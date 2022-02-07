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
                                    <a class="bi flex-shrink-0 me-2 alert-danger"><i
                                            class="fas fa-exclamation-triangle"></i></a>
                                    <span>{{__($error)}}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="name" class="form-label">{{__('Nombre del producto')}}</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}"
                           placeholder="{{__('Escribe el nombre del nuevo producto.')}}">{{-- minlength="2" maxlength="40"--}}
                </div>
                @if($errors->first('name') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('name'))}}</span>
                    </div>
                @endif
            </div>

            <div class="my-md-4">
                <div class="my-md-2 form-floating">
                    <textarea id="description" class="form-control" type="text" name="description"
                              placeholder="{{__('Escribe la descripción del nuevo producto.')}}">{{old('description')}}</textarea>
                    <label for="description"
                           class="form-label">{{__('Descripción del producto')}}</label>{{-- minlength="2" maxlength="180"--}}
                </div>
                @if($errors->first('description') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('description'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="photo" class="form-label">{{__('Fotografía del producto')}}</label>
                    <input id="photo" class="form-control" type="file" name="photo" value="{{old('photo')}}"
                           placeholder="{{__('Inserte la fotografía del nuevo producto.')}}">{{-- --}}
                </div>
                @if($errors->first('description') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('photo'))}}</span>
                    </div>
                @endif
            </div>

            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="trademark_name"
                           class="form-label">{{__('Nombre de la marca del producto')}}</label>
                    <input id="trademark_name" class="form-control" type="text" name="trademark_name"
                           value="{{old('trademark_name')}}"
                           placeholder="{{__('Escribe el nombre de la marca del nuevo producto.')}}">{{-- minlength="2" maxlength="20"--}}
                </div>
                @if($errors->first('trademark_name') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('trademark_name'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="trademark_email"
                           class="form-label">{{__('Correo electrónico de la marca del producto')}}</label>
                    <input id="trademark_email" class="form-control" type="email" name="trademark_email"
                           value="{{old('trademark_email')}}"
                           placeholder="{{__('Escribe el correo electrónico de la marca del nuevo producto.')}}">{{-- --}}
                </div>
                @if($errors->first('trademark_email') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('trademark_email'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="date_expiry"
                           class="form-label">{{__('Fecha de caducidad del producto')}}</label>
                    <input id="trademark_email" class="form-control" type="date" name="date_expiry"
                           value="{{old('date_expiry')}}">{{--  --}}
                </div>
                @if($errors->first('date_expiry') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('date_expiry'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <h4>{{__('Tipo de inventario')}}</h4>
                    <div class="form-check form-check-inline">
                        <input id="type_stock_1" class="form-check-input" type="radio" name="type_stock"
                               value="sanitario" @if (old('type_stock') === 'sanitario') checked @endif>
                        <label class="form-check-label" for="type_stock_1">{{__('Sanitario')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="type_stock_2" class="form-check-input" type="radio" name="type_stock"
                               value="no_sanitario" @if (old('type_stock') === 'no_sanitario') checked @endif>
                        <label class="form-check-label" for="type_stock_2">{{__('No Sanitario')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="type_stock_3" class="form-check-input" type="radio" name="type_stock"
                               value="alimentario" @if (old('type_stock') === 'alimentario') checked @endif>
                        <label class="form-check-label" for="type_stock_3">{{__('Alimentario')}}</label>
                    </div>
                </div>
                @if($errors->first('type_stock') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('type_stock'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <div class="my-md-2">
                        <h4>{{__('Tipo de producto')}}</h4>
                    </div>
                    <div class="my-md-2 alert alert-primary d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-primary fs-3"><i class="fas fa-info-circle"></i></a>
                        <span>{{__('En el caso de que sea sanitario puede ser un hospital, un centro de salud o una farmacia, y en el caso de que sea no sanitario o alimentario solamente puede ser un supermercado')}}</span>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="type_1" class="form-check-input" type="checkbox" name="type[]" value="hospital"
                               @if (is_array(old('type')) && in_array('hospital', old('type'))) checked @endif>
                        <label class="form-check-label" for="type_1">{{__('Hospital')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="type_2" class="form-check-input" type="checkbox" name="type[]" value="supermercado"
                               @if (is_array(old('type')) && in_array('supermercado', old('type'))) checked @endif>
                        <label class="form-check-label" for="type_2">{{__('Supermercado')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="type_3" class="form-check-input" type="checkbox" name="type[]" value="farmacia"
                               @if (is_array(old('type')) && in_array('farmacia', old('type'))) checked @endif>
                        <label class="form-check-label" for="type_3">{{__('Farmacia')}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="type_4" class="form-check-input" type="checkbox" name="type[]" value="centro_salud"
                               @if (is_array(old('type')) && in_array('centro_salud', old('type'))) checked @endif>
                        <label class="form-check-label" for="type_4">{{__('Centro de Salud')}}</label>
                    </div>
                </div>
                @if($errors->first('type') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('type'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="available_stock"
                           class="form-label">{{__('Numero de existencias del producto disponibles')}}</label>
                    <input id="available_stock" class="form-control" type="number" name="available_stock"
                           placeholder="{{__('Escribe el numero de existencias del producto disponibles')}}"
                           value="{{old('available_stock')}}">{{-- min="2" max="200" minlength="2" maxlength="200"--}}
                </div>
                @if($errors->first('available_stock') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('available_stock'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="minimum_stock"
                           class="form-label">{{__('Numero de existencias del producto mínimas')}}</label>
                    <input id="minimum_stock" class="form-control" type="number" name="minimum_stock"
                           placeholder="{{__('Escribe el numero de existencias del producto mínimas')}}"
                           value="{{old('minimum_stock')}}">{{-- min="2" max="200" minlength="2" maxlength="200"--}}
                </div>
                @if($errors->first('minimum_stock') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('minimum_stock'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <div class="my-md-2">
                    <label for="type_product_unit" class="form-label">{{__('Unidad del producto')}}</label>
                    <select id="type_product_unit" class="form-select" size="4" name='type_product_unit'
                            aria-label="form-select size 4">
                        <optgroup label="{{__('Masa')}}">
                            <option value="kilogramos"
                                    @if (old('type_product_unit') === 'kilogramos') selected @endif>{{__('kilogramo/s')}}</option>
                            <option value="hectogramos"
                                    @if (old('type_product_unit') === 'hectogramos') selected @endif>{{__('hectogramo/s')}}</option>
                            <option value="decagramos"
                                    @if (old('type_product_unit') === 'decagramos') selected @endif>{{__('decagramo/s')}}</option>
                            <option value="gramos"
                                    @if (old('type_product_unit') === 'gramos') selected @endif>{{__('gramo/s')}}</option>
                            <option value="decigramos"
                                    @if (old('type_product_unit') === 'decigramos') selected @endif>{{__('decigramo/s')}}</option>
                            <option value="centigramos"
                                    @if (old('type_product_unit') === 'centigramos') selected @endif>{{__('centigramo/s')}}</option>
                            <option value="miligramos"
                                    @if (old('type_product_unit') === 'miligramos') selected @endif>{{__('miligramo/s')}}</option>
                        </optgroup>
                        <optgroup label="{{__('Volumen')}}">
                            <option value="kilolitros"
                                    @if (old('type_product_unit') === 'kilolitros') selected @endif>{{__('kilolitro/s')}}</option>
                            <option value="hectolitros"
                                    @if (old('type_product_unit') === 'hectolitros') selected @endif>{{__('hectolitro/s')}}</option>
                            <option value="decalitros"
                                    @if (old('type_product_unit') === 'decalitros') selected @endif>{{__('decalitro/s')}}</option>
                            <option value="litros"
                                    @if (old('type_product_unit') === 'litros') selected @endif>{{__('litro/s')}}</option>
                            <option value="decilitros"
                                    @if (old('type_product_unit') === 'decilitros') selected @endif>{{__('decilitro/s')}}</option>
                            <option value="centilitros"
                                    @if (old('type_product_unit') === 'centilitros') selected @endif>{{__('centilitro/s')}}</option>
                            <option value="mililitros"
                                    @if (old('type_product_unit') === 'mililitros') selected @endif>{{__('mililitro/s')}}</option>
                        </optgroup>
                        <option value="unidades"
                                @if (old('type_product_unit') === 'unidades') selected @endif>{{__('unidad/es')}}</option>
                    </select>
                </div>
                @if($errors->first('type_product_unit') !== '')
                    <div class="my-md-2 alert alert-danger d-flex align-items-center" role="alert">
                        <a class="bi flex-shrink-0 me-2 alert-danger"><i class="fas fa-exclamation-triangle"></i></a>
                        <span>{{__($errors->first('type_product_unit'))}}</span>
                    </div>
                @endif
            </div>
            <div class="my-md-4">
                <input type="submit" class="btn btn-dark" value="{{__('Añadir producto')}}">
            </div>
        </form>
    </main>


@endsection



