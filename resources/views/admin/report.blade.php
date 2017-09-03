@inject('Admin', 'Encore\Admin\Admin')
<div>{{$data[1]['com']}}
<table id="table_id" class="display"><font></font>
    <thead><font></font>
        <tr><font></font>
            <th>Column 1</th><font></font>
            <th>Column 2</th><font></font>
        </tr><font></font>
    </thead><font></font>
    <tbody><font></font>
        <tr><font></font>
            <td>Row 1 Data 1</td><font></font>
            <td>Row 1 Data 2</td><font></font>
        </tr><font></font>
        <tr><font></font>
            <td>Row 2 Data 1</td><font></font>
            <td>Row 2 Data 2</td><font></font>
        </tr><font></font>
    </tbody><font></font>
</table><font></font>
</div>

{!!
$Admin->script('
    $(\'#table_id\').DataTable(
        {
            "paging":   false
        }
    )
')
!!}