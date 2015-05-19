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
        <label class="col-sm-3 control-label">Ingredients:</label>
        <div class="col-sm-8">
            <input class="form-control validate[required]" name="ingredients" value="{{$medicine->ingredients}}">
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
        <label class="col-sm-3 control-label">Brand Name:</label>
        <div class="col-sm-8">
            <input class="form-control" name="brand_name" value="{{$medicine->brand_name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Pack Size:</label>
        <div class="col-sm-8">
            <input class="form-control" name="pack_size" value="{{$medicine->pack_size}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Unit Price:</label>
        <div class="col-sm-8">
            <input class="form-control" name="unit_price" value="{{$medicine->unit_price}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-3">
            <button type="submit" class="form-control">Save</button>
        </div>
    </div>
</form>