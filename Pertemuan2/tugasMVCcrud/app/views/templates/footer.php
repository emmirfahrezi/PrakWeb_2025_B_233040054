</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- gunakan bundle yang sudah include Popper -->
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
<!-- expose BASEURL ke JS supaya script.js bisa membangun endpoint dinamis -->
<script>
	const BASEURL = "<?= BASEURL; ?>";
	// debug: tulis BASEURL sebagai komentar HTML untuk verifikasi cepat di page source
	/* BASEURL_RESOLVED: <?= BASEURL; ?> */
</script>
<script src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>