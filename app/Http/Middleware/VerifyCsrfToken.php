<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    // protected $except = [
    //     "/admin/admin_update_password","/admin/update_section_status","/admin/update_category_status","/admin/append-category-level","/admin/update_product_status"
    // ];


        protected $except = [
            '*',
        ];

}
