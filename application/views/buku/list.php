<table class="table">
	<thead>
		<th>ID</th>
		<th>Nama</th>
		<th>Option</th>
	</thead>
	<tbody>
		<?php foreach ($bukus as $buku): ?>
			<tr>
				<td><?= $buku->id ?></td>
				<td><?= $buku->nama ?></td>
				<td><a href="">asd</a><a href=""></a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>