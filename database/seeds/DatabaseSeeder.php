<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call('UserTableSeeder');
        $this->command->info('The users table has been seeded!');

        $this->call('RolesTableSeeder');
        $this->command->info('The roles table has been seeded!');

        $this->call('RoleUserTableSeeder');
        $this->command->info('The pivot table roles_user has been seeded!');

        $this->call('DepartmentTableSeeder');
        $this->command->info('The pivot table departments has been seeded!');

        $this->call('CategoryTableSeeder');
        $this->command->info('The users categories has been seeded!');

        $this->call('UserTableSeeder');
        $this->command->info('The users table has been seeded!');

        $this->call('CustomerCategoryTableSeeder');
        $this->command->info('The customers_category table has been seeded!');

        $this->call('CustomerTableSeeder');
        $this->command->info('The customers table has been seeded!');

        $this->call('CountriesTableSeeder');
        $this->command->info('The countries table has been seeded!');

        $this->call('VendorCountriesTableSeeder');
        $this->command->info('The vendor_countries table has been seeded!');

        $this->call('VendorsTableSeeder');
        $this->command->info('The vendors table has been seeded!');

        $this->call('VendorsMethodsTableSeeder');
        $this->command->info('The vendors_methods table has been seeded!');

        $this->call('ProductsTableSeeder');
        $this->command->info('The product table has been seeded!');

        $this->call('ProductsContentSetTableSeeder');
        $this->command->info('The product_content_set table has been seeded!');

        $this->call('ProductsVendorMethodsTableSeeder');
        $this->command->info('The product_vendor_methods table has been seeded!');

        $this->call('ShopsTableSeeder');
        $this->command->info('The shops table has been seeded!');

        $this->call('ShippingMethodsSeeder');
        $this->command->info('The shop_methods table has been seeded!');

        $this->call('ShoCountriesSeeder');
        $this->command->info('The shop_countries table has been seeded!');

        $this->call('SupportedPaymentsSeeder');
        $this->command->info('The shop_supported_payments table has been seeded!');

        $this->call('PriceGroupsPaymentsSeeder');
        $this->command->info('The price_group_payments table has been seeded!');

        $this->call('ProductGroupToQtyTypeSeeder');
        $this->command->info('The product_qty_price_to_shop table has been seeded!');

        $this->call('ProductQtyToShopSeeder');
        $this->command->info('The product_qty_price_to_shop table has been seeded!');

        $this->call('ProductQtyTypesSeeder');
        $this->command->info('The product_qty_type table has been seeded!');

        $this->call('ProductQtyTypesNameSeeder');
        $this->command->info('The product_qty_types table has been seeded!');

        $this->call('CardsTableSeeder');
        $this->command->info('The cards table has been seeded!');

        $this->call('CustomerAddressesTableSeeder');
        $this->command->info('The customer_addresses table has been seeded!');

        $this->call('OrdersTableSeeder');
        $this->command->info('The orders table has been seeded!');

        $this->call('OrderItemsTableSeeder');
        $this->command->info('The order_items table has been seeded!');

        $this->call('ShopCategoriesProductsTableSeeder');
        $this->command->info('The categories_shop table has been seeded!');

        $this->call('OrderItemShippingItemTable');
        $this->command->info('The categories_shop table has been seeded!');

        $this->call('ShippingItemTable');
        $this->command->info('The shippings_items table has been seeded!');

        $this->call('ShippingsTableSeeder');
        $this->command->info('The shippings table has been seeded!');

        $this->call('ShippinMethodsPriceSeederTable');
        $this->command->info('The shipping_method_prices table has been seeded!');
        
        $this->call('contentSetsTableSeeder');
        $this->command->info('The contentSetsTableSeeder table has been seeded!');

        $this->call('TransactionsReasonsTableSeder');
        $this->command->info('The transaction_reasons table has been seeded!');

        $this->call('TransactionsTableSeder');
        $this->command->info('The transactions table has been seeded!');

        $this->call('ShopBestsellersTableSeeder');
        $this->command->info('The shop_bestsellers table has been seeded!');

        $this->call('CurrencyTableSeeder');
        $this->command->info('The shop_bestsellers table has been seeded!');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Model::reguard();
    }
}
