<!-- UPDATE -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit : <span class="del_customer_name"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../modal/booking_edit.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" class="cust_id">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama_pengguna" id="edit_nama">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="edit_tanggal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Ruangan</label>
                            <select class="form-select form-control" aria-label="Default select example"
                                name="edit_ruangan" id="ruangan">
                                <!-- <option selected>Open this select menu</option> -->
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Waktu Mulai</label>
                            <input type="time" class="form-control" name="waktu_mulai" id="edit_mulai">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Waktu Selesai :</label>
                            <input type="time" class="form-control" name="waktu_selesai" id="edit_selesai">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Keperluan :</label>
                            <input type="text" class="form-control" name="keperluan" id="edit_keperluan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FOR DELETE2 -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="fa fa-info"></span>Please Confirm</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../modal/booking_delete.php" method="POST">
                    <input type="hidden" name="id" id="cust_id" class="cust_id">
                    <center>
                        <p>Are you sure want to delete this record</p>
                        Customer name : <span class="del_customer_name"></span>
                    </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-close"></i>
                    No</button>
                <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php // echo $_GET['id'];?>">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama_pengguna" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Ruangan</label>
                            <select class="form-select form-control" aria-label="Default select example" name="ruangan"
                                required>
                                <!-- <option selected>Open this select menu</option> -->
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Waktu Mulai</label>
                            <input type="time" class="form-control" name="waktu_mulai" id="" value="08:00:00" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Waktu Selesai :</label>
                            <input type="time" class="form-control" name="waktu_selesai" id="" value="05:00:00"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Keperluan :</label>
                            <input type="text" class="form-control" name="keperluan" id="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>