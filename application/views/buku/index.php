<a href="<?= base_url() ?>index.php/buku/create">Tambah</a>
<table class="table">
	<thead>
		<th>ID</th>
		<th>Nama Buku</th>
		<th>Nama Pengarang</th>
		<th>Option</th>
	</thead>
	<tbody>
		<?php foreach ($raw as $buku): ?>
			<tr>
				<td><?= $buku->id ?></td>
				<td><?= $buku->nama ?></td>
				<td><?= $buku->nama_pengarang ?></td>
				<td>
					<a href="<?= base_url() ?>index.php/buku/edit/<?= $buku->id ?>">Edit</a>
					<a href="<?= base_url() ?>index.php/buku/delete/<?= $buku->id ?>">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>