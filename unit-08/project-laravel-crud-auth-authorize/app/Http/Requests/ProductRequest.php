<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'description' => ['required', 'string', 'min:2', 'max:190'],
            'photo' => ['required', 'mimetypes:image/jpg,image/jpeg,image/png'],
            'trademark_name' => ['required', 'string', 'min:2', 'max:20'],
            'trademark_email' => ['required', 'email'],
            'date_expiry' => ['required'],
            'type_stock' => ['required', 'in:sanitario,no_sanitario,alimentario'],
            'type' => ['required'],
            'available_stock' => ['required', 'int'],
            'minimum_stock' => ['required', 'int'],
            /*'id_user' => ['required'],, 'in:hospital,supermercado,farmacia,centro_salud'*/
            'type_product_unit' => ['required', 'in:kilogramos,hectogramos,decagramos,gramos,decigramos,centigramos,miligramos,kilolitros,hectolitros,decalitros,litros,decilitros,centilitros,mililitros,unidades']
        ];
    }


    /**
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo "nombre de producto" es obligatorio.',
            'name.string' => 'El campo "nombre de producto" tiene que ser un string.',
            'name.min' => 'El campo "nombre de producto" tiene que tener mínimo dos caracteres alfanuméricos.',
            'name.max' => 'El campo "nombre de producto" tiene que tener máximo cincuenta caracteres alfanuméricos.',

            'description.required' => 'El campo "descripción" es obligatorio.',
            'description.string' => 'El campo "descripción" tiene que ser un string.',
            'description.min' => 'El campo "descripción" tiene que tener mínimo dos caracteres alfanuméricos.',
            'description.max' => 'El campo "descripción" tiene que tener máximo ciento ochenta caracteres alfanuméricos.',

            'photo.required' => 'El campo "imagen" es obligatorio.',
            'photo.mimetypes' => 'El campo "imagen" tiene que ser con la extensión ".jpg", ".jpeg" o ".png".',

            'trademark_name.required' => 'El campo "nombre de la marca" es obligatorio.',
            'trademark_name.string' => 'El campo "nombre de la marca" tiene que ser un string.',
            'trademark_name.min' => 'El campo "nombre de la marca" tiene que tener mínimo dos caracteres alfanuméricos.',
            'trademark_name.max' => 'El campo "nombre de la marca" tiene que tener máximo veinte caracteres alfanuméricos.',

            'trademark_email.required' => 'El campo "correo electrónico de la marca" es obligatorio.',
            'trademark_email.email' => 'El campo "correo electrónico de la marca" tiene que ser un email.',

            'date_expiry.required' => 'El campo "fecha de caducidad" es obligatorio.',
            'date_expiry.date' => 'El campo "fecha de caducidad" tiene que ser una fecha.',

            'type_stock.required' => 'El campo "tipo de inventario" es obligatorio.',
            'type_stock.in' => 'El campo "tipo de inventario" es invalido.',

            'type.required' => 'El campo "tipo" es obligatorio.',
            'type.in' => 'El campo "tipo" tiene que ser "Hospital", "Supermercado", "Farmacia" o "Centro de Salud".',

            'available_stock.required' => 'El campo "numero de existencias disponibles del producto" es obligatorio.',
            'available_stock.int' => 'El campo "numero de existencias disponibles del producto" tiene que ser un int.',

            'minimum_stock.required' => 'El campo "numero de existencias mínimas disponibles del producto" es obligatorio.',
            'minimum_stock.int' => 'El campo "numero de existencias mínimas disponibles del producto" tiene que ser un int.',

            'type_product_unit.required' => 'El campo "unidad del producto" es obligatorio.',
            'type_product_unit.in' => 'El campo "unidad del producto" es invalido.'
        ];
    }


}
