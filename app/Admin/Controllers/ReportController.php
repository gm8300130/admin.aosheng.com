<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

use Encore\Admin\Widgets\Table;
use Encore\Admin\Grid;
use App\CustomCollection;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Models\Service;

class ReportController extends Controller
{
    use ModelForm;
    
    public function index()
    {
        $this->data = [
            '1' =>[
                'id' => '1',
                'com' => 'aa',
                'total'=> '20'
            ],
            '2' =>[
                'id' => '2',
                'com' => 'bb',
                'total'=> '30'
            ],
            '3' =>[
                'id' => '3',
                'com' => 'cc',
                'total'=> '40'
            ]
        ];
        // table 1
        // $headers = ['Id', 'Email', 'Name', 'Company'];
        // $rows = [
        //     [1, 'labore21@yahoo.com', 'Ms. Clotilde Gibson', 'Goodwin-Watsica'],
        //     [2, 'omnis.in@hotmail.com', 'Allie Kuhic', 'Murphy, Koepp and Morar'],
        //     [3, 'quia65@hotmail.com', 'Prof. Drew Heller', 'Kihn LLC'],
        //     [4, 'xet@yahoo.com', 'William Koss', 'Becker-Raynor'],
        //     [5, 'ipsa.aut@gmail.com', 'Ms. Antonietta Kozey Jr.'],
        // ];
        /*
        0 => 
                object(stdClass)[315]
                public 'iGameId' => int 1
                public 'sGameName' => string '福彩3D' (length=8)
                public 'iCloseTimeSet' => int 300
                public 'fSingleBetMaxWin' => int 1000000
                public 'iEnable' => int 0
                public 'iStop' => int 0
                public 'iSort' => int 8
                public 'iGameParentId' => int 1
                public 'iClass1' => int 5
                public 'iClass2' => int 2
                public 'sShortDesc' => string '' (length=0)
            1 => 
                object(stdClass)[330]
                public 'iGameId' => int 2
                public 'sGameName' => string '排列三' (length=9)
                public 'iCloseTimeSet' => int 300
                public 'fSingleBetMaxWin' => int 1000000
                public 'iEnable' => int 0
                public 'iStop' => int 0
                public 'iSort' => int 9
                public 'iGameParentId' => int 2
                public 'iClass1' => int 5
                public 'iClass2' => int 2
                public 'sShortDesc' => string '' (length=0)
            2 => 
                object(stdClass)[312]
                public 'iGameId' => int 3
                public 'sGameName' => string '上海时时乐' (length=15)
                public 'iCloseTimeSet' => int 30
                public 'fSingleBetMaxWin' => int 1000000
                public 'iEnable' => int 0
                public 'iStop' => int 0
                public 'iSort' => int 100
                public 'iGameParentId' => int 3
                public 'iClass1' => int 1
                public 'iClass2' => int 1
                public 'sShortDesc' => string '' (length=0)
        */
        // $this->table = new Table($headers, $rows);
        $this->data = [
            '1' =>[
                'iGameId' => '1',
                'sGameName' => 'aa',
                'iCloseTimeSet'=> '20'
            ],
            '2' =>[
                'id' => '2',
                'com' => 'bb',
                'total'=> '30'
            ],
            '3' =>[
                'id' => '3',
                'com' => 'cc',
                'total'=> '40'
            ]
        ];
        
            
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Description...');
            
            //$content->row($this->table->render());
            // 填充页面body部分
            $content->body(view('admin.report', 
                [
                    'data' => $this->data,
                    'date' => date('Y/m/d')
                ]
            ));

        });
    }

    public function getData()
    {
        $Service = New Service();
        $username = 'caizhu';
        //$userModel = Model('fUser');
        
        // $paramsArr
        $userData = array('sUserID'=>'caizhu', 'sPassword'=>md5('123456'.md5('bf48241adc63a8b4d54a14b0cec6ddc8')));
        //dd($userData);
        $Service->webPostInvokeIDollService('CanLogin', $userData);


    }
}
