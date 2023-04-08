<?php

namespace App\Service\Storage;

use App\Service\Storage\Contract\StorageInterface;

class SessionStorage implements StorageInterface
{
    public function __construct(
        private $bucket
    ) {
        $this->bucket = config('payment.bucket name');
    }

    public function get($index)
    {
        return session()->get($this->bucket . '.' . $index);
    }

    public function set($index, $value)
    {
        return session()->put($this->bucket . '.' . $index, $value);
    }

    public function all()
    {
        return session()->get($this->bucket) ?? [];
    }

    public function exists($index)
    {
        return session()->has($this->bucket . '.' . $index);
    }

    public function unset($index)
    {
        return session()->forget($this->bucket . '.' . $index);
    }

    public function clearAll()
    {
        return session()->forget($this->bucket);
    }

    public function count()
    {
        return count($this->all());
    }
}
