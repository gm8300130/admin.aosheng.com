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
        $headers = ['Id', 'Email', 'Name', 'Company'];
        $rows = [
            [1, 'labore21@yahoo.com', 'Ms. Clotilde Gibson', 'Goodwin-Watsica'],
            [2, 'omnis.in@hotmail.com', 'Allie Kuhic', 'Murphy, Koepp and Morar'],
            [3, 'quia65@hotmail.com', 'Prof. Drew Heller', 'Kihn LLC'],
            [4, 'xet@yahoo.com', 'William Koss', 'Becker-Raynor'],
            [5, 'ipsa.aut@gmail.com', 'Ms. Antonietta Kozey Jr.'],
        ];

        $this->table = new Table($headers, $rows);

        
            
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Description...');
            
            //$content->row($this->table->render());
            // 填充页面body部分
            $content->body(view('admin.report', ['data' => $this->data]));

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
