<form id="deleteDoc" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    
    <a href="javascript:void()" data-id="<?php echo e($row->id); ?>" id="editData" class="btn btn-sm mb-0 btn-warning"><i
            class="ti ti-edit"></i></a>
    <button type="submit" class="btn btn-sm mb-0 btn-danger deleteBtn text-light" data-id="<?php echo e($row->id); ?>"><i
            class="ti ti-trash"></i></button>
</form>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/pages/dokter/component/action.blade.php ENDPATH**/ ?>