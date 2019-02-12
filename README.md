# Generate slugs when saving Laravel Eloquent models
| This Is Just A Wrapper [Package]('https://github.com/bpocallaghan/sluggable') To Support Arabic Languages Slug  

Provides a HasSlug trait that will generate a unique slug when saving your Laravel Eloquent model. 
```php
$model = new Article();
$model->name = 'كيف اتعلم البرمجة';
$model->save();

echo $model->slug; // ouputs "كيف-اتعلم-البرمجة"
```

## Installation

Update your project's `composer.json` file.

```bash
composer require zymawy/arabify
```
You may want to change the function you can do change it from the config

```bash
    php artisan vendor:publish --provider="Zymawy\Arabify\ArabifyServiceProvider"
```

## Usage

Your Eloquent models can use the `Zymawy\Arabfiy\HasSlug` trait and the `Zymawy\Arabfiy\SlugOptions` class.

The trait has a protected method `getSlugOptions()` that you can implement for customization. 

Here's an example:

```php
class YourEloquentModel extends Model
{
    use HasSlug;
    
    /**
     * This function is optional and only required
     * when you want to override the default behaviour
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

If you want to generate your slug from a relationship.

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

## Config

You do not have to add the method in you model (the above will be used as default). It is only needed when you want to change the default behaviour.

By default it will generate a slug from the `name` and save to the `slug` column.

It will suffix a `-1` to make the slug unique. You can disable it by calling `makeSlugUnique(false)`.

It will use the `-` as a separator. You can change this by calling `slugSeperator('_')`.

You can use multiple fields as the source of the slug `generateSlugFrom(['firstname', 'lastname'])`.

You can also pass a `callable` function to `generateSlugFrom()`.

Have a look [here for the options](https://github.com/zymawy/arabify/blob/master/src/SlugOptions.php) and available config functions.

## Credits

* **Ben-Piet O'Callaghan** - _Initial work_ - [bpocallaghan](https://github.com/bpocallaghan)
* **Hamza Zymawy** - _contributor_ - [zymawy](https://github.com/zymawy)

See also the list of [contributors](https://github.com/zymawy/arabify/graphs/contributors) who participated in this project.
