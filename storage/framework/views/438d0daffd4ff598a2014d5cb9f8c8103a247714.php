<div>
    <input type="text" wire:model="search" placeholder="Search..." class="mb-4 p-2 border border-gray-300">

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class=" px-4 py-3">
                    Name
                </th>
                <th class=" px-4 py-3">
                    Package
                </th>
                <th class=" px-4 py-3">
                    Paper Name
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($sheets) && count($sheets)): ?>
                <?php $__currentLoopData = $sheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b dark:border-gray-700">
                        <th class="px-4 py-3"><?php echo e((isset($sheet->student->student_name)?$sheet->student->student_name:'--')); ?></th>
                        <th class="px-4 py-3"><?php echo e((isset($sheet->package->package_name)?$sheet->package->package_name:'--')); ?></th>
                        <th class="px-4 py-3"><?php echo e((isset($sheet->filename->paper_name)?$sheet->filename->paper_name:'--')); ?></th>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="mt-4">
        <?php echo e($sheets->links()); ?>

    </div>
</div>

<?php /**PATH G:\wamp64\www\exam_system\resources\views/livewire/all-uploaded-sheets.blade.php ENDPATH**/ ?>