<form class="form-horizontal create-edit-form" action="{{SR::$baseUrl}}medicineAdmin/save" method="post">
    <input type="hidden" name="id" value="{{$medicine->id}}">
    <div class="form-group">
        <label class="col-sm-3 control-label">Name:</label>
        <div class="col-sm-8">
            <input class="form-control validate[required]" name="name" value="{{$medicine->name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Code:</label>
        <div class="col-sm-8">
            <input class="form-control validate[required]" name="code" value="{{$medicine->code}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Company:</label>
        <div class="col-sm-8">
            <input class="form-control validate[required]" name="company" value="{{$medicine->company}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Category:</label>
        <div class="col-sm-8">
            {{Form::select("category_id", $categories, $medicine->category_id, array('class' => "form-control"))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-3">
            <button type="submit" class="form-control">Save</button>
        </div>
    </div>
</form>