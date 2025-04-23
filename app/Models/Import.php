// Import.php
class Import extends Model
{
    protected $fillable = [
        'user_id', 'name', 'currency', 'exchange_rate', 
        'total_cif', 'total_taxes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
