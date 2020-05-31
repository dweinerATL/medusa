<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use League\Csv\Reader;
use App\MedusaConfig;

class RankEquivalencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rankEquivChart = [
            1 => [
                "RMN" => "E-1",
                "GSN" => "E-1",
                "IAN" => "E-1",
                "RHN" => "E-1",
                "RMMC" => "E-1",
                "RMA" => "E-1",
                "DIPLOMATIC" => "C-1",
                "INTEL" => "C-1",
                "SFC" => "C-1",
                "RMACS" => "C-1",
                "RMMM" => "C-1",
                "DECK" => "NA",
                "ENG" => "NA",
                "CATERING" => "NA",
                "MEDICAL" => "NA",
            ],
            2 => [
                "RMN" => "E-2",
                "GSN" => "E-2",
                "IAN" => "E-2",
                "RHN" => "E-2",
                "RMMC" => "E-2",
                "RMA" => "E-2",
                "DIPLOMATIC" => "C-2",
                "INTEL" => "C-2",
                "SFC" => "C-2",
                "RMACS" => "C-1",
                "RMMM" => "C-2",
                "DECK" => "C-2",
                "ENG" => "C-2",
                "CATERING" => "C-2",
                "MEDICAL" => "NA",
            ],
            3 => [
                "RMN" => "E-3",
                "GSN" => "E-3",
                "IAN" => "E-3",
                "RHN" => "E-3",
                "RMMC" => "E-3",
                "RMA" => "E-3",
                "DIPLOMATIC" => "C-3",
                "INTEL" => "C-3",
                "SFC" => "C-3",
                "RMACS" => "C-1",
                "RMMM" => "C-3",
                "DECK" => "C-3",
                "ENG" => "C-3",
                "CATERING" => "C-3",
                "MEDICAL" => "NA",
            ],
            4 => [
                "RMN" => "E-4",
                "GSN" => "E-4",
                "IAN" => "E-4",
                "RHN" => "E-4",
                "RMMC" => "E-4",
                "RMA" => "E-4",
                "DIPLOMATIC" => "C-4",
                "INTEL" => "C-4",
                "SFC" => "NA",
                "RMACS" => "C-4",
                "RMMM" => "C-3",
                "DECK" => "C-3",
                "ENG" => "C-3",
                "CATERING" => "C-3",
                "MEDICAL" => "NA",
            ],
            5 => [
                "RMN" => "E-5",
                "GSN" => "E-5",
                "IAN" => "E-5",
                "RHN" => "E-5",
                "RMMC" => "E-5",
                "RMA" => "E-5",
                "DIPLOMATIC" => "C-5",
                "INTEL" => "C-5",
                "SFC" => "NA",
                "RMACS" => "C-5",
                "RMMM" => "C-3",
                "DECK" => "C-3",
                "ENG" => "C-3",
                "CATERING" => "C-3",
                "MEDICAL" => "NA",
            ],
            6 => [
                "RMN" => "E-6",
                "GSN" => "E-6",
                "IAN" => "E-6",
                "RHN" => "E-6",
                "RMMC" => "E-6",
                "RMA" => "E-6",
                "DIPLOMATIC" => "C-6",
                "INTEL" => "C-6",
                "SFC" => "C-6",
                "RMACS" => "C-6",
                "RMMM" => "C-6",
                "DECK" => "C-6",
                "ENG" => "C-6",
                "CATERING" => "C-6",
                "MEDICAL" => "C-6",
            ],
            7 => [
                "RMN" => "E-7",
                "GSN" => "E-7",
                "IAN" => "E-7",
                "RHN" => "E-7",
                "RMMC" => "E-7",
                "RMA" => "E-7",
                "DIPLOMATIC" => "C-7",
                "INTEL" => "C-7",
                "SFC" => "C-7",
                "RMACS" => "C-7",
                "RMMM" => "C-7",
                "DECK" => "C-7",
                "ENG" => "C-7",
                "CATERING" => "C-7",
                "MEDICAL" => "C-6",
            ],
            8 => [
                "RMN" => "E-8",
                "GSN" => "E-8",
                "IAN" => "E-8",
                "RHN" => "E-8",
                "RMMC" => "E-8",
                "RMA" => "E-8",
                "DIPLOMATIC" => "C-8",
                "INTEL" => "C-8",
                "SFC" => "C-7",
                "RMACS" => "C-8",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            9 => [
                "RMN" => "E-9",
                "GSN" => "E-9",
                "IAN" => "E-9",
                "RHN" => "E-9",
                "RMMC" => "E-9",
                "RMA" => "E-9",
                "DIPLOMATIC" => "C-9",
                "INTEL" => "C-9",
                "SFC" => "C-9",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            10 => [
                "RMN" => "E-10",
                "GSN" => "E-10",
                "IAN" => "E-10",
                "RHN" => "E-10",
                "RMMC" => "E-10",
                "RMA" => "E-10",
                "DIPLOMATIC" => "C-10",
                "INTEL" => "C-10",
                "SFC" => "C-10",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            11 => [
                "RMN" => "E-10",
                "GSN" => "E-10",
                "IAN" => "E-10",
                "RHN" => "E-10",
                "RMMC" => "E-10",
                "RMA" => "E-11",
                "DIPLOMATIC" => "C-10",
                "INTEL" => "C-10",
                "SFC" => "C-10",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            12 => [
                "RMN" => "E-10",
                "GSN" => "E-10",
                "IAN" => "E-10",
                "RHN" => "E-10",
                "RMMC" => "E-10",
                "RMA" => "E-12",
                "DIPLOMATIC" => "C-10",
                "INTEL" => "C-10",
                "SFC" => "C-10",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            13 => [
                "RMN" => "WO-1",
                "GSN" => "WO-1",
                "IAN" => "WO-1",
                "RHN" => "WO-1",
                "RMMC" => "WO-1",
                "RMA" => "WO-1",
                "DIPLOMATIC" => "C-10",
                "INTEL" => "C-10",
                "SFC" => "C-10",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            14 => [
                "RMN" => "WO-2",
                "GSN" => "WO-2",
                "IAN" => "WO-2",
                "RHN" => "WO-2",
                "RMMC" => "WO-2",
                "RMA" => "WO-2",
                "DIPLOMATIC" => "C-10",
                "INTEL" => "C-10",
                "SFC" => "C-10",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            15 => [
                "RMN" => "WO-3",
                "GSN" => "WO-3",
                "IAN" => "WO-3",
                "RHN" => "WO-3",
                "RMMC" => "WO-3",
                "RMA" => "WO-3",
                "DIPLOMATIC" => "C-11",
                "INTEL" => "C-11",
                "SFC" => "C-10",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            16 => [
                "RMN" => "WO-4",
                "GSN" => "WO-4",
                "IAN" => "WO-4",
                "RHN" => "WO-4",
                "RMMC" => "WO-4",
                "RMA" => "WO-4",
                "DIPLOMATIC" => "C-11",
                "INTEL" => "C-11",
                "SFC" => "C-10",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            17 => [
                "RMN" => "WO-5",
                "GSN" => "WO-5",
                "IAN" => "WO-5",
                "RHN" => "WO-5",
                "RMMC" => "WO-5",
                "RMA" => "WO-5",
                "DIPLOMATIC" => "C-11",
                "INTEL" => "C-11",
                "SFC" => "C-10",
                "RMACS" => "C-9",
                "RMMM" => "C-8",
                "DECK" => "C-8",
                "ENG" => "C-8",
                "CATERING" => "C-8",
                "MEDICAL" => "C-8",
            ],
            18 => [
                "RMN" => "O-1",
                "GSN" => "O-1",
                "IAN" => "O-1",
                "RHN" => "O-1",
                "RMMC" => "O-1",
                "RMA" => "O-1",
                "DIPLOMATIC" => "C-12",
                "INTEL" => "C-12",
                "SFC" => "C-10",
                "RMACS" => "C-12",
                "RMMM" => "C-12",
                "DECK" => "C-12",
                "ENG" => "C-12",
                "CATERING" => "C-12",
                "MEDICAL" => "C-12",
            ],
            19 => [
                "RMN" => "O-2",
                "GSN" => "O-2",
                "IAN" => "O-2",
                "RHN" => "O-2",
                "RMMC" => "O-2",
                "RMA" => "O-2",
                "DIPLOMATIC" => "C-13",
                "INTEL" => "C-13",
                "SFC" => "C-13",
                "RMACS" => "C-13",
                "RMMM" => "C-12",
                "DECK" => "C-13",
                "ENG" => "C-13",
                "CATERING" => "C-13",
                "MEDICAL" => "C-13",
            ],
            20 => [
                "RMN" => "O-3",
                "GSN" => "O-3",
                "IAN" => "O-3",
                "RHN" => "O-3",
                "RMMC" => "O-3",
                "RMA" => "O-3",
                "DIPLOMATIC" => "C-14",
                "INTEL" => "C-14",
                "SFC" => "C-14",
                "RMACS" => "C-14",
                "RMMM" => "C-12",
                "DECK" => "C-13",
                "ENG" => "C-13",
                "CATERING" => "C-13",
                "MEDICAL" => "C-13",
            ],
            21 => [
                "RMN" => "O-4",
                "GSN" => "O-4",
                "IAN" => "O-4",
                "RHN" => "O-4",
                "RMMC" => "O-4",
                "RMA" => "O-4",
                "DIPLOMATIC" => "C-15",
                "INTEL" => "C-15",
                "SFC" => "C-15",
                "RMACS" => "C-15",
                "RMMM" => "C-12",
                "DECK" => "C-15",
                "ENG" => "C-15",
                "CATERING" => "C-15",
                "MEDICAL" => "C-15",
            ],
            22 => [
                "RMN" => "O-5",
                "GSN" => "O-5",
                "IAN" => "O-5",
                "RHN" => "O-5",
                "RMMC" => "O-5",
                "RMA" => "O-5",
                "DIPLOMATIC" => "C-16",
                "INTEL" => "C-16",
                "SFC" => "C-16",
                "RMACS" => "C-16",
                "RMMM" => "C-12",
                "DECK" => "C-16",
                "ENG" => "C-16",
                "CATERING" => "C-16",
                "MEDICAL" => "C-16",
            ],
            23 => [
                "RMN" => "O-6-A",
                "GSN" => "O-6",
                "IAN" => "O-6",
                "RHN" => "O-6",
                "RMMC" => "O-6",
                "RMA" => "O-6",
                "DIPLOMATIC" => "C-17",
                "INTEL" => "C-17",
                "SFC" => "C-17",
                "RMACS" => "C-17",
                "RMMM" => "C-12",
                "DECK" => "C-17",
                "ENG" => "C-17",
                "CATERING" => "C-16",
                "MEDICAL" => "C-16",
            ],
            24 => [
                "RMN" => "O-6-B",
                "GSN" => "O-6",
                "IAN" => "O-6",
                "RHN" => "O-6",
                "RMMC" => "O-6",
                "RMA" => "O-6",
                "DIPLOMATIC" => "C-17",
                "INTEL" => "C-17",
                "SFC" => "C-17",
                "RMACS" => "C-17",
                "RMMM" => "C-12",
                "DECK" => "C-17",
                "ENG" => "C-17",
                "CATERING" => "C-16",
                "MEDICAL" => "C-16",
            ],
            25 => [
                "RMN" => "F-1",
                "GSN" => "F-1",
                "IAN" => "F-1",
                "RHN" => "F-1",
                "RMMC" => "F-1",
                "RMA" => "F-1",
                "DIPLOMATIC" => "C-18",
                "INTEL" => "C-18",
                "SFC" => "C-18",
                "RMACS" => "C-18",
                "RMMM" => "C-12",
                "DECK" => "C-18",
                "ENG" => "C-18",
                "CATERING" => "C-18",
                "MEDICAL" => "C-18",
            ],
            26 => [
                "RMN" => "F-2-A",
                "GSN" => "F-2",
                "IAN" => "F-2",
                "RHN" => "F-2",
                "RMMC" => "F-2",
                "RMA" => "F-2",
                "DIPLOMATIC" => "C-19",
                "INTEL" => "C-19",
                "SFC" => "C-19",
                "RMACS" => "C-19",
                "RMMM" => "C-12",
                "DECK" => "C-19",
                "ENG" => "C-19",
                "CATERING" => "C-19",
                "MEDICAL" => "C-19",
            ],
            27 => [
                "RMN" => "F-2-B",
                "GSN" => "F-2",
                "IAN" => "F-2",
                "RHN" => "F-2",
                "RMMC" => "F-2",
                "RMA" => "F-2",
                "DIPLOMATIC" => "C-19",
                "INTEL" => "C-19",
                "SFC" => "C-19",
                "RMACS" => "C-19",
                "RMMM" => "C-12",
                "DECK" => "C-19",
                "ENG" => "C-19",
                "CATERING" => "C-19",
                "MEDICAL" => "C-19",
            ],
            28 => [
                "RMN" => "F-3-A",
                "GSN" => "F-3",
                "IAN" => "F-3",
                "RHN" => "F-3",
                "RMMC" => "F-3",
                "RMA" => "F-3",
                "DIPLOMATIC" => "C-20",
                "INTEL" => "C-20",
                "SFC" => "C-20",
                "RMACS" => "C-20",
                "RMMM" => "C-12",
                "DECK" => "C-20",
                "ENG" => "C-20",
                "CATERING" => "C-20",
                "MEDICAL" => "C-20",
            ],
            29 => [
                "RMN" => "F-3-B",
                "GSN" => "F-3",
                "IAN" => "F-3",
                "RHN" => "F-3",
                "RMMC" => "F-3",
                "RMA" => "F-3",
                "DIPLOMATIC" => "C-20",
                "INTEL" => "C-20",
                "SFC" => "C-20",
                "RMACS" => "C-20",
                "RMMM" => "C-12",
                "DECK" => "C-20",
                "ENG" => "C-20",
                "CATERING" => "C-20",
                "MEDICAL" => "C-20",
            ],
            30 => [
                "RMN" => "F-4-A",
                "GSN" => "F-4",
                "IAN" => "F-4",
                "RHN" => "F-4",
                "RMMC" => "F-4",
                "RMA" => "F-4",
                "DIPLOMATIC" => "C-21",
                "INTEL" => "C-21",
                "SFC" => "C-21",
                "RMACS" => "C-21",
                "RMMM" => "C-12",
                "DECK" => "C-21",
                "ENG" => "C-21",
                "CATERING" => "C-21",
                "MEDICAL" => "C-21",
            ],
            31 => [
                "RMN" => "F-4-B",
                "GSN" => "F-4",
                "IAN" => "F-4",
                "RHN" => "F-4",
                "RMMC" => "F-4",
                "RMA" => "F-4",
                "DIPLOMATIC" => "C-21",
                "INTEL" => "C-21",
                "SFC" => "C-21",
                "RMACS" => "C-21",
                "RMMM" => "C-12",
                "DECK" => "C-21",
                "ENG" => "C-21",
                "CATERING" => "C-21",
                "MEDICAL" => "C-21",
            ],
            32 => [
                "RMN" => "F-5-A",
                "GSN" => "F-5",
                "IAN" => "F-5",
                "RHN" => "F-5",
                "RMMC" => "F-5",
                "RMA" => "F-5",
                "DIPLOMATIC" => "C-22",
                "INTEL" => "C-22",
                "SFC" => "C-22",
                "RMACS" => "C-22",
                "RMMM" => "C-12",
                "DECK" => "C-22",
                "ENG" => "C-22",
                "CATERING" => "C-22",
                "MEDICAL" => "C-22",
            ],
            33 => [
                "RMN" => "F-5-B",
                "GSN" => "F-5",
                "IAN" => "F-5",
                "RHN" => "F-5",
                "RMMC" => "F-5",
                "RMA" => "F-5",
                "DIPLOMATIC" => "C-22",
                "INTEL" => "C-22",
                "SFC" => "C-22",
                "RMACS" => "C-22",
                "RMMM" => "C-12",
                "DECK" => "C-22",
                "ENG" => "C-22",
                "CATERING" => "C-22",
                "MEDICAL" => "C-22",
            ],
            34 => [
                "RMN" => "F-6",
                "GSN" => "F-6",
                "IAN" => "F-6",
                "RHN" => "F-5",
                "RMMC" => "F-6",
                "RMA" => "F-6",
                "DIPLOMATIC" => "C-23",
                "INTEL" => "C-23",
                "SFC" => "C-23",
                "RMACS" => "C-23",
                "RMMM" => "C-12",
                "DECK" => "C-23",
                "ENG" => "C-23",
                "CATERING" => "C-23",
                "MEDICAL" => "C-23",
            ],
        ];

        MedusaConfig::set('rank.equiv', $rankEquivChart);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        MedusaConfig::remove('rank.equiv');
    }
}
