## Official Whatspie client for PHP

### Installation
```
composer require whatspie\php-client
```

### Usage
To get `API_KEY` goto Profile page on [Whatspie Dashboard](https://app.whatspie.com)
```php
$client = new \Whatspie\Client('YOUR_API_KEY', 'YOUR DEVICE');

// Sending Message
$client->to('628561112233')->message('Hi there!')->send();

// Get Messages
$client->getMessages();
```

[Whatspie Dashboard]: https://app.whatspie.com