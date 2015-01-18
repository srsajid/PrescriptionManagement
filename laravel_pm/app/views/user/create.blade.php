<form class="form-horizontal create-edit-form" action="{{SR::$baseUrl}}user/save" method="post">
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="form-group">
        <label class="col-sm-3 control-label">Name:</label>
        <div class="col-sm-8">
            <input class="form-control validate[required]" name="name" value="{{$user->name}}">
        </div>
    </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email:</label>
        <div class="col-sm-8">
            <input class="form-control" name="email" value="{{$user->email}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Username:</label>
        <div class="col-sm-8">
            <input class="form-control validate[required,minSize[5]]" name="username" value="{{$user->user ? $user->user->username : ""}}">
        </div>
    </div>
    <?php if(!$user->id) { ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Password:</label>
            <div class="col-sm-8">
                <input class="form-control validate[required,minSize[8]]" name="password" type="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Confirm Password:</label>
            <div class="col-sm-8">
                <input class="form-control validate[required,minSize[8]]" name="confirm_password" type="password">
            </div>
        </div>
    <?php } ?>
    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-3">
            <button type="submit" class="form-control">Create</button>
        </div>
    </div>
</form>