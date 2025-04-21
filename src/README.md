Perfeito! Aqui está o conteúdo completo do `README.md`, **tudo dentro de um bloco Markdown**, exatamente como você pediu — pronto para copiar e colar em um arquivo `README.md` no seu projeto:

```markdown
# KonfCookie

**KonfCookie** is a simple and secure PHP class for managing HTTP cookies. It allows setting, getting, checking existence, deleting cookies, and retrieving all cookies in a straightforward manner.

## Features

- Set cookies with optional expiration, path, domain, secure flag, and HttpOnly flag.
- Retrieve cookies easily.
- Check if a cookie exists.
- Delete cookies.
- Retrieve all cookies in one go.

## Installation

You can install **KonfCookie** using **Composer**.

### Using Composer

To install the package, run the following command:

```bash
composer require guilherme/konfcookie
```

## Usage

### 1. Creating a Cookie Object

You can instantiate the `Cookie` class without any parameters.

```php
use Guilherme\KonfCookie\Cookie;

$cookie = new Cookie();
```

### 2. Setting a Cookie

To set a cookie, use the `set()` method. Below are examples of how to set cookies with and without additional parameters.

#### Example 1: Setting a Simple Cookie

```php
// Set a cookie that expires in 1 hour
$cookie->set('user', 'john_doe', 3600);
```

#### Example 2: Setting a Cookie with Optional Parameters

```php
$cookie->set(
    'user',      // Cookie name
    'john_doe',  // Cookie value
    3600,        // Expiration in seconds
    '/',         // Path
    '',          // Domain
    true,        // Secure (HTTPS only)
    true         // HttpOnly (not accessible by JavaScript)
);
```

#### Parameters:

- `$name` (string): The name of the cookie.
- `$value` (string): The value to store in the cookie.
- `$expire` (int): Expiration time in seconds (0 means session cookie).
- `$path` (string): Path where the cookie is accessible.
- `$domain` (string): Domain for which the cookie is valid.
- `$secure` (bool): Whether the cookie should only be sent over HTTPS.
- `$httponly` (bool): Whether the cookie should be accessible only through HTTP.

### 3. Getting a Cookie Value

```php
$user = $cookie->get('user');
echo $user; // Outputs: john_doe
```

### 4. Checking if a Cookie Exists

```php
if ($cookie->exists('user')) {
    echo "Cookie 'user' exists!";
} else {
    echo "Cookie 'user' does not exist!";
}
```

### 5. Deleting a Cookie

```php
$cookie->destroy('user'); // Simple deletion
```

```php
// Deleting with custom options
$cookie->destroy('user', '/', '', true, true);
```

### 6. Retrieving All Cookies

```php
$allCookies = $cookie->getAll();
print_r($allCookies);
```

### Full Example

```php
use Guilherme\KonfCookie\Cookie;

$cookie = new Cookie();

// Set a cookie
$cookie->set('user', 'john_doe', 3600);

// Get a cookie
echo $cookie->get('user');

// Check if it exists
if ($cookie->exists('user')) {
    echo "Exists!";
}

// List all cookies
print_r($cookie->getAll());

// Delete it
$cookie->destroy('user');
```

## License

This project is licensed under the MIT License. See the [LICENSE.md](LICENSE.md) file for details.

## Contributing

Contributions are welcome! Fork the repository, create a branch, and submit a pull request. For bugs or suggestions, open an issue.


