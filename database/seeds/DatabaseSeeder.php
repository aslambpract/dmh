<?php



use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;



class DatabaseSeeder extends Seeder

{

    /**

     * Seed the application's database.

     *

     * @return void

     */

    public function run()

    {

         Model::unguard();

          // Add calls to Seeders here

      



        $this->call('UsersTableSeeder');

        $this->call('settingsTableSeeder');

        $this->call('OptionsTableSeeder');

        $this->call('TreeTableSeeder');

        $this->call('PointTableSeeder');

        $this->call('userbalanceSeeder');

        $this->call('RanksettingSeeder');

        $this->call('sponsortreeSeeder');

        // $this->call('CountriesSeeder');

        // $this->command->info('Seeded the countries!');

        

        

        $this->call('PackageSeeder');

        

        $this->call('LoyaltyBonusSeeder');

        $this->call('LeadershipSeeder');

        $this->call('MatchingbonusSeeder');



        

        // $this->call('productsSeeder');

        $this->call('AppSeeder');

        $this->call('CurencySeeder');

        $this->call('EmailsSeeder');

        $this->call('EmailSettingSeeder');

        $this->call('EmailTemplateSeeder');

         // $this->call('welcomeemailSeeder');

        $this->call('TempDetailsSeeder');

        $this->call('PaymenttypeSeeder');

        $this->call('PaymentNotificationTableSeeder');

        $this->call('MenuSettingsTableSeeder');

        $this->call('ProfileInfoSeeder');

        $this->call('TicketStatusSeeder');

        $this->call('TicketPrioritySeeder');

        $this->call('ticket_category');

        $this->call('PaymentGatewayDetailsSeeder');

        $this->call('payout_gateway_detailsSeeder');

        $this->call('TicketDepartmentSeeder');

        $this->call('Payoutmanagemt');

        $this->call('CampaignGroupSeeder');

        $this->call('SystemLanguagesSeeder');

        $this->call('BackupSettingsSeeder');

        $this->call('BinaryCommissionSeeder');

        $this->call('LevelCommissionSeeder');

        $this->call('Levelsettingseeder');

        $this->call('SponsorCommissionSeeder');

        $this->call('shopingcountrySeeder');

        $this->call('shopingzoneSeeder');

        $this->call('SalarysettingsSeeder');

        $this->call('RiwardSettingSeeder');

        $this->call('EwalletTableSeeder');
        $this->call('SignupBonusSeeder');
        $this->call('PurchaseHistory');
        $this->call('SignUpSeeder');
        $this->call('UserAccountsSeeder');
        $this->call('TreeTable2Seeder');
        $this->call('TreeTable3Seeder');
        $this->call('TreeTable4n5Seeder');

        $this->call('StagesTableSeeder');
        $this->call('TreeTable6n18Seeder');
        $this->call('SubadminRoleTableSeeder'); 





      

      



        Model::reguard();

    }

}

