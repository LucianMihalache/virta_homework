<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Station
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $latitude
 * @property string $longitude
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Station extends Model
{
    /**
     * @var string[]
     */
    protected $guarded = ['id'];
}
