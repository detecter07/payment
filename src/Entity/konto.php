<?php


namespace App\Entity;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Entity\Einzahlung;
use App\Entity\ueberweisung;

class konto extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['konto_inhaber', 'konto_nummer', 'id','konto_stand'];

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


    public function einzahlungen()
    {
        return $this->hasMany(Einzahlung::class);
    }

    public function uebeiweisung()
    {
        return $this->hasMany(ueberweisung::class);
    }


}
