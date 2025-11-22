<?php
return [
  /*
     * Which requests Origin/Domain are allowed to access the API.
     * Kita masukkan Next.js Public Interface di sini.
     */
  'paths' => ['api/*', 'sanctum/csrf-cookie'],

  'allowed_methods' => ['*'],

  // UBAH: Izinkan Origin Next.js
  'allowed_origins' => [
    'http://localhost:3000',
    'http://127.0.0.1:3000',
    // Tambahkan domain produksi Next.js di sini saat deployment
  ],

  'allowed_origins_patterns' => [],

  'allowed_headers' => ['*'],


  /*
     * Wajib TRUE jika kita menggunakan Cookie, Session, atau Token Auth (NextAuth/Sanctum)
     */
  'supports_credentials' => true,

  'exposed_headers' => [],

  'max_age' => 0,
];
