<?php

namespace App\Repositories;

use Yajra\DataTables\DataTables;
use App\Models\IthingsProduct;

class IthingsProductRepository
{
    /**
     * Get datatable for ajax
     *
     * @return mixed
     */
    public function getDatatable()
    {
        $products = IthingsProduct::with('category')->orderBy('created_at', 'desc')->get();
        return DataTables::of($products)
            ->addColumn('photo', function ($product) {
                if ($product->photo) {
                    return '<div class="img-wrapper img-wrapper-table"><img src=' . asset('storage/' . $product->photo) . ' alt=""></div>';
                } else {
                    return '<div class="img-wrapper img-wrapper-table"><i class="fas fa-image text-white"></i></div>';
                }
            })
            ->addColumn('name', function ($product) {
                return $product->name;
            })
            ->addColumn('price', function ($product) {
                return $product->formatted_price;
            })
            ->addColumn('size', function ($product) {
                return $product->size ?? '-';
            })
            ->addColumn('category', function ($product) {
                return $product->category->name ?? '-';
            })
            ->addColumn('status', function ($product) {
                return $product->status ?
                    '<span class="badge badge-success"><i class="fas fa-check mr-1"></i> Aktif</span>' :
                    '<span class="badge badge-secondary"><i class="fas fa-times mr-1"></i> Non-Aktif</span>';
            })
            ->addColumn('description', function ($product) {
                return $product->description ? substr(strip_tags($product->description), 0, 40) . '...' : '-';
            })
            ->addColumn('created_at', function ($product) {
                return \Carbon\Carbon::parse($product->created_at)->translatedFormat('d F Y');
            })
            ->rawColumns(['photo', 'status'])
            ->make(true);
    }

    /**
     * @return Collection
     */
    public function get(int $limit = 8, array $condition = [], array $orCondition = [], int $offset = 0)
    {
        return IthingsProduct::with('category')->orderBy('created_at', 'desc')
            ->when(count($condition) > 0, function ($q) use ($condition) {
                $q->where($condition);
            })
            ->when(count($orCondition) > 0, function ($q) use ($orCondition) {
                $q->orWhere($orCondition);
            })
            ->skip($offset)
            ->limit($limit)->get();
    }

    public function count(array $condition = [])
    {
        return IthingsProduct::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    /**
     * Get Product by id
     *
     * @param int $id
     * @return IthingsProduct
     */
    public function findById($id)
    {
        return IthingsProduct::with('category')->find($id);
    }

    /**
     * Get Product by slug
     *
     * @param string slug
     * @return IthingsProduct
     */
    public function findBySlug($slug)
    {
        return IthingsProduct::with('category')->where('slug', $slug)->first();
    }
    
    /**
     * @param IthingsProduct $data
     * @return IthingsProduct
     */
    public function save($data)
    {
        try {
            $slug = \Str::slug($data['name'], '-');

            $product = new IthingsProduct;
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->size = $data['size'] ?? null;
            $product->description = $data['description'] ?? null;
            $product->category_id = $data['category_id'];
            $product->slug = $this->findBySlug($slug) ? $slug .= '-' . \Str::random(5) . time() : $slug;
            $product->status = $data['status'] ?? 1;
            $product->created_at = now();

            // check if has photo request
            if (isset($data['photo'])) {
                $product->photo = $data['photo']->store('photo/ithings', 'public');
            }

            $product->save();
            return $product->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param int $id
     * @param IthingsProduct $data
     * @return IthingsProduct
     */
    public function update($id, $data)
    {
        try {
            $slug = \Str::slug($data['name'], '-');

            $product = IthingsProduct::find($id);
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->size = $data['size'] ?? null;
            $product->description = $data['description'] ?? null;
            $product->category_id = $data['category_id'];
            $product->status = $data['status'] ?? 1;
            $product->updated_at = now();

            // check if slug is changing
            if ($product->slug !== $slug) {
                if ($this->findBySlug($slug)) {
                    $slug .= '-' . \Str::random(5) . time();
                }
                $product->slug = $slug;
            }

            // check if has photo request
            if (isset($data['photo'])) {
                if ($product->photo && file_exists(storage_path('app/public/' . $product->photo))) {
                    \Storage::delete('public/' . $product->photo);
                }
                $product->photo = $data['photo']->store('photo/ithings', 'public');
            }

            $product->save();
            return $product;
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param array ids
     */
    public function destroys(array $ids)
    {
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            foreach ($ids as $i => $id) {
                // skip index 0, already appened on '$query'
                if ($i !== 0) $query .= " or id = $id";
            }
        }

        $result = \DB::table('ithings_products')->whereRaw($query)->delete();

        return $result;
    }
}
