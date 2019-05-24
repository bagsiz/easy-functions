# easy-functions
Laravel package for useful &amp; easy PHP functions

## Installation

This package can be installed through Composer.

``` bash
composer require bagsiz/easy-functions
```


## Functions
### checkFieldForRandom
This function aims to check a model's fields against a random value and return that value
#### Usage
For example we want to check the `id` fields of `App\User` model,
you should write;

```php
function checkUserModel() {
  $user = new User();
  $return EasyFunction::checkFieldForRandom($user, 'id', 'int', 8);
}
```

`checkFieldForRandom($model, string $field, string $type, int $length)`
- $model = The collection of the model 
- $fiels = The field of the model -> String `'field'`
- $type = The type of value you want to generate -> String `'str'` or Integer `'int'`. Default `'str'` 
- $length = The length of value you want to generate -> Int `8`. Default `8`
