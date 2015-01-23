<table class="srui-table-a">
    <colgroup>
        <col style="width: 10%"/>
        <col style="width: 90%"/>
    </colgroup>
    <tr>
        <th></th>
        <th>Name</th>
    </tr>
    <?php $medicines->each(function($medicine){?>
        <tr>
            <td class="action">
                <input type="checkbox" value="{{$medicine->id}}" class="selector form-control">
            </td>
            <td class="name">{{$medicine->name}}</td>
        </tr>
    <?php });?>
</table>
<div class="footer">
    <?php echo CommonService::paginator($max, $offset, $total); ?>
</div>