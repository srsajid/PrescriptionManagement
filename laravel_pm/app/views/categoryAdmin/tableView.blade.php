<div class="head">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand">Categories ({{$total}})</a>
        </div>
        <div class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <input type="text" name="searchText" class="form-control" placeholder="Search" value="<?php echo($searchText); ?>">
            </div>
            <button type="submit" class="btn btn-default search">Search</button>
            <button type="button" class="btn btn-default btn-sm tool-icon create-category" title="Create Category">
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
            <col style="width: 10%">
        </colgroup>
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $categories->each(function($category){ ?>
            <tr class="active">
                <td><?php echo $category->id; ?></td>
                <td><?php echo $category->name; ?></td>
                 <td>
                    <button type="button" class="btn btn-default btn-xs action-menu" data-id="<?php echo $category->id; ?>" action="edit" title="Edit Category">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
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
