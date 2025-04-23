// ImportController.php
        foreach ($records as $record) {
            $product = $import->products()->create([
                'partida_code' => $record['partida_code'],
                'description' => $record['description'],
                'unit_weight' => $record['unit_weight'],
                'quantity' => $record['quantity'],
                'unit_price' => $record['unit_price'],
                'total_price' => $record['quantity'] * $record['unit_price']
            ]);

            $totalWeight += $product->unit_weight * $product->quantity;
            $totalValue += $product->total_price;
        }

        // Distribuir gastos
        $freight = 500; // Valor ejemplo, debería venir de configuración
        $insurance = 100; // Valor ejemplo

        foreach ($import->products as $product) {
            $weightRatio = $product->unit_weight / $totalWeight;
            $valueRatio = $product->total_price / $totalValue;

            $product->update([
                'freight_share' => $method === 'weight' ? $freight * $weightRatio : $freight * $valueRatio,
                'insurance_share' => $method === 'weight' ? $insurance * $weightRatio : $insurance * $valueRatio,
                'cif_value' => $product->total_price + $product->freight_share + $product->insurance_share
            ]);

            $tariff = Tariff::where('code', $product->partida_code)->first();
            $product->update([
                'tariff_amount' => $tariff ? $product->cif_value * $tariff->tariff_rate / 100 : 0,
                'safeguard_amount' => $tariff ? $product->cif_value * $tariff->safeguard_rate / 100 : 0,
                'vat_amount' => ($product->cif_value + $product->tariff_amount + $product->safeguard_amount) 
                    * Setting::get('vat_rate', 0.12),
                'total_cost' => $product->cif_value + $product->tariff_amount 
                    + $product->safeguard_amount + $product->vat_amount
            ]);
        }

        $import->update([
            'total_cif' => $import->products()->sum('cif_value'),
            'total_taxes' => $import->products()->sum('total_cost') - $totalValue
        ]);
    }
}
