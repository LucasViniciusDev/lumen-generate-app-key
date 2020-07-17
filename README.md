LUMEN GENERATE APP KEY
=======

A simple library to generate the Laravel/Lumen Framework application key.

Installation
------------

Use composer to manage your dependencies and download this library.

```bash
composer require lucasviniciusdev/lumen-generate-app-key
```

# Description

Support to generate **APP KEY** by commands in projects with the Lumen Framework.

# Usage

Modify `$commands` variable in `app/Console/Kernel`

```php
protected $commands = [
  \Lucasviniciusdev\Commands\KeyGenerateCommand::class
];
```

Then, run the command at the root path of the project:

```bash
php artisan key:generate
php artisan key:generate --show
```

Add param `--show` will display a generate key without replate **APP_KEY** in `.evn` file. Useful when you need a key for other scripts.

Example key
-----------

**API_KEY=base64:kddzDjSHLzPYZ713NtFNC0ixBCRsERpe**