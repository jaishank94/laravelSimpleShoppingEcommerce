<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new \App\Product([
            'image' => 'http://2.bp.blogspot.com/-N_Tw84U6jtM/TjMIi9o59bI/AAAAAAAAAJk/KZUswggDA98/s1600/3books.gif',
            'title' => 'Potter',
            'description' => "Test Product Description goes here",
            'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'http://2.bp.blogspot.com/-N_Tw84U6jtM/TjMIi9o59bI/AAAAAAAAAJk/KZUswggDA98/s1600/3books.gif',
            'title' => 'Harry',
            'description' => "Test Product Description goes here",
            'price' => 500
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'http://2.bp.blogspot.com/-N_Tw84U6jtM/TjMIi9o59bI/AAAAAAAAAJk/KZUswggDA98/s1600/3books.gif',
            'title' => 'James',
            'description' => "Test Product Description goes here",
            'price' => 30
        ]);
        $product->save();

        $product = new \App\Product([
            'image' => 'http://2.bp.blogspot.com/-N_Tw84U6jtM/TjMIi9o59bI/AAAAAAAAAJk/KZUswggDA98/s1600/3books.gif',
            'title' => 'Bond',
            'description' => "Test Product Description goes here",
            'price' => 100
        ]);
        $product->save();
    }
}
