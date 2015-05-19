<table class="srui-table-a">
    <colgroup>
        <col style="width: 10%"/>
        <col style=""/>
        <col style=""/>
        <col style=""/>
    </colgroup>
    <tr>
        <th></th>
        <th>Name</th>
        <th>Company Name</th>
        <th>Pack Size</th>
    </tr>
    <?php $medicines->each(function($medicine){?>
        <tr>
            <td class="action">
                <input type="checkbox" value="{{$medicine->id}}" class="selector form-control">
            </td>
            <td class="name">{{$medicine->name}}</td>
            <td class="company-name">{{$medicine->company}}</td>
            <td class="name">{{$medicine->pack_size}}</td>
        </tr>
    <?php });?>
</table>
<div class="footer">
    <?php echo CommonService::paginator($max, $offset, $total); ?>
</div>