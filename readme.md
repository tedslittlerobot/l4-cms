L4 CMS
==========

> An attempt at a modular way to create a CMS, or CMS panels/sectors, in Laravel 4

## Installation

Add the following to your composer.json file:

```json
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/tedslittlerobot/l4-cms"
    }
],
```

Then, you can `composer require tlr/l4-cms` to add this to your composer.json and download it.

In `app.php`, add `Tlr\Cms\CmsServiceProvider` to your `providers` array, and the following to your `aliases` array:

```php
'TypeSet'      => 'Tlr\Types\Facades\TypeSet',
'Menu'         => 'Tlr\Menu\Laravel\MenuFacade',
```

This will register the following packages - l4-routing, l4-auth, l4-types, menu-builder, and bootstrap a basic CMS structure.
