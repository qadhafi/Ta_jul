<?php
    $success = $this->session->flashdata('success');
    $error   = $this->session->flashdata('error');
    $warning = $this->session->flashdata('warning');

    if ($error) {
        $message_status = 'danger';
        $stat = 'Gagal';
        $message = $error;
    }

    if ($warning) {
        $message_status = 'warning';
        $stat = 'Perhatian';
        $message = $warning;
    }

    if ($success) {
        $message_status = 'success';
        $stat = 'Sukses';
        $message = $success;
    }
?>

<?php if ($success || $warning || $error): ?>
<div class="alert alert-<?= $message_status ?> alert-dismissible fade show my-toast" role="alert">
    <strong><?= ucwords($stat) ?>!</strong> <br> <?= $message ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif ?>