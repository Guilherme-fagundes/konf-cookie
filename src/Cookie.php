<?php

declare(strict_types=1);

namespace Guilherme\KonfCookie;

/**
 * Copyright (c) 2025, Guilherme <guilherme@example.com>.
 * 
 * Class Cookie
 *
 * Provides basic functionality to manage HTTP cookies.
 * Includes methods to set, get, delete, check, and list all cookies.
 * 
 * @package Guilherme\KonfCookie
 */
class Cookie
{
    /**
     * Sets a cookie.
     *
     * @param string $name      The name of the cookie.
     * @param string $value     The value to store.
     * @param int $expire       Expiration time in seconds (0 = session cookie).
     * @param string $path      Cookie path (default is '').
     * @param string $domain    Cookie domain (default is '').
     * @param bool $secure      Whether the cookie should be sent only over HTTPS.
     * @param bool $httponly    Whether the cookie is accessible only through HTTP (not via JavaScript).
     *
     * @return bool True on success, false on failure.
     */
    public function set(
        string $name,
        string $value,
        int $expire = 0,
        string $path = '',
        string $domain = '',
        bool $secure = false,
        bool $httponly = false
    ): bool {
        return setcookie($name, $value, $expire > 0 ? time() + $expire : 0, $path, $domain, $secure, $httponly);
    }

    /**
     * Retrieves the value of a cookie.
     *
     * @param string $name The name of the cookie.
     *
     * @return string|null The cookie value, or null if not set.
     */
    public function get(string $name): ?string
    {
        return $_COOKIE[$name] ?? null;
    }

    /**
     * Deletes a cookie.
     *
     * @param string $name      The name of the cookie.
     * @param string $path      Cookie path.
     * @param string $domain    Cookie domain.
     * @param bool $secure      Whether the cookie was set with HTTPS.
     * @param bool $httponly    Whether the cookie was HTTP only.
     *
     * @return bool True on success.
     */
    public function destroy(
        string $name,
        string $path = '',
        string $domain = '',
        bool $secure = false,
        bool $httponly = false
    ): bool {
        unset($_COOKIE[$name]);
        return setcookie($name, '', time() - 3600, $path, $domain, $secure, $httponly);
    }

    /**
     * Checks whether a cookie is set.
     *
     * @param string $name The name of the cookie.
     *
     * @return bool True if the cookie exists, false otherwise.
     */
    public function exists(string $name): bool
    {
        return isset($_COOKIE[$name]);
    }

    /**
     * Retrieves all cookies as an associative array.
     *
     * @return array<string, string> All available cookies.
     */
    public function getAll(): array
    {
        return $_COOKIE;
    }
}
