<?php $__env->startSection('content'); ?>
    <form method="post" class="bg-dark text-white" style="width: 70%; margin: auto; border: 1px solid white; border-radius: 10px; padding: 10px;" action="<?php echo e(route('todo.create')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <br>
        <div class="form-group">
            <div class="d-flex">
                <label>For the user: </label>
                <select name="targetuser" style="width: fit-content" class="form-control">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <br>
            <div class="d-flex">
                <label>By user: </label>
                <select name="fromuser" style="width: fit-content" class="form-control">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <label>Content</label>
        <textarea name="content" class="form-control" cols="30" rows="10" placeholder=""></textarea>
        <br>
        <button type="submit" style="margin: auto; display: block" class="btn btn-success">Create</button>
        <br>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/create.blade.php ENDPATH**/ ?>