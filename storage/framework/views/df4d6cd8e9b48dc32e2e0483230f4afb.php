<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="page-wrapper">
            <div class="page-content">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h4 class="card-title">Dashboard</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-md-end gap-3">
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-primary btn-sm">Buat Pesan</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?php echo e(route('message.store')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Buat pesan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3 row">
                                                            <label for="recipient_id"
                                                                class="form-label
                                                            ">Penerima</label>
                                                            <select name="recipient_id" id="recipient_id"
                                                                class="form-select" style="width: 100%">
                                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                       
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label for="content" class="form-label">Pesan</label>
                                                                <textarea name="content" class="form-control" id="content" aria-describedby="" placeholder="Masukkan pesan"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label for="question" class="form-label">Clue</label>
                                                                <input name="question" class="form-control mb-2"
                                                                    id="question" aria-describedby=""
                                                                    placeholder="Masukkan petunjuk untuk membuka pesan" />
                                                                <label class="form-label">Jika tidak diisi maka pesan tidak
                                                                    akan di kunci</label>

                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label for="password" class="form-label">Kunci</label>
                                                                <input name="password" class="form-control mb-2"
                                                                    id="password" aria-describedby=""
                                                                    placeholder="Masukkan kunci untuk membuka pesan" />
                                                                <label class="form-label">Jika tidak diisi maka pesan tidak
                                                                    akan di kunci</label>


                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label for="order_by" class="form-label">Urutan</label>
                                                                <input type="number" min="1" name="order_by"
                                                                    class="form-control mb-2" id="order_by"
                                                                    aria-describedby=""
                                                                    placeholder="Masukkan kunci untuk membuka pesan" />
                                                                <label class="form-label">Jika tidak diisi maka akan
                                                                    diurutkan secara otomatis</label>


                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table id="messageTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Dari</th>
                                        <th>Kepada</th>
                                        <th>Urutan</th>
                                        <th>Status</th>
                                        <th>Waktu Dibaca</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e(++$index); ?>

                                            </td>
                                            <td><?php echo e($message->sender->name); ?></td>
                                            <td><?php echo e($message->recipient->name); ?></td>
                                            <td><?php echo e($message->order_by); ?></td>
                                            <td><?php echo e($message->is_read); ?></td>
                                            <td><?php echo e($message->read_at); ?></td>
                                            <td><?php echo e($message); ?></td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="modal fade " id="editMessage" tabindex="-1"
            aria-labelledby="editMessageLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" id="formEdit" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Edit
                                pesan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="recipient_id"
                                        class="form-label
                                    ">Penerima</label>
                                   <input type="text" id="edit_recipent_id" class="form-control" disabled >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="content" class="form-label">Pesan</label>
                                    <textarea name="content" class="form-control" id="edit_content" aria-describedby="" placeholder="Masukkan pesan"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="question" class="form-label">Clue</label>
                                    <input name="question" class="form-control mb-2" id="edit_question" aria-describedby=""
                                      
                                        placeholder="Masukkan petunjuk untuk membuka pesan" />
                                    <label class="form-label">Jika tidak diisi maka
                                        pesan
                                        tidak
                                        akan di kunci</label>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="password" class="form-label">Kunci</label>
                                    <input name="password" class="form-control mb-2" id="edit_password" aria-describedby=""
                                        
                                        placeholder="Masukkan kunci untuk membuka pesan" />
                                    <label class="form-label">Jika tidak diisi maka
                                        pesan
                                        tidak
                                        akan di kunci</label>


                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="order_by" class="form-label">Urutan</label>
                                    <input type="number" min="1" name="order_by" class="form-control mb-2"
                                        id="edit_order_by" aria-describedby="" 
                                        placeholder="Masukkan kunci untuk membuka pesan" />
                                    <label class="form-label">Jika tidak diisi maka
                                        akan
                                        diurutkan secara otomatis</label>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/select2/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#messageTable').DataTable({
                columnDefs: [{
                        targets: 4,
                        render: function(data, type, row) {
                            return data ==true ?
                                '<span class="badge rounded-pill bg-success">Dibaca</span>' :
                                '<span class="badge rounded-pill bg-secondary">Belum dibaca</span>';
                        }
                    },
                    {
                        targets: 6,
                        render: function(data, type, row) {
                            return `
                            <button onclick='updateMessage(${JSON.stringify(data)})' class="btn btn-primary btn-sm">Detail</button>
                            
                            <button onclick='deleteMessage(${JSON.stringify(data)})' class="btn btn-danger btn-sm">Hapus</button>
                            
                            `;
                        }
                    }
                ]
            });
        });

        $("#recipient_id").select2({
            dropdownParent: $('#exampleModal'),
            tags: true
        });
        function updateMessage(data) { 
            const message = JSON.parse(data);
            $('#formEdit').attr('action', `/auth/message/${message.id}`);
            $('#edit_recipent_id').val(message.recipient.name);
            $('#edit_content').val(message.content);
            $('#edit_question').val(message.question);
            $('#edit_password').val(message.password);
            $('#edit_order_by').val(message.order_by);
            $('#editMessage').modal('show');
         }
        function deleteMessage(data) {
            const message = JSON.parse(data);
            if (confirm('Are you sure you want to delete this message?')) {
                $.ajax({
                    url: `/auth/message/${message.id}`,
                    type: 'DELETE',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(result) {
                        location.reload();
                    },
                    error: function(err) {
                        console.log(err);
                        alert('Failed to delete the message.');
                    }
                });
            }
        }
        </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bintang/Dokumen/PHP/secretmess/resources/views/messages/index.blade.php ENDPATH**/ ?>