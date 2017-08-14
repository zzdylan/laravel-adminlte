<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'zz',
                'password' => '$2y$10$lqs0zK4w4sXfMfwQNAIy9OzlPHfpGdc2AOD94QtrW7yWzvR3reoXq',
                'name' => 'zz',
                'avatar' => NULL,
                'remember_token' => 'd2iJewOJNdryQk0C4VXtvMIIPMAetxgSsb6RoiocmkTLKPiCgQTMBadyAU6L',
                'created_at' => '2017-07-28 16:52:45',
                'updated_at' => '2017-07-28 16:52:45',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'zzz',
                'password' => '$2y$10$lqs0zK4w4sXfMfwQNAIy9OzlPHfpGdc2AOD94QtrW7yWzvR3reoXq',
                'name' => 'zzz',
                'avatar' => NULL,
                'remember_token' => 'sSglYdOeiwva1GGVrwv3xQqGqXVuQVIb2xH2TrLqCEj26TU2FbZj4OZ4yLCM',
                'created_at' => '2017-07-28 16:52:45',
                'updated_at' => '2017-08-11 13:46:06',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'zz0',
                'password' => '$2y$10$9thnNI4SBwg5Bd0iFCCH3e.bSiIoXIwdVEr7Su5aOlpLblpyolx0y',
                'name' => 'zz0',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:58',
                'updated_at' => '2017-08-04 17:26:58',
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'zz1',
                'password' => '$2y$10$Ns8vcGpq.7xxbUBG7TVENexlQIxSdKqzrvQZSzwx8zPCDxcoj2A6K',
                'name' => 'zz1',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:58',
                'updated_at' => '2017-08-04 17:26:58',
            ),
            4 => 
            array (
                'id' => 5,
                'username' => 'zz2',
                'password' => '$2y$10$/TzwZ6URvhOOrLEaZI6LXOvwWxM.TrzHB5h9KpQMN3IYSp6Utq2Ma',
                'name' => 'zz2',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:58',
                'updated_at' => '2017-08-04 17:26:58',
            ),
            5 => 
            array (
                'id' => 6,
                'username' => 'zz3',
                'password' => '$2y$10$WNhmqn0ofWaJmCr7.bVBf.NUViCJDPK8WISvlBSHVBN6.bk9dJjtO',
                'name' => 'zz3',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            6 => 
            array (
                'id' => 7,
                'username' => 'zz4',
                'password' => '$2y$10$PpLiZLQd2vxH.wWt1u3maesNQNtOj27SIzxb8vFaLha5PdwM9tauK',
                'name' => 'zz4',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            7 => 
            array (
                'id' => 8,
                'username' => 'zz5',
                'password' => '$2y$10$.mUX7b5Z1Ks7NeGIbtNq7enl2q/lscjEvOKiJtMusC7sV.nhOBT8u',
                'name' => 'zz5',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            8 => 
            array (
                'id' => 9,
                'username' => 'zz6',
                'password' => '$2y$10$ndERXy0Qp7sJOzv/5LbfSOA4RkDP9lA130ImvDpPrtgGKoSqAibem',
                'name' => 'zz6',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            9 => 
            array (
                'id' => 10,
                'username' => 'zz7',
                'password' => '$2y$10$dAsWREccYIuLKEo8JNpwKOkhYnasCWC0VCJQULDzQ1lIdaFfizdzy',
                'name' => 'zz7',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            10 => 
            array (
                'id' => 11,
                'username' => 'zz8',
                'password' => '$2y$10$b23xvbaSDqIC6gTi0kHppu4CbO/AJmAPAUJ6MWV5irD6i4xFySG7K',
                'name' => 'zz8',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            11 => 
            array (
                'id' => 12,
                'username' => 'zz9',
                'password' => '$2y$10$aBnvZDGBNXPGbdIc8FjzxuaPW0n/iukgoujYTXK00SIW7fJqY/3PO',
                'name' => 'zz9',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            12 => 
            array (
                'id' => 13,
                'username' => 'zz10',
                'password' => '$2y$10$1YcwN4xZ3XEnKYQ7fTs7pOLkzPJ6DPczln9Q/971HumqT4z0SHTXi',
                'name' => 'zz10',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            13 => 
            array (
                'id' => 14,
                'username' => 'zz11',
                'password' => '$2y$10$xx61SSpyc6kNykgSajMO0O0ct5tKe/xSXEU6vIIAbr6vGBRf68S6a',
                'name' => 'zz11',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            14 => 
            array (
                'id' => 15,
                'username' => 'zz12',
                'password' => '$2y$10$v1b8rZrbVmjxh.d6fDjpSeSJvDVy9ON/M3x6FEl/8Hsa/kFzaS/jy',
                'name' => 'zz12',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            15 => 
            array (
                'id' => 16,
                'username' => 'zz13',
                'password' => '$2y$10$OB.tFVEWR3MOhUBGbT4nA.lYtOdOG078psOLKQXQbnc.sWqpzHL4K',
                'name' => 'zz13',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:26:59',
                'updated_at' => '2017-08-04 17:26:59',
            ),
            16 => 
            array (
                'id' => 17,
                'username' => 'zz14',
                'password' => '$2y$10$xhV/7ryPOmlVNQEgNM7GBO2rH1IwRwQf9yrXu0cSEMrLu1x9u39L.',
                'name' => 'zz14',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            17 => 
            array (
                'id' => 18,
                'username' => 'zz15',
                'password' => '$2y$10$zHz6kKMV3U76vaSZxoDfuuBTNREeHfy4cvIJkEkvGeGyvJCJtfycK',
                'name' => 'zz15',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            18 => 
            array (
                'id' => 19,
                'username' => 'zz16',
                'password' => '$2y$10$S0yQssV5GdRAB4WAwZW5DOa7Wq/gvgnAVUKPzVe1.d6aokoFv3XPS',
                'name' => 'zz16',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            19 => 
            array (
                'id' => 20,
                'username' => 'zz17',
                'password' => '$2y$10$o4FA5uHZnD2m3P8CJ3aZHezQmg2/Ma6rOQBomssdJrkAgaJI5IgOC',
                'name' => 'zz17',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            20 => 
            array (
                'id' => 21,
                'username' => 'zz18',
                'password' => '$2y$10$2BXolEn.kJzYjCK9MkwmIOH9awmNowpjAXOjDrO.f2pGYCB4SVMje',
                'name' => 'zz18',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            21 => 
            array (
                'id' => 23,
                'username' => 'zz20',
                'password' => '$2y$10$kwPAbzpD59SVhktT97SWOO53ucy1KQggMSkBwdjIYY00u1hOvMVUK',
                'name' => 'zz20',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            22 => 
            array (
                'id' => 24,
                'username' => 'zz21',
                'password' => '$2y$10$3.zd16q/sfWESYDwmxe7xuV.lakf0rsAsizGQCDeAmO0SS8q.T.Ti',
                'name' => 'zz21',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            23 => 
            array (
                'id' => 25,
                'username' => 'zz22',
                'password' => '$2y$10$.oPlKPOvbOY4m9mifs8mGOffqoO/K5m9ItCrlizVPNBf.cf1kz2vG',
                'name' => 'zz22',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            24 => 
            array (
                'id' => 26,
                'username' => 'zz23',
                'password' => '$2y$10$hIxJF1xP0xCbFVw4GQLqP.6tzbOtLrIpkvhZl5TcVNL3denz1wS3i',
                'name' => 'zz23',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            25 => 
            array (
                'id' => 27,
                'username' => 'zz24',
                'password' => '$2y$10$1U4AbayEJZqSGhim6fAMy.BVv3Efsb9zvEtf/lBPGxD7Y6PJDhwx6',
                'name' => 'zz24',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            26 => 
            array (
                'id' => 28,
                'username' => 'zz25',
                'password' => '$2y$10$lMmTQNfKig/t4AFniJw5FOBKdXuSRiMD7Zvd0POA6NY2S0f0IcAU6',
                'name' => 'zz25',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:00',
                'updated_at' => '2017-08-04 17:27:00',
            ),
            27 => 
            array (
                'id' => 29,
                'username' => 'zz26',
                'password' => '$2y$10$flaSNXCBW5swHK5ezI1KVOAtQDu4ZvzsVRO2Pjw4s2wrhgmJRLXpm',
                'name' => 'zz26',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            28 => 
            array (
                'id' => 30,
                'username' => 'zz27',
                'password' => '$2y$10$1vKTXEC0xL1skiPVAjqoee.9tk1fHNcg4v9BCTtTc60WgyE/AJw4i',
                'name' => 'zz27',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            29 => 
            array (
                'id' => 31,
                'username' => 'zz28',
                'password' => '$2y$10$NuFYjoD85EkZugl3C7911umlSBgkfX3RaXIE/MhdEVOeoLVJzQqIK',
                'name' => 'zz28',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            30 => 
            array (
                'id' => 32,
                'username' => 'zz29',
                'password' => '$2y$10$eO/fbXplEezZDq91hzdwyu10DDvyC9G5chwfrKdDTcHb.b2JPfPAe',
                'name' => 'zz29',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            31 => 
            array (
                'id' => 33,
                'username' => 'zz30',
                'password' => '$2y$10$.hlRo/SKP.CHRnugGvw1P.ACb18TErWiJDX1tjwJINm./mB2KH7eS',
                'name' => 'zz30',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            32 => 
            array (
                'id' => 34,
                'username' => 'zz31',
                'password' => '$2y$10$7B1Ng/UOi9ZsqqDZ7tLNI.w3PsDCAhUnuWEQsox00nn/cNWDHdsci',
                'name' => 'zz31',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            33 => 
            array (
                'id' => 35,
                'username' => 'zz32',
                'password' => '$2y$10$3kMeK3bxGwpTADM1ZfXcPuCIc1R7IoZD5Ai8FKSPvvcVuqmw2UuhC',
                'name' => 'zz32',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            34 => 
            array (
                'id' => 36,
                'username' => 'zz33',
                'password' => '$2y$10$Aszh8wJoDYnXLC.N3xKn0eP.JOJGblDTt8OuVHpgTwhm2zWUc515e',
                'name' => 'zz33',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            35 => 
            array (
                'id' => 37,
                'username' => 'zz34',
                'password' => '$2y$10$JJsZ.b4prSXG2.6o/MWS7.dTlJcOHsZPx/OmHTZsl.u/o81Xf4I1S',
                'name' => 'zz34',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            36 => 
            array (
                'id' => 38,
                'username' => 'zz35',
                'password' => '$2y$10$prQ9x7MWsBWJKZW57D7xQ.saWVu.hYCNWNvVi.TAJdo4Td3ijWOXy',
                'name' => 'zz35',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            37 => 
            array (
                'id' => 39,
                'username' => 'zz36',
                'password' => '$2y$10$KiD2KxsdXvoB3.2fT1wcPur2lsRmPdzNZjcI7CKr1aPyVVRZ1qxPG',
                'name' => 'zz36',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:01',
                'updated_at' => '2017-08-04 17:27:01',
            ),
            38 => 
            array (
                'id' => 40,
                'username' => 'zz37',
                'password' => '$2y$10$aVrtvK3vaLzR0PU31kGb1.cUkWZ7NXZkZ9sVmYw/jnebSIHZ3Cz/a',
                'name' => 'zz37',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-04 17:27:02',
                'updated_at' => '2017-08-04 17:27:02',
            ),
            39 => 
            array (
                'id' => 53,
                'username' => 'test',
                'password' => '$2y$10$Fz4Kj4bk2g3EZlEsyvEDUuWcEAZqek42Q8F1Aq4E0Xs9vrlEQpLYS',
                'name' => 'test',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-05 03:02:22',
                'updated_at' => '2017-08-05 03:02:22',
            ),
            40 => 
            array (
                'id' => 55,
                'username' => 'test1',
                'password' => '$2y$10$buPX1jwYJgGdRwSno36ZDOhEBuT/y6MwKdcwRIIVyPZY7HvD0FBWC',
                'name' => 'test',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-05 03:10:29',
                'updated_at' => '2017-08-05 03:10:29',
            ),
            41 => 
            array (
                'id' => 56,
                'username' => 'testqq',
                'password' => '$2y$10$Ly7o7IKYntTNzxIB8x0kLeiVdeBoxGCEj.qqkX43e0u6b5USHLDXW',
                'name' => 'testt',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-05 03:10:49',
                'updated_at' => '2017-08-05 03:10:49',
            ),
            42 => 
            array (
                'id' => 57,
                'username' => 'tttt',
                'password' => '$2y$10$zW8uoqXi/C6/CJqYjIY.huWq8lvFit5hM0RB2SmCLBSAfl2v7uCH6',
                'name' => 'dsf',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-08-05 03:12:46',
                'updated_at' => '2017-08-05 03:12:46',
            ),
            43 => 
            array (
                'id' => 58,
                'username' => 'admin',
                'password' => '$2y$10$TQmlEYxYMtOgQ04JPA540u4VM/GzpX11En/NuAtvc7H5xYLKMnSdS',
                'name' => 'admin',
                'avatar' => NULL,
                'remember_token' => 'AFunk4VbyCkrV4ke1O6znB7zbkhBfq8ytvngcPZRD8keGPZN8rlfMDdEy4TS',
                'created_at' => '2017-08-05 09:33:43',
                'updated_at' => '2017-08-05 09:33:43',
            ),
            44 => 
            array (
                'id' => 60,
                'username' => '测试用户',
                'password' => '$2y$10$ydTqqH59jEzyDjMHUGB7oe8LbmnRG/WpUB5z9yilv2MkP2AcrO/K2',
                'name' => '测试用户',
                'avatar' => NULL,
                'remember_token' => 'i3u6WL5qlhoLAenSArHJnHOU68ic4E5vrf8kaY6E2yxnxGF2twDDt1CjsVxf',
                'created_at' => '2017-08-05 16:05:17',
                'updated_at' => '2017-08-05 16:05:17',
            ),
        ));
        
        
    }
}