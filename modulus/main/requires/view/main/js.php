<script src="/resource/main/js/jquery-3.5.1.min.js"></script>
<script src="/resource/main/js/popper.min.js"></script>
<script src="/resource/main/js/bootstrap.min.js"></script>
<script src="/resource/main/js/main.js"></script>

<?php if(isset($_SESSION['message'])) : ?>
    <script type="text/javascript">
        messageManagement(<?php echo json_encode($_SESSION['message']); ?>);
    </script>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

