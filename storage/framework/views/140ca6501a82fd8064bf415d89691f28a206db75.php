<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Questions'); ?>
<?php $__env->startSection('page_name', 'Questions'); ?>
<?php $__env->startSection('content'); ?>
               <!-- Content wrapper -->
               <div class="content-wrapper">

                <div class="container m-0">
                    <div class="row px-2">
                        <div class="col-md-8">
                            <ol class="breadcrumb pt-2">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.batches')); ?>">Batches</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.batches')); ?>">Subjects</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chapters</li>
                              </ol>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="btn-group text-end mt-2">
                                <?php if(isset($topic_id)): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create questions')): ?>

                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view chapter master')): ?>
                                        <a href="<?php echo e(route('admin.chapter.master', [(isset($chapter->subject_id)?$chapter->subject_id:null)])); ?>">
                                            <span class='btn btn-secondary btn125'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
                                        </a>
                                     <?php endif; ?>
                                        <?php endif; ?>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- Content -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create questions')): ?>
                    <div class="container-xxl container">
                        <a href="<?php echo e(route('admin.question.create.descriptive', [(isset($topic_id)?$topic_id:null)])); ?>">
                            <span class='btn btn-primary  btn-sm' data-toggle="tooltip" data-placement="top" title="Descriptive/Numericals">  <i class="menu-icon tf-icons bx bx-plus"></i>Descriptive</span>
                        </a>

                        <a href="<?php echo e(route('admin.question.create.fb', [(isset($topic_id)?$topic_id:null)])); ?>">
                            <span class='btn btn-primary  btn-sm' data-toggle="tooltip" data-placement="top" title="Fill in the blanks">  <i class="menu-icon tf-icons bx bx-plus"></i> FB</span>
                        </a>

                        <a href="<?php echo e(route('admin.question.create.tf', [(isset($topic_id)?$topic_id:null)])); ?>">
                            <span class='btn btn-primary  btn-sm' data-toggle="tooltip" data-placement="top" title="True and False">  <i class="menu-icon tf-icons bx bx-plus"></i> TF</span>
                        </a>

                        <a href="<?php echo e(route('admin.question.create.mcq', [(isset($topic_id)?$topic_id:null)])); ?>">
                            <span class='btn btn-primary btn-sm' data-toggle="tooltip" data-placement="top" title="MCQ">  <i class="menu-icon tf-icons bx bx-plus"></i> MCQ</span>
                        </a>

                        <a href="<?php echo e(route('admin.question.create.diagram', [(isset($topic_id)?$topic_id:null)])); ?>">
                            <span class='btn btn-primary  btn-sm' data-toggle="tooltip" data-placement="top" title="Diagrams">  <i class="menu-icon tf-icons bx bx-plus"></i> Diagram</span>
                        </a>

                        <a href="<?php echo e(route('admin.question.create.diagram', [(isset($topic_id)?$topic_id:null)])); ?>">
                            <span class='btn btn-primary  btn-sm' data-toggle="tooltip" data-placement="top" title="Diagrams">  <i class="menu-icon tf-icons bx bx-plus"></i> Diagram</span>
                        </a>

                        <a href="<?php echo e(url('admin/question/create/quickquestion/'.$topic_id)); ?>" class="btn-info p-1"><i class="fas fa-question-circle"></i></a>


                    </div>
                <?php endif; ?>


                <div class="container-xxl flex-grow-1 container mt-2">
                    <div class="card">
                        <span class="h5 m-3"></span>
                        <div class="card-body">
                          <div class="table-responsive text-nowrap">
                            <table class="table zero-configuration table-bordered" id="questions_table" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th> Sr. No </th>
                                        <th>Topic Name</th>
                                        <th>Question </th>
                                        <th>Type</th>
                                        <th>Marks</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($questions) && count($questions) > 0): ?>
                                        <?php $srno = 1; ?>
                                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view questions')): ?>
                                                        <a href="<?php echo e(url('admin/question/showdetails/' . $data->question_id)); ?>" class="btn btn-success btn-sm m-1"><i class="fas fa-eye"></i></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update questions')): ?>
                                                        <a href="<?php echo e(url('admin/question/edit/' . $data->question_id)); ?>" class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil"></i></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete topics')): ?>
                                                        <?php echo Form::open([
                                                        'method' => 'get',
                                                        'url' => ['admin/question/delete', $data->question_id],
                                                        'style' => 'display:inline',
                                                        ]); ?>


                                                        <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-sm',
                                                            'onclick' => "return confirm('Are you sure you want to Delete this Topic ?')",
                                                        ]); ?>


                                                        <?php echo Form::close(); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center"><?php echo e($srno); ?></td>
                                                <td>
                                                    <?php if(isset($data->topic->topic_name)): ?>
                                                        <?php echo e($data->topic->topic_name); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php print_r(isset($data->question)?strip_tags($data->question,'<p><img>'):'--') ?>
                                                </td>
                                                <td> <?php echo e($data->type); ?> </td>
                                                <td><?php echo e($data->marks); ?></td>
                                                <td>
                                                   <?php if($data->status == 1): ?>
                                                        Active
                                                    <?php else: ?>
                                                        Not Active
                                                    <?php endif; ?>
                                                </td>


                                            </tr>
                                            <?php $srno++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content wrapper -->
        </div>
            <!-- / Layout page -->
          <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
            $('#questions_table').DataTable({
                dom: 'Bfrtip', // 'B' stands for Buttons
                buttons: [
                {
                    text: '<i class="fas fa-print"></i> Print',
                    extend: 'print',
                    exportOptions: {
                        columns: [1,2,3,4,5,6]
                    },
                    title: function(){
                      var printTitle = 'Questions';
                      return printTitle
                  },
                  className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                },
                {
                    text: '<i class="far fa-file-excel"></i> Excel',
                    extend: 'excel',
                    exportOptions: {
                        columns: [1,2,3,4,5,6]
                    },
                    title: function(){
                      var printTitle = 'Questions';
                      return printTitle
                    },
                    className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                },
        ],
            });
        });
    </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/questions/index.blade.php ENDPATH**/ ?>