<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'parent1',
                'children' => [
                  'child1A',
                  'child1B',
                  'childC',
                ],
            ],
            [
                'name' => 'parent2',
                'children' => [
                  'child2A',
                  'child2B',
                  'childC',
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
var_dump($current->id);
            if (isset($category['children']) && count($category['children']) > 0) {
                if (!isset($current->id)) continue;
                foreach ($category['children'] as $c_name) {
                    $child = null;
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
