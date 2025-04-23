// Product.php
class Product extends Model
{
    protected $fillable = [
        'import_id', 'partida_code', 'description', 'unit_weight',
        'quantity', 'unit_price', 'total_price', 'freight_share',
        'insurance_share', 'cif_value', 'tariff_amount',
        'safeguard_amount', 'vat_amount', 'total_cost'
    ];

    public function import()
    {
        return $this->belongsTo(Import::class);
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class, 'partida_code', 'code');
    }
}
