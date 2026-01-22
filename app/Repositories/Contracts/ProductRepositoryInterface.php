<?php

namespace App\Repositories\Contracts;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    /**
     * Get paginated products with optional search.
     */
    public function paginateWithSearch(
        ?string $search,
        int $perPage = 10
    ): LengthAwarePaginator;

    /**
     * Store a new product.
     */
    public function create(array $data): Product;

    /**
     * Update an existing product.
     */
    public function update(Product $product, array $data): bool;

    /**
     * Delete a product.
     */
    public function delete(Product $product): bool;
}
