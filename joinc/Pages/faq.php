<h3>
	Frequently Asked Questions
</h3>
<hr>
<?php
    $contact = new Post('modul_child');
    $contact_teks = $contact->get_db('modul_child', $condition = array('id_modul'=> 3));
    echo htmlspecialchars_decode($contact_teks[0]['static_content']);
?>
