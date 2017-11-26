## About Felicity Twig

Felicity Twig is a really light wrapping around Twig. Basically it just instantiates twig and provides access to it for rendering templates and extending Twig.

## Usage

Get the Twig environment with the static `get` method, or if passing `Twig::getInstance()` in via dependency injection, use the `getTwig` method.

```php
<?php

use felicity\twig\Twig;

$twig = Twig::get();

$twig->getLoader()->addPath('path/to/custom/template/dir', 'mynamespace');

$html = $twig->render('@mynamespace/path/to/template.twig');
```

### Config

Felicity Twig makes use of the Felicity Config so you can control the way Twig behaves.

```php
<?php

use felicity\config\Config;

// Enabled Twig debug
Config::set('felicity.twig.debug', true);

// Set a string or array of template paths for the loader
Config::set('felicity.twig.templatePaths', []);

// Set the charset. UTF-8 is the default
Config::set('felicity.twig.charset', 'UTF-8');

// Set a different base template class than the default
Config::set('felicity.twig.base_template_class', 'Custom_Twig_Template');

// Set a cache location for Twig to use.
// It is HIGHLY recommended that you set this
Config::set('felicity.twig.cache', 'path/to/cache/dir');

// Whether to reload the template if the original source changed.
// You should probably leave this as default
Config::set('felicity.twig.auto_reload', true);

// Enable strict variables
Config::set('felicity.twig.strict_variables', true);

// Change autoescape preferences
Config::get('felicity.twig.autoescape', 'html');

// Disable optimizations (probably don't do this)
Config::get('felicity.twig.optimizations', 0)
```

## License

Copyright 2017 BuzzingPixel, LLC

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at [http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0).

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
