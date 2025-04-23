// Tariff.php
class Tariff extends Model
{
    protected $fillable = [
        'code', 'description', 'tariff_rate', 'safeguard_rate'
    ];
}
