<?php namespace Renick\Shortener\Models;

use Model;

/**
 * Model
 */
class Shortener extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = [
        'published_at',
        'deleted_at',
        'deleted_at'
    ];
    protected $jsonable = ['meta'];
    public $timestamps = true;

    // array keys for meta data values
    protected const META_KEY_VISITS = 'visits';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'renick_shortener_entries';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    /**
     * Dynamically get short url based on current domain.
     * @return string
     */
    public function getShortUrlAttribute(): string {
        if (strlen($this->slug) < 1) {
            return '';
        }

        return url("/{$this->slug}");
    }

    /**
     * Returns the current count of clicks for this entry.
     * @return int
     */
    public function getCounterAttribute(): int {
        if (isset($this->meta[self::META_KEY_VISITS])) {
            return intval($this->meta[self::META_KEY_VISITS]);
        }
        return 0;
    }

    /**
     * Increments the counter for this entry.
     * @return void
     */
    public function onMiddlewareRedirect(): void {
        $this->meta = array_merge(
            $this->meta ?? [],
            [self::META_KEY_VISITS => ($this->getCounterAttribute() + 1)]
        );
        $this->save();
    }
}
