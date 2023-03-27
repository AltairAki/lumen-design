<?php

namespace App\Models;

use Exception;
use Throwable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * 乐观锁更新 compare and save
     * @return int
     * @throws Throwable
     */
    public function cas()
    {
        throw_if(!$this->exists, Exception::class, 'model not exists when cas!');

        $dirty = $this->getDirty();

        if (empty($dirty)) {
            return 0;
        }

        if ($this->usesTimestamps()) {
            $this->updateTimestamps();
            $dirty = $this->getDirty();
        }

        $diff = array_diff(array_keys($dirty), array_keys($this->original));
        throw_if(!empty($diff), Exception::class, 'key [' . implode(',', $diff) . '] not exists when cas!');

        if ($this->fireModelEvent('casing') === false) {
            return 0;
        }

        $query = $this->newModelQuery()->where($this->getKeyName(), $this->getKey());
        foreach ($dirty as $key => $value) {
            $query = $query->where($key, $this->getOriginal($key));
        }

        $row = $query->update($dirty);
        if ($row > 0) {
            $this->syncChanges();
            $this->fireModelEvent('cased', false);
            $this->syncOriginal();
        }
        return $row;
    }

    /**
     * Register a casing model event with the dispatcher.
     *
     * @param Closure|string $callback
     * @return void
     */
    public static function casing($callback)
    {
        static::registerModelEvent('casing', $callback);
    }

    /**
     * Register a cased model event with the dispatcher.
     *
     * @param Closure|string $callback
     * @return void
     */
    public static function cased($callback)
    {
        static::registerModelEvent('cased', $callback);
    }
}
