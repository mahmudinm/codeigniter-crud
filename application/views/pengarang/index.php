<a href="<?= base_url() ?>/index.php/pengarang/create">Tambah Data</a>
<table>
	<thead>
		<th>id</th>
		<th>nama</th>
		<th>option</th>
	</thead>
	<tbody>
		<?php foreach ($pengarangs as $pengarang): ?>
			<tr>
				<td><?= $pengarang->id ?></td>
				<td><?= $pengarang->nama ?></td>
				<td>
					<a href="<?= base_url() ?>/index.php/pengarang/edit/<?= $pengarang->id ?>">Edit</a>
					<a href="<?= base_url() ?>/index.php/pengarang/delete/<?= $pengarang->id ?>">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>