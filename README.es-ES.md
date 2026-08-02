# Generar slugs al guardar modelos Eloquent de Laravel  
| Este Es Solo Un Contenedor [Package]('https://github.com/bpocallaghan/sluggable') Para Soportar Slugs En Idioma Árabe  

Proporciona un trait `HasSlug` que generará un slug único al guardar su modelo Eloquent de Laravel.  
```php  
$model = new Article();  
$model->name = 'كيف اتعلم البرمجة';  
$model->save();  

echo $model->slug; // salidas "كيف-اتعلم-البرمجة"  
```  

## Instalación  

Actualice el archivo `composer.json` de su proyecto.  

```bash  
composer require zymawy/arabify  
```  

Puede que desee cambiar la función; puede hacerlo desde el archivo de configuración.  

```bash  
php artisan vendor:publish --provider="Zymawy\Arabify\ArabifyServiceProvider"  
```  

## Uso  

Sus modelos Eloquent pueden usar el trait `Zymawy\Arabfiy\HasSlug` y la clase `Zymawy\Arabfiy\SlugOptions`.  

El trait tiene un método protegido `getSlugOptions()` que puede implementar para personalizar.  

Aquí hay un ejemplo:  

```php  
class YourEloquentModel extends Model  
{  
    use HasSlug;  
    
    /**  
     * Esta función es opcional y solo se requiere  
     * cuando desea anular el comportamiento predeterminado  
     */  
    protected function getSlugOptions()  
    {  
        return SlugOptions::create()  
            ->slugSeperator('-')  
            ->generateSlugFrom('name')  
            ->saveSlugTo('slug');  
    }  
}  
```  

Si desea generar su slug desde una relación.  

```php  
class YourEloquentModel extends Model  
{  
    use HasSlug;  
    
    public function getNameAndFooAttribute()  
    {  
        $name = $this->name;  
        if ($this->foo) {  
            $name .= " {$this->foo->name}";  
        }  

        return $name;  
    }  

    protected function getSlugOptions()  
    {  
        return SlugOptions::create()  
            ->generateSlugFrom('name_and_foo');  
    }  
}  
```  

## Configuración  

No es necesario agregar el método en su modelo (se usará el predeterminado). Solo es necesario cuando desea cambiar el comportamiento predeterminado.  

Por defecto, generará un slug desde el campo `name` y lo guardará en la columna `slug`.  

Añadirá un sufijo `-1` para hacer el slug único. Puede deshabilitarlo llamando `makeSlugUnique(false)`.  

Usará el `-` como separador. Puede cambiarlo llamando `slugSeperator('_')`.  

Puede usar múltiples campos como origen del slug: `generateSlugFrom(['firstname', 'lastname'])`.  

También puede pasar una función `callable` a `generateSlugFrom()`.  

Consulte [aquí](https://github.com/zymawy/arabify/blob/master/src/SlugOptions.php) para ver las opciones y funciones de configuración disponibles.  

## Créditos  

* **Ben-Piet O'Callaghan** - _Trabajo inicial_ - [bpocallaghan](https://github.com/bpocallaghan)  
* **Hamza Zymawy** - _colaborador_ - [zymawy](https://github.com/zymawy)  

Consulte también la lista de [colaboradores](https://github.com/zymawy/arabify/graphs/contributors) que participaron en este proyecto.
