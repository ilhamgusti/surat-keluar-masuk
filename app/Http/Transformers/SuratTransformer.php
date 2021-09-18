<?php

namespace App\Http\Transformers;

use App\Models\Surat;

class SuratTransformer
{
    public static function getModel($data = null)
    {
        return Surat::findOrFail($data);
    }
    public static function toInstance(array $input, $data = null)
    {
        if (empty($data)) {
            $data = new Surat();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case 'judul':
                    $data['judul'] = $value;
                    break;
                case 'nomor':
                    $data['nomor'] = $value;
                    break;
                case 'tanggal':
                    $data['tanggal'] = $value;
                    break;
                case 'jenis':
                    $data['jenis'] = $value;
                    break;
                case 'status':
                    $data['status'] = $value;
                    break;
            }
        }

        return $data;
    }
}
