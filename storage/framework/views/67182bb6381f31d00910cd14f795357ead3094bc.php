<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Quick Question Papers'); ?>
<?php $__env->startSection('page_name', 'Edit Desciptive Question'); ?>
<?php $__env->startSection('content'); ?>
<style>

</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    
    <div class="container-xxl flex-grow-1 container mt-2">
        <!-- Layout Demo -->
        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                    <div class="">
                        <table style='width:100%'>
                            <tr>
                                <th style="width:20%"></th>
                                <th>
                                    <p class="h3" style="margin:0px;font-size:20px">Practice Test Exams</p>
                                    <p class='h5' style="margin:0px;font-size:16px">Subject : <?php echo e((isset($subject->subject_name)?$subject->subject_name:'')); ?></p>
                                </th>
                                <td style="width:20%"></td>
                            </tr>
                        </table>
                        <table style='width:100%; font-size:10px'>
                            <?php if(isset($format_array) && count($format_array) > 0): ?>
                            <?php $__currentLoopData = $format_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e((isset($question['name'])?$question['name']:'')); ?></td>
                                    <td><?php echo e((isset($question['statement'])?$question['statement']:'')); ?></td>
                                    <td><?php echo e((isset($question['marks'])?$question['marks']:0)); ?></td>
                                </tr>
                                <?php if(isset($question['questions']) && count($question['questions'])): ?>
                                    <?php $__currentLoopData = $question['questions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style='padding-left:40px;vertical-align: top;'><?php echo e($loop->index +1); ?>.</td>
                                        <td style='vertical-align: top;'>
                                                <?php print_r(isset($question['question'])?strip_tags($question['question']):'') ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                        <div class='w-75'>
                                            <?php if(isset($question['options']) && count($question['options'])): ?>
                                                <?php $__currentLoopData = $question['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($option['question_option'])): ?>
                                                        <?php
                                                            print(strip_tags(($loop->index+1).') &nbsp; '.$option['question_option']));
                                                            echo "<br>";
                                                        ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                        <td></td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script>

</script>

   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/paper_exports/quick_qp.blade.php ENDPATH**/ ?>