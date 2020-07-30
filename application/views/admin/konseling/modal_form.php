<div class="modal-header">
    <h5 class="modal-title">Respon</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="<?= $form_action ?>" method="post">
    <div class="modal-body text-left">
        <p class="mb-3">Data Konseling</p>
        <table class="table">
            <tr>
                <td class="text-left">Nama</td>
                <td>:</td>
                <td class="text-left"><?= $jemaat ?></td>
            </tr>
            <tr>
                <td class="text-left">Konseling</td>
                <td>:</td>
                <td class="text-left">
                    <?= $konseling->pembahasan ?>
                </td>
            </tr>
        </table>
        <input type="hidden" name="subjek" value="<?= $konseling->subjek ?>">
        <input type="hidden" name="pembahasan" value="<?= $konseling->pembahasan ?>">
        <div class="form-group">
            <label>Respon</label>
            <textarea name="respon" placeholder="Masukan pesan konseling" class="form-control"></textarea>            
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>