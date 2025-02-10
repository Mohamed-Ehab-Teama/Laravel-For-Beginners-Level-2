<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:create {productName} {prodcutPrice} {--new}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is Command For Creating Database record in the products table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $prodName = $this->argument('productName');
        $prodPrice = $this->argument('prodcutPrice');
        $newOrNot = $this->option('new');
        // dd($prodName, $prodPrice, $newOrNot);
        $createProductResult = Product::updateOrCreate(
            ['name' => $prodName],
            ["price" => $prodPrice],
        );

        if ($createProductResult) 
        {
            return $this->info('Product Created Succesfully');
        }else{
            return $this->error('Something went wrong');
        }
    }
}
