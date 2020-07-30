<div class="modal-header">
    <h5 class="modal-title"><?= $data->nama_kegiatan ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <?php if($data->foto != null | $data->foto != ''): ?>
        <img class="card-img-top img-fluid " src="<?= base_url('foto/'.$data->foto) ?>" alt="img">
    <?php else : ?>
        <img class="card-img-top img-fluid " src="<?= base_url('foto/small/no-image.png') ?>" alt="img">
    <?php endif ?>
    <div class="text-left mt-3 content-article">
        <?= $data->deskripsi ?>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>