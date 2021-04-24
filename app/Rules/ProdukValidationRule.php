<?php

namespace App\Rules;

use App\Models\BahanBaku;
use App\Models\Resep;
use Illuminate\Contracts\Validation\Rule;

class ProdukValidationRule implements Rule
{
    protected $id;
    protected $jumlah;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id, $jumlah)
    {
        $this->id = $id;
        $this->jumlah = $jumlah;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $tersedia = true;
        $reseps = Resep::where('produk_id', $this->id)->pluck('bahan_baku_id')->toArray();
        $bahanBakus = BahanBaku::whereIn('id', $reseps)->get();

        foreach ($bahanBakus as $bahanBaku) {
            $resep = Resep::where('produk_id', $this->id)
                ->where('bahan_baku_id', $bahanBaku->id)
                ->first();

            if ($bahanBaku->jumlah - ($resep->jumlah * $this->jumlah) < 0) {
                $tersedia = false;
            };
        }

        return $tersedia;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Bahan baku yang dibutuhkan tidak tersedia';
    }
}
