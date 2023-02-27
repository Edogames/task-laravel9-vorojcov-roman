<?php $__env->startSection('content'); ?>
    <main>
        <div class="container">
            <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div style="display: block" id="normal-view-<?php echo e($todo->id); ?>">
                        <div class="card-header bg-dark text-white d-flex justify-content-between">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($todo->fromuser == $user->id): ?>
                                    <h1>Assigned by: <?php echo e($user->name); ?></h1>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($todo->targetuser == $user->id): ?>
                                    <h1>For: <?php echo e($user->name); ?></h1>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <h1 class="card-body"><?php echo e($todo->content); ?></h1>
                        <div class="card-footer bg-dark text-white">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <h1>Status:</h1><br>
                                    <?php if($todo->status == 'failed'): ?>
                                        <h1 class="text-danger">Failed</h1>
                                    <?php elseif($todo->status == 'complete'): ?>
                                        <h1 class="text-success">Complete</h1>
                                    <?php else: ?>
                                        <h1 style="color: gray">in progress</h1>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex">
                                    <button onclick="toggleEditFor();toggleEditFor(null, '<?php echo e($todo->id); ?>');" class="btn btn-success">Edit</button>
                                    <form action="<?php echo e(URL::route('todo.delete', $todo->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('You really want to delete this task?')" style="display: inline;">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: block" id="edit-view-<?php echo e($todo->id); ?>">
                        <form action="<?php echo e(route('update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <input type="hidden" name="id" value="<?php echo e($todo->id); ?>">
                            <div class="card-header bg-dark text-white d-flex justify-content-between">
                                <div class="d-flex">
                                    <h1>Assigned by: </h1>
                                    <select name="fromuser" class="form-control">
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($user->id == $todo->fromuser): ?>
                                                <option value="<?php echo e($user->id); ?>" selected="selected"><?php echo e($user->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="d-flex">
                                    <h1>For: </h1>
                                    <select name="targetuser" value class="form-control">
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($user->id == $todo->targetuser): ?>
                                                <option value="<?php echo e($user->id); ?>" selected="selected"><?php echo e($user->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <textarea name="content" class="form-control" cols="30" rows="10" style="height: fit-content; resize: none;"><?php echo e($todo->content); ?></textarea>
                            <div class="card-footer bg-dark text-white">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <h1>Status:</h1><br>
                                        <select name="status" class="form-control">
                                            <?php if($todo->status == 'failed'): ?>
                                                <option value="3" selected>Failed</option>
                                                <option value="2">complete</option>
                                                <option value="1">in progress</option>
                                            <?php elseif($todo->status == 'complete'): ?>
                                                <option value="3">Failed</option>
                                                <option value="2" selected>complete</option>
                                                <option value="1">in progress</option>
                                            <?php else: ?>
                                                <option value="3">Failed</option>
                                                <option value="2">complete</option>
                                                <option value="1" selected>in progress</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <button onclick="toggleEditFor(event, '<?php echo e($todo->id); ?>');" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-warning text-white" style="display: inline;">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/home.blade.php ENDPATH**/ ?>