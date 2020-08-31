<?php

declare(strict_types=1);

namespace App\Entity;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Einzahlung extends Eloquent
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'einzahlung';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['beitrag', 'konto_id','created_at','updated_at','id'];

    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
      'created_at' => 'datetime:d.m.Y H:i:s',
    ];

    protected $primaryKey = 'id';


    public function konto()
    {
        return $this->belongsTo(konto::class);
    }

    public static function geteinzahlung_byID(int $konto_id): array
    {
        $list = [];

        $einzahlung = Einzahlung::select('beitrag', 'konto_id', 'created_at')->where('konto_id', $konto_id)->get();

        foreach ($einzahlung as $l) {
            $list[] = $l;
        }

        return $list;
    }
}
