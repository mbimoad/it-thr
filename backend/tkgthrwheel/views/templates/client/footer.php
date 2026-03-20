    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/tapstore/frontend/scripts/myscript.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

    <?php if($datas["title"] == "index"): ?>
        <script src="<?= base_url(); ?>assets/tapstore/frontend/scripts/dashboard.js"></script>
    <?php elseif ($datas["title"] == "detail"): ?>
        <script src="<?= base_url(); ?>assets/tapstore/frontend/scripts/detail.js"></script>
    <?php elseif ($datas["title"] == "libraries"): ?>
        <script src="<?= base_url(); ?>assets/tapstore/frontend/scripts/libraries.js"></script>
    <?php endif; ?>
</body>
</html>