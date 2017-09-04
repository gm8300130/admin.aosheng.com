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
use App\Admin\Models\ReportModel;

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

        //echo $table->render();
        //$app = app();
        //dd($app->make('Report', $data));
        // $ReportModel = new ReportModel;
        // //dd($ReportModel->newCollection($data));
        // $newModel = $ReportModel->newCollection($data);
        //return Admin::grid($newModel, function(Grid $grid){
            //dd('123');
            //dd($grid);
            //dd($newMode);
        // 第一列显示id字段，并将这一列设置为可排序列
            //$grid->id('id');

            // 第二列显示title字段，由于title字段名和Grid对象的title方法冲突，所以用Grid的column()方法代替
            // $grid->column('title');

            // // 第三列显示director字段，通过display($callback)方法设置这一列的显示内容为users表中对应的用户名
            // $grid->director()->display(function($userId) {
            //     return User::find($userId)->name;
            // });

            // // 第四列显示为describe字段
            // $grid->describe();

            // // 第五列显示为rate字段
            // $grid->rate();

            // // 第六列显示released字段，通过display($callback)方法来格式化显示输出
            // $grid->released('上映?')->display(function ($released) {
            //     return $released ? '是' : '否';
            // });

            // // 下面为三个时间字段的列显示
            // $grid->release_at();
            // $grid->created_at();
            // $grid->updated_at();

            // // filter($callback)方法用来设置表格的简单搜索框
            // $grid->filter(function ($filter) {

            //     // 设置created_at字段的范围查询
            //     $filter->between('created_at', 'Created Time')->datetime();
            // });
        //});

        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Description...');
            
            //$content->row($this->table->render());
            // 填充页面body部分
            $content->body(view('admin.report', ['data' => $this->data]));

        });
    }

    public function newCollection(array $models = [])
    {
        $models = [
            '0' =>[
                'com' => 'aa',
                'total'=> '20'
            ],
            '1' =>[
                'com' => 'bb',
                'total'=> '30'
            ],
            '2' =>[
                'com' => 'cc',
                'total'=> '40'
            ]
        ];
        
        return new CustomCollection($models);
    }
}
