<?php
//unset($_SESSION['cart_list']);
//die();
?>
        <div class="row">
            <div style="margin: 10%; margin-top: 0; background-image: url(http://www.alpha-dream.com/images/common/marbleBG.jpg); background-repeat: repeat">
                <div class="col-lg-12" style="background-color: black;">
                        <h3>Isi Identitas Diri</h3>
                        <hr>
                        <form role="form" method="POST" action="aksi_identitas">
                            <div class="row" style="margin-top: 10px">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="nama">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>No. Telp</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="telp">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Pesan</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" name="pesan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <center>
                                <button type="submit" class="btn btn-default">Bayar</button>
                            </center>
                        </form>
                </div>
            </div>
        </div>