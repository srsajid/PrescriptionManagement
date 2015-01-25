<div class="head">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand">Prescriptions ({{$total}})</a>
        </div>
        <div class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <input type="text" name="searchText" class="form-control" placeholder="Search" value="<?php echo($searchText); ?>">
            </div>
            <button type="submit" class="btn btn-default search">Search</button>
            <button type="button" class="btn btn-default btn-sm tool-icon create-prescription" title="Create Prescription">
                <span class="glyphicon glyphicon-plus-sign"></span>
            </button>
        </div>
    </nav>
</div>

<div class="body">
    <table class="table">
        <colgroup>
            <col style="width: 10%">
            <col>
            <col>
            <col style="width: 10%">
        </colgroup>
        <thead>
        <tr>
            <th>Id</th>
            <th>Patient Name</th>
            <th>Patient age</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $prescriptions->each(function($prescription){ ?>
            <tr class="active">
                <td><?php echo $prescription->id; ?></td>
                <td><?php echo HTML::entities($prescription->patient_name); ?></td>
                <td><?php echo $prescription->patient_age; ?></td>
                 <td>
                    <button type="button" class="btn btn-default btn-xs action-menu" data-id="<?php echo $prescription->id; ?>" action="edit" title="Edit Prescription">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                     <a target="_blank" href="{{SR::$baseUrl}}prescription/print?id={{$prescription->id;}}">
                         <button type="button" class="btn btn-default btn-xs" title="Print Prescription">
                            <span class="glyphicon glyphicon-print"></span>
                        </button>
                     </a>
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
