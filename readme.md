# Usage

This twig extension is to write the human readable names of the 2 or 5 letter locale codes (eg: en or en_GB) 

Ideal to use with the language picker as you can pass the locale as second parameter to display the locale name on that language

## Require as dependency

```bash
    composer require alaczi/twig-locale-name-extension
```

## Register the extension


### PHP

```php
    $filter = new \alaczi\Twig\Extension\LocaleNameExtension();
    $twig = new Twig_Environment($loader);
    $twig->addFilter($filter);
```

### Symfony 2

```yaml
services:
    alaczi.twig.country_extension:
        class: alaczi\Twig\Extension\LocaleNameExtension
        tags:
            - { name: twig.extension }
```

### Silex

```php
    $app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
        /** @var \Twig_Environment $twig */
        $twig->addExtension(new \alaczi\Twig\Extension\LocaleNameExtension())
        return $twig;
    }));
```

## Usage in twig

Using the current locale:

```twig
    {{ locale|locale_name }}
```

Using an other locale (eg: for language pickers)

```twig
    {{ locale|locale_name(locale) }}
```