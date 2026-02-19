<?php

namespace App\Repositories;

use Yajra\DataTables\DataTables;
use App\Models\IthingsCategory;

class IthingsCategoryRepository
{
    /**
     * Get datatable for ajax
     *
     * @return mixed
     */
    public function getDatatable()
    {
        $categories = IthingsCategory::orderBy('created_at', 'desc')->get();
        return DataTables::of($categories)
            ->addColumn('name', function ($category) {
                return $category->name;
            })
            ->addColumn('slug', function ($category) {
                return $category->slug;
            })
            ->addColumn('description', function ($category) {
                return $category->description ? substr($category->description, 0, 50) . '...' : '-';
            })
            ->addColumn('products_count', function ($category) {
                return $category->products->count();
            })
            ->addColumn('created_at', function ($category) {
                return \Carbon\Carbon::parse($category->created_at)->translatedFormat('d F Y');
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    /**
     * @return Collection
     */
    public function get(array $condition = [])
    {
        return IthingsCategory::orderBy('name', 'asc')
            ->when(count($condition) > 0, function ($q) use ($condition) {
                $q->where($condition);
            })
            ->get();
    }

    public function count(array $condition = [])
    {
        return IthingsCategory::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    /**
     * Get Category by id
     *
     * @param int $id
     * @return IthingsCategory
     */
    public function findById($id)
    {
        return IthingsCategory::find($id);
    }

    /**
     * Get Category by slug
     *
     * @param string slug
     * @return IthingsCategory
     */
    public function findBySlug($slug)
    {
        return IthingsCategory::where('slug', $slug)->first();
    }
    
    /**
     * @param IthingsCategory $data
     * @return IthingsCategory
     */
    public function save($data)
    {
        try {
            $slug = \Str::slug($data['name'], '-');

            $category = new IthingsCategory;
            $category->name = $data['name'];
            $category->description = $data['description'] ?? null;
            $category->slug = $this->findBySlug($slug) ? $slug .= '-' . \Str::random(5) . time() : $slug;
            $category->created_at = now();

            $category->save();
            return $category->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param int $id
     * @param IthingsCategory $data
     * @return IthingsCategory
     */
    public function update($id, $data)
    {
        try {
            $slug = \Str::slug($data['name'], '-');

            $category = IthingsCategory::find($id);
            $category->name = $data['name'];
            $category->description = $data['description'] ?? null;
            $category->updated_at = now();

            // check if slug is changing
            if ($category->slug !== $slug) {
                if ($this->findBySlug($slug)) {
                    $slug .= '-' . \Str::random(5) . time();
                }
                $category->slug = $slug;
            }

            $category->save();
            return $category;
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

        $result = \DB::table('ithings_categories')->whereRaw($query)->delete();

        return $result;
    }
}
