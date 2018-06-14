<?php
$module = CRUDBooster::getCurrentModule();

?>
<form method="post" action="{{route('AdminModulesControllerPostStep1')}}">

    <div class="box-body">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="id" value="{{$module->id}}">

        <div class="row">
            <div class="col-md-12 form-group">
                <label for="">Table</label>
                <select name="table" id="table" required class="select2 form-control" value="{{$module->table_name}}">
                    <option value="">{{cbTrans('text_prefix_option')}} Table</option>

                    @foreach(CRUDBooster::listCbTables() as $table)
                        <option {{($table == $module->table_name)?"selected":""}} value="{{$table}}">{{$table}}</option>
                    @endforeach

                </select>
                <div class="help-block">
                    Do not use cms_* as prefix on your tables name so they show up here.
                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-md-12 form-group">
                <label for="">Module Name</label>
                <input type="text" class="form-control" required name="name" value="{{$module->name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12  form-group">
                <label for="">Icon</label>
                <select name="icon" id="icon" required class="select2 form-control">
                    @php
                        $fontAwesome = \crocodicstudio\crudbooster\controllers\Helpers\FontAwesome::cssClass();
                    @endphp
                    @foreach($fontAwesome as $font)
                        <option {{($module->icon == 'fa fa-'.$font)?"selected":""}} value="fa fa-{{$font}}">{{$font}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="">Module Slug</label>
                <input type="text" class="form-control" required name="path" value="{{$module->path}}">
                <div class="help-block">
                    Please alpha numeric only, without space instead _ and or special character
                </div>
            </div>
        </div>

    </div>
    <div class="box-footer">

        <input checked type='checkbox' name='create_menu' value='1'/> Also create menu for this module
        <a href='#' title='If you check this, we will create the menu for this module'>(?)</a>

        <div class='pull-right'>
            <a class='btn btn-default' href='{{route("AdminModulesControllerGetIndex")}}'>
                {{cbTrans('button_back')}}
            </a>
            <input type="submit" class="btn btn-primary" value="Step 2 &raquo;">
        </div>
    </div>
</form>