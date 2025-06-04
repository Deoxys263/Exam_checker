<nav class="navbar navbar-expand-lg navbar-light bg-light mb-12 mx-2" style="border-radius: 5px;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <div class="logo-header">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.wAL5NOHwQEmPGYpjLmrczAHaE8%26pid%3DApi%26h%3D160&f=1&ipt=92bc1818b30204250afd0ce278939f706db137f67b2393dadd30de889926eb7c&ipo=images" alt="Logo" style="width: 50px;">
            </div>
        </a>
        <span class="h3 mx-2 mt-2 d-none d-lg-inline"><?php echo e(env('APP_NAME')); ?></span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="javascript:void(0)">Free Tests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Buy Batch</a>
                </li>
                <?php if(!auth()->check()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('student.register')); ?>">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('student.login')); ?>">Login</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('student.dashboard')); ?>">Dashboard</a>
                </li>
                <?php endif; ?>
            </ul>
            <?php if(auth()->check()): ?>
                <div class="d-flex align-items-center ms-auto">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F574%2F512%2Foriginal%2Fvector-sign-of-user-icon.jpg&f=1&nofb=1&ipt=63f45ff8481cd6bff88447e34bb8f23c5a76ff784ffee2e8b46230b5b9306dc6&ipo=images" alt="User Icon" class="user-icon me-2 menu_student_image"

                    >
                    <div class="dropdown">
                        <button class="btn home_nav_user_details dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo e(Str::limit(Auth::user()->student_name, 50, '')); ?>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="<?php echo e(route('student.dashboard')); ?>)">Dashboard</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('student.logout')); ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>

<?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/includes/topnav.blade.php ENDPATH**/ ?>