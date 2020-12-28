<?php

use Illuminate\Database\Seeder;

class SubadminRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           \App\SubadminRole::create([
            'role_name'         => "Dashboard",
            'link'              => "admin/dashboard",
            'submenu_count'     => 1,
            'is_root'           => "yes",
            'parent_id'         => 0,
            'main_role'         => 1,
            'icon'              => "icon-home",
            'role_no'           => 0,
        ]);
         \App\SubadminRole::create([
            'role_name'          => "Dashboard",
            'link'               => "admin/dashboard",
            'submenu_count'      => 0,
            'is_root'            => "no",
            'parent_id'          => 1,
            'main_role'          => 0,
            'icon'               => "#",
            'role_no'            => 1,
        ]);

          \App\SubadminRole::create([
            'role_name'         => "Sub Admin",
            'link'              => "admin/adminregister",
            'submenu_count'     => 2,
            'is_root'           => "yes",
            'parent_id'         => 0,
            'main_role'         => 1,
            'icon'              => "icon-users",
            'role_no'           => 0,
        ]);
         \App\SubadminRole::create([
            'role_name'          => "Sub Admin",
            'link'               => "admin/adminregister",
            'submenu_count'      => 0,
            'is_root'            => "no",
            'parent_id'          => 3,
            'main_role'          => 0,
            'icon'               => "#",
            'role_no'            => 2,
        ]);
         \App\SubadminRole::create([
            'role_name'          => "View All",
            'link'               => "admin/viewalladmin",
            'submenu_count'      => 0,
            'is_root'            => "no",
            'parent_id'          => 3,
            'main_role'          => 0,
            'icon'               => "#",
            'role_no'            => 3,
        ]); 

          \App\SubadminRole::create([
            'role_name'             => "Members",
            'link'                  => "admin/users",
            'submenu_count'         => 3,
            'is_root'               => "yes",
            'parent_id'             => 0,
            'main_role'             => 1,
            'icon'                  => "icon-users",
            'role_no'               => 0,
        ]);
        
         \App\SubadminRole::create([
            'role_name'             => "list All Members",
            'link'                  => "admin/users",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 6,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 4,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "Change Password",
            'link'                  => "admin/users/password",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 6,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 5,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "Change Username",
            'link'                  => "admin/users/password",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 6,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 6,
        ]); 


        \App\SubadminRole::create([
            'role_name'             => "Transactions",
            'link'                  => "admin/wallet",
            'submenu_count'         => 4,
            'is_root'               => "yes",
            'parent_id'             => 0,
            'main_role'             => 1,
            'icon'                  => "icon-credit-card",
            'role_no'               => 0,
        ]);
  
      
         \App\SubadminRole::create([
            'role_name'             => "Transaction history",
            'link'                  => "admin/wallet",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 10,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 7,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "Transfer Credit",
            'link'                  => "admin/fund-credits",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 10,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 8,
        ]);



         \App\SubadminRole::create([
            'role_name'             => "Payout Requests",
            'link'                  => "admin/payoutrequest",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 10,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 9,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "Failed payout",
            'link'                  => "admin/failedpayout",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 10,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 10,
        ]); 

       
          \App\SubadminRole::create([
            'role_name'             => "Support",
            'link'                  => "admin/inbox",
            'submenu_count'         => 2,
            'is_root'               => "yes",
            'parent_id'             => 0,
            'main_role'             => 1,
            'icon'                  => "icon-credit-card",
            'role_no'               => 0,
        ]);
      
         \App\SubadminRole::create([
            'role_name'             => "Mailbox",
            'link'                  => "admin/inbox",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 15,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 11,
        ]); 
        
         \App\SubadminRole::create([
            'role_name'             => "Tickets",
            'link'                  => "admin/helpdesk/tickets-dashboard",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 15,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 12,
        ]); 
        \App\SubadminRole::create([
            'role_name'             => "Resources",
            'link'                  => "admin/documentupload",
            'submenu_count'         => 3,
            'is_root'               => "yes",
            'parent_id'             => 0,
            'main_role'             => 1,
            'icon'                  => "icon-download",
            'role_no'               => 0,
        ]);
        
         \App\SubadminRole::create([
            'role_name'             => "Documents",
            'link'                  => "admin/documentupload",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 18,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 13,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "News",
            'link'                  => "admin/getnews",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 18,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 14,
        ]);


         \App\SubadminRole::create([
            'role_name'             => "Videos",
            'link'                  => "admin/addvideos",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 18,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 15,
        ]);

       \App\SubadminRole::create([
            'role_name'             => "Settings",
            'link'                  => "admin/control-panel",
            'submenu_count'         => 3,
            'is_root'               => "yes",
            'parent_id'             => 0,
            'main_role'             => 1,
            'icon'                  => "icon-settings",
            'role_no'               => 0,
        ]);
        
         \App\SubadminRole::create([
            'role_name'             => "Control Panel",
            'link'                  => "admin/control-panel",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 22,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 16,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "Stage settings",
            'link'                  => "admin/control-panel/package-manager",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 22,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 17,
        ]);


         \App\SubadminRole::create([
            'role_name'             => "Pay Status",
            'link'                  => "admin/approve_payments",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 22,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 18,
        ]);   

          \App\SubadminRole::create([
            'role_name'             => "Reports",
            'link'                  => "admin/joiningreport",
            'submenu_count'         => 4,
            'is_root'               => "yes",
            'parent_id'             => 0,
            'main_role'             => 1,
            'icon'                  => "icon-printer",
            'role_no'               => 0,
        ]);
  
      
         \App\SubadminRole::create([
            'role_name'             => "Joining Report",
            'link'                  => "admin/joiningreport",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 26,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 19,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "Income Report",
            'link'                  => "admin/incomereport",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 26,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 20,
        ]);



         \App\SubadminRole::create([
            'role_name'             => "Top Earners Report",
            'link'                  => "admin/topearners",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 26,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 21,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "Payout Report",
            'link'                  => "admin/payoutreport",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 26,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 22,
        ]); 

         \App\SubadminRole::create([
            'role_name'             => "Profile",
            'link'                  => "admin/userprofile",
            'submenu_count'         => 1,
            'is_root'               => "yes",
            'parent_id'             => 0,
            'main_role'             => 1,
            'icon'                  => "icon-user",
            'role_no'               => 0,
        ]);

         \App\SubadminRole::create([
            'role_name'             => "Profile",
            'link'                  => "admin/userprofile",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 31,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 23,
        ]); 

         \App\SubadminRole::create([
            'role_name'             => "Genealogy",
            'link'                  => "admin/sponsortree",
            'submenu_count'         => 1,
            'is_root'               => "yes",
            'parent_id'             => 0,
            'main_role'             => 1,
            'icon'                  => "icon-layers",
            'role_no'               => 0,
        ]); 

          \App\SubadminRole::create([
            'role_name'             => "Sponsor Genealogy",
            'link'                  => "admin/sponsortree",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 33,
            'main_role'             => 0,
            'icon'                  => "icon-layers",
            'role_no'               => 24,
        ]);

          \App\SubadminRole::create([
            'role_name'             => "Bronze",
            'link'                  => "admin/genealogy/1",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 33,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 25,
        ]); 

          \App\SubadminRole::create([
            'role_name'             => "Silver",
            'link'                  => "admin/genealogy1",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 33,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 26,
        ]); 

           \App\SubadminRole::create([
            'role_name'             => "Gold",
            'link'                  => "admin/genealogy/7",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 33,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 27,
        ]);

           \App\SubadminRole::create([
            'role_name'             => "Platinum",
            'link'                  => "admin/genealogy/10",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 33,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 28,
        ]);

           \App\SubadminRole::create([
            'role_name'             => "Diamond",
            'link'                  => "admin/genealogy/13",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 33,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 29,
        ]);    

           \App\SubadminRole::create([
            'role_name'             => "Diamond 1",
            'link'                  => "admin/genealogy/16",
            'submenu_count'         => 0,
            'is_root'               => "no",
            'parent_id'             => 33,
            'main_role'             => 0,
            'icon'                  => "#",
            'role_no'               => 30,
        ]);                                   
    }
}
