// 2024_01_01_000003_create_tariffs_table.php
public function up()
{
    Schema::create('tariffs', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique();
        $table->text('description')->nullable();
        $table->decimal('tariff_rate', 5, 2);
        $table->decimal('safeguard_rate', 5, 2);
        $table->timestamps();
    });
}
