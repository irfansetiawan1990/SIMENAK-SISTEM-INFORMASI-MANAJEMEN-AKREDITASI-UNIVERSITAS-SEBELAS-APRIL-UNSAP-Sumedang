<?php


return [
    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai multi versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */
    'accepted' => 'input :attribute harus diterima.',
    'active_url' => 'input :attribute bukan URL yang valid.',
    'after' => 'input :attribute harus tanggal setelah :date.',
    'after_or_equal' => 'input :attribute harus berupa tanggal setelah atau sama dengan tanggal :date.',
    'alpha' => 'input :attribute hanya boleh berisi huruf.',
    'alpha_dash' => 'input :attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num' => 'input :attribute hanya boleh berisi huruf dan angka.',
    'array' => 'input :attribute harus berupa sebuah array.',
    'before' => 'input :attribute harus tanggal sebelum :date.',
    'before_or_equal' => 'input :attribute harus berupa tanggal sebelum atau sama dengan tanggal :date.',
    'between' => [
        'numeric' => 'input :attribute harus antara :min dan :max.',
        'file' => 'input :attribute harus antara :min dan :max kilobytes.',
        'string' => 'input :attribute harus antara :min dan :max karakter.',
        'array' => 'input :attribute harus antara :min dan :max item.',
    ],
    'boolean' => 'input :attribute harus berupa true atau false',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date' => 'input :attribute bukan tanggal yang valid.',
    'date_format' => 'input :attribute tidak cocok dengan format :format.',
    'different' => 'input :attribute dan :other harus berbeda.',
    'digits' => 'input :attribute harus berupa angka :digits.',
    'digits_between' => 'input :attribute harus antara angka :min dan :max.',
    'dimensions' => 'Bidang :attribute tidak memiliki dimensi gambar yang valid.',
    'distinct' => ' :attribute memiliki nilai yang duplikat.',
    'email' => 'input :attribute harus berupa alamat surel yang valid.',
    'exists' => 'input :attribute yang dipilih tidak valid.',
    'file' => 'Bidang :attribute harus berupa sebuah berkas.',
    'filled' => 'input :attribute harus memiliki nilai.',
    'image' => 'input :attribute harus berupa gambar.',
    'in' => 'input :attribute yang dipilih tidak valid.',
    'in_array' => ' :attribute tidak terdapat dalam :other.',
    'integer' => 'input :attribute harus merupakan bilangan bulat.',
    'ip' => 'input :attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'input :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'input :attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'input :attribute harus berupa JSON string yang valid.',
    'max' => [
        'numeric' => 'input :attribute seharusnya tidak lebih dari :max.',
        'file' => 'input :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string' => 'input :attribute seharusnya tidak lebih dari :max karakter.',
        'array' => 'input :attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes' => 'input :attribute harus dokumen berjenis : :values.',
    'mimetypes' => 'input :attribute harus dokumen berjenis : :values.',
    'min' => [
        'numeric' => 'input :attribute harus minimal :min.',
        'file' => 'input :attribute harus minimal :min kilobytes.',
        'string' => 'input :attribute harus minimal :min karakter.',
        'array' => 'input :attribute harus minimal :min item.',
    ],
    'not_in' => 'input :attribute yang dipilih tidak valid.',
    'numeric' => 'input :attribute harus berupa angka.',
    'present' => ' :attribute wajib ada.',
    'regex' => 'Format input :attribute tidak valid.',
    'required' => ' :attribute wajib diisi.',
    'required_if' => ' :attribute wajib diisi bila :other adalah :value.',
    'required_unless' => ' :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with' => ' :attribute wajib diisi bila terdapat :values.',
    'required_with_all' => ' :attribute wajib diisi bila terdapat :values.',
    'required_without' => ' :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => ' :attribute wajib diisi bila tidak terdapat ada :values.',
    'same' => 'input :attribute dan :other harus sama.',
    'size' => [
        'numeric' => 'input :attribute harus berukuran :size.',
        'file' => 'input :attribute harus berukuran :size kilobyte.',
        'string' => 'input :attribute harus berukuran :size karakter.',
        'array' => 'input :attribute harus mengandung :size item.',
    ],
    'string' => 'input :attribute harus berupa string.',
    'timezone' => 'input :attribute harus berupa zona waktu yang valid.',
    'unique' => 'input :attribute sudah ada sebelumnya.',
    'uploaded' => 'input :attribute gagal diunggah.',
    'url' => 'Format input :attribute tidak valid.',
    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |---------------------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut dengan menggunakan
    | konvensi "attribute.rule" dalam penamaan baris. Hal ini membuat cepat dalam
    | menentukan spesifik baris bahasa kustom untuk aturan atribut yang diberikan.
    |
    */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
    |---------------------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar atribut 'place-holders'
    | dengan sesuatu yang lebih bersahabat dengan pembaca seperti Alamat Surel daripada
    | "surel" saja. Ini benar-benar membantu kita membuat pesan sedikit bersih.
    |
    */
    'attributes' => [
    ],
];