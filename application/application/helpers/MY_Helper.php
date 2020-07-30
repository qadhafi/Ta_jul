<?php
function urlHasPrefix($prefix){
    $url = current_url();
    if (strpos($url, $prefix) > 0) {
        return true;
    }

    return false;
}


function getMonthList() {
    return [
        [
            'num' => '01',
            'month' => 'Januari'
        ],
        [
            'num' => '02',
            'month' => 'Februari'
        ],
        [
            'num' => '03',
            'month' => 'Maret'
        ],
        [
            'num' => '04',
            'month' => 'April'
        ],
        [
            'num' => '05',
            'month' => 'Mei'
        ],
        [
            'num' => '06',
            'month' => 'Juni'
        ],
        [
            'num' => '07',
            'month' => 'Juli'
        ],
        [
            'num' => '08',
            'month' => 'Agustus'
        ],
        [
            'num' => '09',
            'month' => 'September'
        ],
        [
            'num' => '10',
            'month' => 'Oktober'
        ],
        [
            'num' => '11',
            'month' => 'November'
        ],
        [
            'num' => '12',
            'month' => 'Desember'
        ],
    ];
}

function getMonthName($num){
    switch ($num) {
        case '01':
            return "Januari";
            break;

        case '01':
            return "Januari";
            break;
        
        case '02':
            return "Februari";
            break;

        case '03':
            return "Maret";
            break;

        case '04':
            return "April";
            break;

        case '05':
            return "Mei";
            break;

        case '06':
            return "Juni";
            break;

        case '07':
            return "Juli";
            break;

        case '08':
            return "Agustus";
            break;  
            
        case '09':
            return "September";
            break;

        case '10':
            return "Oktober";
            break;

        case '11':
            return "November";
            break;

        default:
            return "Desember";
            break;
    }
}

function dd($param){
    print_r($param);
    die();
}
