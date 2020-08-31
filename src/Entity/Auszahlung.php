<?php

declare(strict_types=1);

namespace App\Entity;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Auszahlung extends Eloquent
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'auszahlung';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['beitrag', 'konto_id','created_at','updated_at','id'];

    protected $primaryKey = 'id';

    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
      'created_at' => 'datetime:d.m.Y H:i:s',
      'updated_at' => 'datetime:d.m.Y H:i:s',
    ];


    public function konto()
    {
        return $this->belongsTo(konto::class);
    }

    public static function getauszahlung_byID(int $konto_id): array
    {
        $list = [];

        $einzahlung = Auszahlung::select('beitrag', 'konto_id', 'created_at')->where('konto_id', $konto_id)->get();

        foreach ($einzahlung as $l) {
            $list[] = $l;
        }

        return $list;
    }
}
