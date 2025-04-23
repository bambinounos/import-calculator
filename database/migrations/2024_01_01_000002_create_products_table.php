// 2024_01_01_000002_create_products_table.php
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->foreignId('import_id')->constrained();
        $table->string('partida_code');
        $table->string('description');
        $table->decimal('unit_weight', 10, 2);
        $table->integer('quantity');
        $table->decimal('unit_price', 10, 2);
        $table->decimal('total_price', 15, 2);
        $table->decimal('freight_share', 15, 2)->nullable();
        $table->decimal('insurance_share', 15, 2)->nullable();
        $table->decimal('cif_value', 15, 2)->nullable();
        $table->decimal('tariff_amount', 15, 2)->nullable();
        $table->decimal('safeguard_amount', 15, 2)->nullable();
        $table->decimal('vat_amount', 15, 2)->nullable();
        $table->decimal('total_cost', 15, 2)->nullable();
        $table->timestamps();
    });
}
