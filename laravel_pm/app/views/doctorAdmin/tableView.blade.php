<div class="head">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand">Doctors ({{$total}})</a>
        </div>
        <div class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <input type="text" name="searchText" class="form-control" placeholder="Search" value="<?php echo($searchText); ?>">
            </div>
            <button type="submit" class="btn btn-default search">Search</button>
        </div>
    </nav>
</div>

<div class="body">
    <table class="table">
        <colgroup>
            <col style="width: 20%">
            <col style="width: 40%">
            <col>
            <col>
            <col style="width: 10%">
        </colgroup>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Is Approved</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $doctors->each(function($doctor){ ?>
            <tr class="active">
                <td>{{HTML::entities($doctor->name)}}</td>
                <td>{{HTML::entities(Str::limit($doctor->email, 150))}}</td>
                <td><?php echo $doctor->phone; ?></td>
                <td><?php echo $doctor->user->is_active; ?></td>
                 <td>
                    @if($doctor->user->is_active)
                        <button type="button" class="btn btn-default btn-xs action-menu" data-id="<?php echo $doctor->id; ?>" action="disapprove" title="Disapprove">
                            <span class="glyphicon glyphicon-ban-circle"></span>
                        </button>
                    @else
                        <button type="button" class="btn btn-default btn-xs action-menu" data-id="<?php echo $doctor->id; ?>" action="approve" title="Approve">
                             <span class="glyphicon glyphicon-ok-sign"></span>
                        </button>
                    @endif

                 </td>
            </tr>
        <?php }); ?>
        </tbody>
    </table>
</div>
<div class="footer">
    <?php
        echo CommonService::paginator($max, $offset, $total);
        echo CommonService::itemPerPage($max);
    ?>
</div>
