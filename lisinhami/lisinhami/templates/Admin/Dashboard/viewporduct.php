<div class="content">
<table id="employeeList" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>					
			<th>Discount</th>
			<th>Tax</th>
            <th>Point</th>					
            <th>Made In</th>
            <th>Info Gen</th>
            <th>Info Dtl</th>
            <th>Slug</th>
			<th colspan="2"></th>			
        </tr>
        <? foreach($TProduct as $key => $item){?>
            <tr>
                <td><?= $item->id?></td>
                <td><?= $item->name?></td>
                <td><?= $item->price?></td>
                <td><?= $item->discount?></td>
                <td><?= $item->tax?></td>
                <td><?= $item->point?></td>
                <td><?= $item->made_in?></td>
                <td><?= $item->info_gen?></td>
                <td><?= $item->info_dtl?></td>
                <td><?= $item->slug?></td>
                <td><a href="./anshin/" class="btn btn-warning  btn-lg btn-radius"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                <td><a href="./anshin/" class="btn btn-danger btn-lg btn-radius"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
            </tr>
        <? }?>
	</thead>
</table>
</div>

<style>
        *{
            font-size: 15px;
        }
</style>