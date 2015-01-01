    <div class="col-md-4" id="sidebar">
        <h4 class="text-left-title modal-post">Sidebar</h4>
<?php if ( function_exists ( dynamic_sidebar(1) ) ) : ?>

<?php dynamic_sidebar (1); ?>

<?php endif; ?>
    </div>
</div>
