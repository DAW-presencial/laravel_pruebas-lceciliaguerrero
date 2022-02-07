<p style="text-align:center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" 
            width="400" alt="Logo laravel">
    </a>
</p>

# Contenido

- [Usuarios](#usuarios)
- [Productos](#productos)

## Usuarios

Un usuario puede crear, editar, añadir o eliminar un producto que lo ha creado él, también puede visualizar un producto
que no lo hizo él, pero no podrá ni editarlo ni eliminarlo.

## Productos

- [Creación](#creacin)
- [Edición](#edicin)

### Creación

En dicho producto, podrás añadir un nuevo nombre(string[migration] / type=text[views]), descripción(string[migration] /
type=text/textarea[views]), fotografía(string[migration] / type=file[views]), nombre de la marca(string[migration] /
type=text[views]), Correo electrónico de la marca(string[migration] / type=email[views]), Tipo de inventario(
enum[migration] / type=radio[views]), Tipo de producto(json[migration] / type=checkbox[views]), Numero de existencias
del producto disponibles(integer[migration] / type=number[views]), Numero de existencias del producto mínimas(
integer[migration] / type=number[views]) y Unidad del producto(enum[migration] / type=select[views])

la sección de fotografía se ha limitado para que solo permita la subida de archivos de tipo `image/jpg`, `image/jpeg`
o `image/png`.

### Edición
En dicho producto, en los old values o `old()`, no he podido hacerlo en los 'tipo de producto'. También tampoco he
podido hacerlo en fotografía debido a que es un input de tipo file, debido a que, por seguridad, es el comportamiento
por defecto de los navegadores.


## Multiidioma
- [Info](#info)
  - [Notas](#notas)

### Info
Se ha configurado el idioma por defecto a español, ya sea en `locale => 'es'` como en `faker_locale => 'es_ES'`.
### Notas
No me ha dado tiempo a rellenar el archivo de lenguaje [productos.php](resources/lang/es/productos.php).
He hecho un ejemplo en [index.blade.php](resources/views/product/index.blade.php), para que vea que lo sé hacer.

Por ejemplo: http://lcecilia.ifc33b.cifpfbmoll.eu/laravel_pruebas

.env file Se ha generado una copia del fichero .env: - copia.env
