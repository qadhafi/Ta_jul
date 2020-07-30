<?php
    $success = $this->session->flashdata('success');
    $error   = $this->session->flashdata('error');
    $warning = $this->session->flashdata('warning');

    if ($error) {
        $message_status = 'alert-danger';
        $message = $error;
    }

    if ($warning) {
        $message_status = 'alert-warning';
        $message = $warning;
    }

    if ($success) {
        $message_status = 'alert-success';
        $message = $success;
    }
?>

<?php if ($success || $warning || $error): ?>    
    <div class="alert-dismiss">
        <div class="alert <?= $message_status ?> alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="fa fa-times"></span>
            </button>
        </div>
    </div>
<?php endif ?>

<?php echo validation_errors(); ?>   
        <br>    