<h3>
	Tentang Kami
</h3>
<hr>
<?php
    $contact = new Post('modul_child');
    $contact_teks = $contact->get_db('modul_child', $condition = array('id_modul'=> 1));
    echo htmlspecialchars_decode($contact_teks[0]['static_content']);
?>
