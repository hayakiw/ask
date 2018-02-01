<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => '家庭教師',
                'children' => [
                  '英語',
                  '数学',
                  '社会',
                ],
            ],
            [
                'name' => '配達',
                'children' => [
                  'チラシ',
                  '食品',
                ],
            ],
        ];

        foreach ($categories as $category) {
            $current = Category::where('name', '=', $category['name'])->first();
            if (!$current) {
                $current = new Category();
            }

            $current->name = $category['name'];
            $current->parent_id = null;
            $current->save();

            if (isset($category['children']) && count($category['children']) > 0) {
                if (!isset($current->id)) continue;
                foreach ($category['children'] as $c_name) {
                    $child = Category::where([
                      'name' => $c_name,
                      'parent_id' => $current->id,
                    ])->first();

                    if (!$child) {
                        $child = new Category();
                    }

                    $child->name = $c_name;
                    $child->parent_id = $current->id;
                    $child->save();
                }
            }
        }
    }
}
